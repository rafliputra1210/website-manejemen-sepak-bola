<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('landing.home');
    }

    public function coaches()
    {
        // Nantinya data coach akan diambil dari database (Modul 3)
        return view('landing.coaches');
    }

    public function schedule()
    {
        return view('landing.schedule');
    }

    public function achievements()
    {
        return view('landing.achievements');
    }

    public function gallery()
    {
        return view('landing.gallery');
    }

    public function registration()
    {
        return view('landing.registration');
    }
}