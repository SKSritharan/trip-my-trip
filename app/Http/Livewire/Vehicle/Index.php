<?php

namespace App\Http\Livewire\Vehicle;

use App\Models\Place;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $name, $owner, $model, $passenger_seats_available, $vehicle_number, $place_id, $img_url, $image, $vehicle_id;
    public $isModalOpen = 0;

    public function render()
    {
        $places = Place::all();
        $vehicles = Vehicle::paginate(10);
        return view('livewire.vehicle.index', compact('vehicles', 'places'));
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
        $this->owner = '';
        $this->model = '';
        $this->passenger_seats_available = '';
        $this->vehicle_number = '';
        $this->place_id = null;
        $this->img_url = null;
    }

    public function store()
    {
        if ($this->img_url !== null && !str_contains($this->img_url, 'vehicles')) {
            $this->img_url = Storage::putFile('public/vehicles', $this->img_url);
            $this->img_url = str_replace('public/', '', $this->img_url);
        }
        $this->validate([
            'name' => 'required',
            'owner' => 'required',
            'model' => 'required',
            'passenger_seats_available' => 'required',
            'vehicle_number' => 'required',
            'place_id' => 'required|exists:places,id',
            'img_url' => 'required',
        ]);

        Vehicle::updateOrCreate(['id' => $this->vehicle_id], [
            'name' => $this->name,
            'owner' => $this->owner,
            'model' => $this->model,
            'passenger_seats_available' => $this->passenger_seats_available,
            'vehicle_number' => $this->vehicle_number,
            'place_id' => $this->place_id,
            'img_url' => $this->img_url,
        ]);
        session()->flash('message', $this->vehicle_id ? 'Vehicle updated.' : 'Vehicle created.');
        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $this->vehicle_id = $id;
        $this->name = $vehicle->name;
        $this->owner = $vehicle->owner;
        $this->model = $vehicle->model;
        $this->passenger_seats_available = $vehicle->passenger_seats_available;
        $this->vehicle_number = $vehicle->vehicle_number;
        $this->place_id = $vehicle->place_id;
        $this->img_url = $vehicle->img_url;

        $this->openModalPopover();
    }

    public function delete($id)
    {
        Vehicle::find($id)->delete();
        session()->flash('message', 'Vehicle deleted.');
    }
}
