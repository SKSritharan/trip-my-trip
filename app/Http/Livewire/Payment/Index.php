<?php

namespace App\Http\Livewire\Payment;

use App\Models\User;
use App\Models\Vehicle;
use Livewire\Component;
use WireUi\Traits\Actions;

class Index extends Component
{
    use Actions;
    public $paymentFor, $productId, $name, $amount;

    public function mount($paymentFor, $productId)
    {
        $this->paymentFor = $paymentFor;
        $this->productId = $productId;
        $this->productAnalyze();
    }

    public function productAnalyze()
    {
        $product = Vehicle::find($this->productId);
        $this->name= $product->name;
        $this->amount= $product->amount;
    }

    public function render()
    {
        return view('livewire.payment.index');
    }

    public function checkout()
    {
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
        $user->vehicleBooking()->create([
            'vehicle_id' => $this->productId, // The vehicle's ID
            'start_date' => now(), // Modify this with your start date input
            'end_date' => now()->addDays(7), // Modify this with your end date input
            'status' => 'pending', // Set the initial status as needed
        ]);

        return redirect()->away($session->url);
    }
}
