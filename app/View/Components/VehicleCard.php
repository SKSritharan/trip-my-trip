<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class VehicleCard extends Component
{
    public $vehicleId;
    public $img_url;
    public $name;
    public $description;
    public $amount;
    public $ratings;
    public $payment_type;

    /**
     * Create a new component instance.
     */
    public function __construct($vehicleId, $image, $name, $description, $amount, $payment, $ratings)
    {
        $this->vehicleId = $vehicleId;
        $this->img_url = $image;
        $this->name = $name;
        $this->description = $description;
        $this->amount = $amount;
        $this->payment_type = $payment;
        $this->ratings = $ratings;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.vehicle-card');
    }
}
