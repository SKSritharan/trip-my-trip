<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Vehicle;
use App\Models\VehicleBooking;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $places = Place::latest()->limit(4)->get();
        $vehicles = Vehicle::latest()->limit(4)->get();
        return view('landing-page.welcome', compact('places', 'vehicles'));
    }
}
