<?php

namespace App\Http\Livewire\Place;

use App\Models\Place;
use Livewire\Component;
use WireUi\Traits\Actions;

class View extends Component
{
    use Actions;
    public $isPlaceVisible = false;
    public $name, $img_url, $description, $lat, $long;
    public $search = '';

    public function render()
    {
        $places = Place::search($this->search)->paginate(8);
        return view('livewire.place.view', compact('places'))->layout('landing-page.layouts.master');
    }

    public function showPlace($id)
    {
        $place = Place::find($id);
        $this->name = $place->name;
        $this->description = $place->description;
        $this->img_url = $place->img_url;
        $this->lat = $place->lat;
        $this->long = $place->long;
        $this->isPlaceVisible = true;
    }
}
