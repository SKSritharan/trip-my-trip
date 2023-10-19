<?php

namespace App\Http\Livewire\Bookings;

use App\Models\GuideBooking;
use App\Models\VehicleBooking;
use Livewire\Component;

class Index extends Component
{
    public $search = '';
    public $user_role;

    public function mount()
    {
        // Ensure the user_role is set before applying the checks
        $user = auth()->user();
        $this->user_role = $user->role->slug;

        if ($this->user_role === 'vehicle') {
            if (!($user->vehicle)) {
                return redirect()->route('manage-vehicles');
            }
        } elseif ($this->user_role === 'guide') {
            if (!($user->guide)) {
                return redirect()->route('manage-guides');
            }
        }
    }

    public function render()
    {
        $bookings = [];

        // Fetch bookings based on user role
        $user = auth()->user();
        // Commented out the following line because the user_role is now being set in the mount method
        // $this->user_role = $user->role->slug;

        if ($this->user_role === 'vehicle') {
            $bookings = VehicleBooking::where('vehicle_id', $user->vehicle->id)
                ->search($this->search)
                ->get();
        } elseif ($this->user_role === 'guide') {
            $bookings = GuideBooking::where('guide_id', $user->guide->id)
                ->search($this->search)
                ->get();
        } elseif ($this->user_role === 'user') {
            $bookings = $user->guideBookings()->search($this->search)->get()->concat($user->vehicleBookings()->search($this->search)->get());
        } elseif ($this->user_role === 'admin') {
            $bookings = VehicleBooking::search($this->search)
                ->get()
                ->concat(GuideBooking::search($this->search)->get());
        }

        return view('livewire.bookings.index', compact('bookings'));
    }
}
