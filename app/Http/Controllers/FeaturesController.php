<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeaturesController extends Controller
{
    public function gradeBased()
    {
        return view('livewire.features.grade-based-home');
    }
    public function assessmentBased()
    {

    }
    public function preferenceBased()
    {

    }
}
