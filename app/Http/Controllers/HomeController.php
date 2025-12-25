<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function aboutUs()
    {
        return view('about-us');
    }
    public function howItWorks()
    {
        return view('how-it-works');
    }
    public function recommendations()
    {
        return view('recommendations');
    }
    public function contactUs()
    {
        return view('contact-us');
    }

    public function faqs()
    {
        return view('faqs');
    }
}
