<?php

namespace App\Livewire\Features\GradeBased;

use Livewire\Component;
use App\Services\GradeRecommendationService;

class GradeBased extends Component
{
    // Subject Properties
    public $ITEC102, $ITEC103, $ITEC205, $ITEL201, $ITEC204, $ITEP204;
    public $GEC106, $ITEP205, $ITEL203, $GEC108, $ITEP203, $ITEP207;

    public $recommendationResult = [];

    public function submit(GradeRecommendationService $service)
    {
        $this->validate([
            'ITEC102' => 'required|numeric',
            'ITEC103' => 'required|numeric',
            'ITEC205' => 'required|numeric',
            'ITEL201' => 'required|numeric',
            'ITEC204' => 'required|numeric',
            'ITEP204' => 'required|numeric',
            'GEC106'  => 'required|numeric',
            'ITEP205' => 'required|numeric',
            'ITEL203' => 'required|numeric',
            'GEC108'  => 'required|numeric',
            'ITEP203' => 'required|numeric',
            'ITEP207' => 'required|numeric',
        ]);

        // STRICT ORDER: Must match the order of columns in your CSV training data
        $inputs = [
            $this->ITEC102,
            $this->ITEC103,
            $this->ITEC205,
            $this->ITEL201,
            $this->ITEC204,
            $this->ITEP204,
            $this->GEC106,
            $this->ITEP205,
            $this->ITEL203,
            $this->GEC108,
            $this->ITEP203,
            $this->ITEP207
        ];

        // Cast to float to prevent string errors
        $inputs = array_map('floatval', $inputs);

        try {
            $this->recommendationResult = $service->predictWithScores($inputs);
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.features.grade-based.grade-based');
    }
}
