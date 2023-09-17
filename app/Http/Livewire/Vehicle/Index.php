<?php

namespace App\Http\Livewire\Vehicle;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $name, $description, $owner_id, $model, $passenger_seats_available, $vehicle_number, $pickup_point, $img_url, $image, $vehicle_id, $payment_type, $amount;
    public $isModalOpen = 0;

    public $user_role;

    public function mount()
    {
        $this->user_role = Auth::user()->role->slug;

        if ($this->user_role === 'guide') {
            $this->owner_id = Auth::user()->id;
        }
    }

    public function render()
    {
        $users = User::where('role_id', 2)->get();
        if ($this->user_role === 'guide') {
            $vehicles = Vehicle::where('owner_id', Auth::user()->id)->paginate(10);
        } else {
            $vehicles = Vehicle::paginate(10);
        }

        return view('livewire.vehicle.index', compact('vehicles', 'users'));
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
        if ($this->user_role === 'guide') {
            $this->owner_id = Auth::user()->id;
        } else {
            $this->owner_id = null;
        }
        $this->model = '';
        $this->passenger_seats_available = '';
        $this->vehicle_number = '';
        $this->payment_type = null;
        $this->amount = 0.00;
        $this->pickup_point = '';
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
            'description' => 'sometimes',
            'owner_id' => 'required|exists:users,id',
            'model' => 'required',
            'passenger_seats_available' => 'required',
            'vehicle_number' => ['required', 'regex:/^[A-Z]{2,3}\s?\d{4}$/i'],
            'payment_type' => 'required',
            'amount' => 'required|numeric',
            'pickup_point' => 'required',
            'img_url' => 'required',
        ]);

        Vehicle::updateOrCreate(['id' => $this->vehicle_id], [
            'name' => $this->name,
            'description' => $this->description,
            'owner_id' => $this->owner_id,
            'model' => $this->model,
            'passenger_seats_available' => $this->passenger_seats_available,
            'vehicle_number' => $this->vehicle_number,
            'payment_type' => $this->payment_type,
            'amount' => $this->amount,
            'pickup_point' => $this->pickup_point,
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
        $this->description = $vehicle->description;
        $this->owner_id = $vehicle->owner_id;
        $this->model = $vehicle->model;
        $this->passenger_seats_available = $vehicle->passenger_seats_available;
        $this->vehicle_number = $vehicle->vehicle_number;
        $this->pickup_point = $vehicle->pickup_point;
        $this->payment_type = $vehicle->payment_type;
        $this->amount = $vehicle->amount;
        $this->img_url = $vehicle->img_url;

        $this->openModalPopover();
    }

    public function delete($id)
    {
        Vehicle::find($id)->delete();
        session()->flash('message', 'Vehicle deleted.');
    }
}
