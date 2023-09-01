<?php

namespace App\Http\Livewire\Place;

use App\Models\Place;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $name, $description, $lat, $long, $img_url, $image, $place_id;
    public $isModalOpen = 0;

    public function render()
    {
        $places = Place::paginate(10);
        return view('livewire.place.index', compact('places'));
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm()
    {
        $this->name = '';
        $this->description = '';
        $this->lat = '';
        $this->long = '';
        $this->img_url = null;
    }

    public function store()
    {
        if ($this->img_url !== null && !str_contains($this->img_url, 'places')) {
            $this->img_url = Storage::putFile('public/places', $this->img_url);
            $this->img_url = str_replace('public/', '', $this->img_url);
        }
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'img_url' => 'required',
        ]);

        Place::updateOrCreate(['id' => $this->place_id], [
            'name' => $this->name,
            'description' => $this->description,
            'lat' => $this->lat,
            'long' => $this->long,
            'img_url' => $this->img_url,
        ]);
        session()->flash('message', $this->place_id ? 'Place updated.' : 'Place created.');
        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $place = Place::findOrFail($id);
        $this->place_id = $id;
        $this->name = $place->name;
        $this->description = $place->description;
        $this->lat = $place->lat;
        $this->long = $place->long;
        $this->img_url = $place->img_url;

        $this->openModalPopover();
    }

    public function delete($id)
    {
        Place::find($id)->delete();
        session()->flash('message', 'Place deleted.');
    }
}
