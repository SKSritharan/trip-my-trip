<?php

namespace App\Http\Livewire\Guide;

use App\Models\Guide;
use Livewire\Component;
use WireUi\Traits\Actions;

class View extends Component
{
    use Actions;
    public $isPlaceVisible = false;
    public $name, $img_url, $description, $lat, $long;
    public $search = '';

    public function render()
    {
        $guides = Guide::search($this->search)->paginate(8);
        return view('livewire.guide.view', compact('guides'))->layout('landing-page.layouts.master');
    }
}
