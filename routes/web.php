<?php

use App\Http\Controllers\CareerController;
use App\Http\Controllers\ContactUsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about-us', [App\Http\Controllers\HomeController::class, 'aboutUs'])->name('about-us');
Route::get('/how-it-works', [App\Http\Controllers\HomeController::class, 'howItWorks'])->name('how-it-works');
Route::get('/recommendations', [App\Http\Controllers\HomeController::class, 'recommendations'])->name('recommendations');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contactUs'])->name('contact');
Route::get('/faqs', [App\Http\Controllers\HomeController::class, 'faqs'])->name('faqs');

// Main Features
Route::get('grade-based', [App\Http\Controllers\FeaturesController::class, 'gradeBased'])->name('grade-based');

// Extra Features
Route::get('/careers', [CareerController::class, 'careers'])->name('careers');

