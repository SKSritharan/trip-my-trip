<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $places = Place::latest()->limit(4)->get();
        return view('landing-page.welcome', compact('places'));
    }
}
