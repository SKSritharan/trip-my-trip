<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PlaceCard extends Component
{
    public $src;
    public $name;
    public $count;
    public $link;
    /**
     * Create a new component instance.
     */
    public function __construct($src, $name, $count, $link)
    {
        $this->src = $src;
        $this->name = $name;
        $this->count = $count;
        $this->link = $link;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.place-card');
    }
}
