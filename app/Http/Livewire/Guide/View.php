<?php

namespace App\Http\Livewire\Guide;

use App\Models\Guide;
use Livewire\Component;
use WireUi\Traits\Actions;

class View extends Component
{
    use Actions;
    public $search = '';
    public $isModalVisible = false;
    public $guide_id, $start_date, $end_date, $guide_name, $amount;

    public function render()
    {
        $guides = Guide::search($this->search)->paginate(8);
        return view('livewire.guide.view', compact('guides'))->layout('landing-page.layouts.master');
    }

    public function showModal($id)
    {
        $this->guide_id = $id;
        $guide = Guide::find($id);
        $this->guide_name=$guide->name;
        $this->amount=$guide->payment;
        $this->isModalVisible = true;
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
                            'name' => $this->guide_name
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
        $user->guideBookings()->create([
            'guide_id' => $this->guide_id,
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
