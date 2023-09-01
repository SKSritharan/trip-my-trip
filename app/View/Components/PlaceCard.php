<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PlaceCard extends Component
{
    public $src;
    public $name;
    public $description;
    public $count;
    public $link;
    /**
     * Create a new component instance.
     */
    public function __construct($src, $name, $description, $count, $link)
    {
        $this->src = $src;
        $this->name = $name;
        $this->description = $description;
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
