<?php

namespace App\Http\Livewire\Vehicle;

use App\Models\Vehicle;
use Livewire\Component;
use WireUi\Traits\Actions;

class View extends Component
{
    use Actions;

    public $isVehicleVisible = false;
    public $isBookingModalVisible = false;
    public $name, $img_url, $description, $owner_name, $model, $passenger_seats_available, $payment_type, $amount, $pickup_point;
    public $search = '';
    public $vehicle_id, $start_date, $end_date;

    public function render()
    {
        $vehicles = Vehicle::search($this->search)->paginate(8);
        return view('livewire.vehicle.view', compact('vehicles'))->layout('landing-page.layouts.master');
    }

    public function view($id)
    {
        $this->setVehicle($id);
        $this->isVehicleVisible = true;
    }

    public function setVehicle($id)
    {
        $vehicle = Vehicle::find($id);
        $this->name = $vehicle->name;
        $this->img_url = $vehicle->img_url;
        $this->description = $vehicle->description;
        $this->owner_name = $vehicle->owner->name;
        $this->model = $vehicle->model;
        $this->passenger_seats_available = $vehicle->passenger_seats_available;
        $this->payment_type = $vehicle->payment_type;
        $this->amount = $vehicle->amount;
        $this->pickup_point = $vehicle->pickup_point;
    }

    public function showModal()
    {
        $this->isBookingModalVisible = true;
    }

    public function closeModal()
    {
        $this->reset();
        $this->isBookingModalVisible = false;
    }

    public function showBooking($id)
    {
        $this->vehicle_id = $id;
        $this->setVehicle($id);
        $this->showModal();
    }

    public function book()
    {
        if (!auth()->check()) {
            $this->notification()->error(
                $title = 'Error !',
                $description = 'Please log in to book the vehicle.'
            );
            return redirect()->route('login');
        }

        $this->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date'
        ]);

        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' =>[
                        'currency' => 'lkr',
                        'product_data' =>[
                            'name' => $this->name
                        ],
                        'unit_amount' => $this->amount*100,
                    ],
                    'quantity' => 1
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('bookings'),
        ]);

        // Create a new booking record in the database
        $user = auth()->user();
        $user->vehicleBookings()->create([
            'vehicle_id' => $this->vehicle_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => 'pending',
        ]);

        $this->notification()->success(
            $title = 'Booking Success',
            $description = 'Your booking was completed successfully'
        );

        return redirect()->away($session->url);
    }
}
