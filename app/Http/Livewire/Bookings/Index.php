<?php

namespace App\Http\Livewire\Bookings;

use App\Models\GuideBooking;
use App\Models\VehicleBooking;
use Livewire\Component;

class Index extends Component
{
    public $search = '';
    public $user_role;

    public function render()
    {
        $bookings = [];

        // Determine user role
        $user = auth()->user();
        $this->user_role = $user->role->slug;

        // Fetch bookings based on user role
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
