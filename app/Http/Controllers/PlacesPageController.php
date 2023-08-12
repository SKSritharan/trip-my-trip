<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlacesPageController extends Controller
{
    public function index()
    {
        $places = Place::all();
        $markers = $this->setMarkers($places);

        return view('landing-page.pages.places', compact('markers'));
    }

    private function setMarkers($places)
    {
        return $places->map(function ($place) {
            return [
                'title' => $place->name,
                'lat' => $place->lat,
                'long' => $place->long,
                'info' => "<div style='float:left'><img src='https://i.stack.imgur.com/g672i.png'></div><div style='float:right; padding: 10px;'><b>Title</b><br/>123 Address<br/> City,Country</div>",
            ];
        })->all();
    }
}
