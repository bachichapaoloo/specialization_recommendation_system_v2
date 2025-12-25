<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Rubix\ML\Extractors\CSV;
use Rubix\ML\Datasets\Labeled;
use Rubix\ML\PersistentModel;
use Rubix\ML\Pipeline;
use Rubix\ML\Classifiers\RandomForest;
use Rubix\ML\Persisters\Filesystem;

class TrainGradeModel extends Command
{
    protected $signature = 'model:train';
    protected $description = 'Train the grade recommendation model with manual verification';

    public function handle()
    {
        // 1. Force consistent decimal handling
        setlocale(LC_ALL, 'C');

        $this->info('Starting training process...');

        // 2. Directory Check
        if (!file_exists(storage_path('app/models'))) {
            mkdir(storage_path('app/models'), 0755, true);
        }

        $datasetPath = storage_path('app/dataset/original_dataset.csv');
        if (!file_exists($datasetPath)) {
            $this->error("Dataset not found at: $datasetPath");
            return 1;
        }

        // 3. Load and Clean Data
        $this->comment('Loading and sanitizing dataset...');

        $extractor = new CSV($datasetPath, true);

        $samples = [];
        $labels = [];
        $rowIndex = 0;

        foreach ($extractor as $record) {
            $rowIndex++;

            // Skip empty rows
            if (empty($record)) continue;

            // Extract the Label (last column)
            $label = array_pop($record);

            // Skip if row became empty
            if (empty($record)) continue;

            // Skip Header Row if it leaked through
            if ($rowIndex === 1 && isset($record[0]) && !is_numeric($record[0])) {
                continue;
            }

            // CLEANING:
            // 1. Trim whitespace
            // 2. Force to Float
            // 3. array_values() strips keys ("ITEC102") to make it a pure number list
            $cleanSample = array_values(array_map(function ($value) {
                $clean = trim($value);
                return is_numeric($clean) ? (float) $clean : 0.0;
            }, $record));

            $samples[] = $cleanSample;
            $labels[] = trim((string)$label); // Force label to string
        }

        if (empty($samples)) {
            $this->error("No data found.");
            return 1;
        }

        $this->info("Loaded " . count($samples) . " valid records.");

        // 4. Create Dataset
        $dataset = new Labeled($samples, $labels);

        // 5. Define Pipeline
        // We removed ZScaleStandardizer as grades are already on the same 1.0-5.0 scale
        $estimator = new PersistentModel(
            new Pipeline([
                // Transformers go here if needed
            ], new RandomForest(new \Rubix\ML\Classifiers\ClassificationTree(10), 100)),
            new Filesystem(storage_path('app/models/grade_recommender.rbx'))
        );

        // 6. Split & Train
        $this->comment('Splitting dataset for evaluation (80% Train, 20% Test)...');
        [$training, $testing] = $dataset->stratifiedSplit(0.8);

        $this->comment('Training model...');
        $estimator->train($training);

        // 7. Evaluate
        $this->comment('Evaluating...');
        $predictions = $estimator->predict($testing);

        // --- MANUAL ACCURACY CALCULATION ---
        // We calculate this manually to avoid "0%" errors from report library mismatches
        $correct = 0;
        $total = count($predictions);
        $actuals = $testing->labels();

        foreach ($predictions as $index => $prediction) {
            if ($prediction === $actuals[$index]) {
                $correct++;
            }
        }

        $accuracy = ($total > 0) ? ($correct / $total) * 100 : 0;

        $this->info("\n------------------------------------------------");
        $this->info("FINAL RESULTS");
        $this->info("------------------------------------------------");
        $this->info("Total Test Samples: $total");
        $this->info("Correct Predictions: $correct");

        if ($accuracy > 80) {
            $this->info("Accuracy: " . number_format($accuracy, 2) . "% (EXCELLENT)");
        } elseif ($accuracy > 70) {
            $this->comment("Accuracy: " . number_format($accuracy, 2) . "% (GOOD)");
        } else {
            $this->error("Accuracy: " . number_format($accuracy, 2) . "% (NEEDS IMPROVEMENT)");
        }
        $this->info("------------------------------------------------\n");

        // 8. Save Final Model
        $this->comment('Retraining on full dataset and saving to disk...');
        $estimator->train($dataset);
        $estimator->save();

        $this->info('Model saved successfully to storage/app/models/grade_recommender.rbx');

        return 0;
    }
}
