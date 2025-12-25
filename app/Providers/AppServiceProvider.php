<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\GradeRecommendationService;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Register the singleton
        $this->app->singleton(GradeRecommendationService::class, function ($app) {
            return new GradeRecommendationService();
        });
    }

    public function boot(): void
    {
        //
    }
}