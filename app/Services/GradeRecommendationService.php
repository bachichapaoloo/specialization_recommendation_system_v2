<?php

namespace App\Services;

use Rubix\ML\PersistentModel;
use Rubix\ML\Persisters\Filesystem;
use Rubix\ML\Datasets\Unlabeled;

class GradeRecommendationService
{
    protected $estimator;

    public function __construct()
    {
        $path = storage_path('app/models/grade_recommender.rbx');

        if (file_exists($path)) {
            $this->estimator = PersistentModel::load(new Filesystem($path));
        }
    }

    public function predictWithScores(array $grades)
    {
        if (!$this->estimator) {
            throw new \Exception("Model not loaded. Run 'php artisan model:train' first.");
        }

        // 1. Prepare data
        $dataset = new Unlabeled([$grades]);

        // 2. Get the raw probabilities (e.g., ['WMAD' => 0.4, 'SMP' => 0.6])
        // We use proba() instead of predict() to get the full picture
        $probabilities = $this->estimator->proba($dataset)[0];

        // 3. Sort High to Low
        arsort($probabilities);

        // 4. Force the "Winner" to be the very first key of the sorted array
        $topTrack = array_key_first($probabilities);

        return [
            'recommended_track' => $topTrack, // This is now guaranteed to match the top score
            'scores' => $probabilities
        ];
    }
}
