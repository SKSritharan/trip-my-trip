<?php

namespace App\Http\Livewire\Vehicle;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class Index extends Component
{
    use WithPagination, WithFileUploads, Actions;

    public $name, $description, $owner_id, $model, $passenger_seats_available, $vehicle_number, $pickup_point, $img_url, $image, $vehicle_id, $payment_type, $amount;
    public $isModalOpen = 0;

    public $user_role;
    public $search = '';

    public function mount()
    {
        $this->user_role = Auth::user()->role->slug;

        if ($this->user_role === 'vehicle') {
            $this->owner_id = Auth::user()->id;
        }
    }

    public function render()
    {
        $users = User::where('role_id', 2)->get();
        if ($this->user_role === 'vehicle') {
            $vehicles = Vehicle::where('owner_id', Auth::user()->id)->search($this->search)->paginate(10);
        } else {
            $vehicles = Vehicle::search($this->search)->paginate(10);
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
        $fileLocation = Storage::putFile(
            path: 'public/vehicles',
            file: $this->img_url
        );

        $relativePath = Str::replaceFirst('public/', 'storage/', $fileLocation);

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

        $this->notification()->success(
            $title = $this->vehicle_id ? 'Vehicle updated.' : 'Vehicle created.',
            $description = $this->vehicle_id ? 'Vehicle updated successfully.' : 'Vehicle created successfully.'
        );

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

    public function deleteConfirm($id)
    {
        $this->dialog()->confirm([
            'title' => 'Are you sure?',
            'description' => 'Do you want to delete this vehicle?',
            'icon' => 'question',
            'accept' => [
                'label' => 'Yes, Delete',
                'method' => 'delete',
                'params' => $id,
            ],
            'reject' => [
                'label' => 'No, cancel',
                'method' => 'cancel',
            ],
        ]);
    }

    public function delete($id)
    {
        Vehicle::find($id)->delete();
        $this->notification()->success(
            $title ='Vehicle deleted.',
            $description = 'Vehicle deleted successfully.'
        );
    }
}
