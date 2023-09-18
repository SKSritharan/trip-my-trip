<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RatingBarShow extends Component
{
    public $rating;
    public $filledStars;
    public $emptyStars;

    /**
     * Create a new component instance.
     */
    public function __construct($rating)
    {
        $this->rating = $rating;
        $maxRating = 5; // Maximum rating (number of stars)
        $this->filledStars = min(max(round($rating), 0), $maxRating); // Calculate the number of filled stars
        $this->emptyStars = $maxRating - $this->filledStars; // Calculate the number of empty stars
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.rating-bar-show');
    }
}
