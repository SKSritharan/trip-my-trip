<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HotelCard extends Component
{
    public $src;
    public $name;
    public $count;
    public $link;
    public $place;

    /**
     * Create a new component instance.
     **/

    public function __construct($src, $name, $count, $link, $place)
    {
        $this->src = $src;
        $this->name = $name;
        $this->count = $count;
        $this->link = $link;
        $this->place = $place;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.hotel-card');
    }
}
