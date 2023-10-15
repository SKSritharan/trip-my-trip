<?php

namespace App\Http\Livewire\Place;

use App\Models\Place;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class Index extends Component
{
    use WithPagination, WithFileUploads, Actions;

    public $name, $description, $lat, $long, $img_url, $image, $place_id;
    public $isModalOpen = 0;
    public $search = '';

    public function render()
    {
        $places = Place::search($this->search)->paginate(10);
        return view('livewire.place.index', compact('places'));
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm()
    {
        $this->name = '';
        $this->description = '';
        $this->lat = '';
        $this->long = '';
        $this->img_url = null;
    }

    public function store()
    {
        $fileLocation = Storage::putFile(
            path: 'public/places',
            file: $this->img_url
        );

        $relativePath = Str::replaceFirst('public/', 'storage/', $fileLocation);

        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'img_url' => 'required',
        ]);

        Place::updateOrCreate(['id' => $this->place_id], [
            'name' => $this->name,
            'description' => $this->description,
            'lat' => $this->lat,
            'long' => $this->long,
            'img_url' => $relativePath,
        ]);

        $this->notification()->success(
            $title = $this->place_id ? 'Place updated.' : 'Place created.',
            $description = $this->place_id ? 'Place updated successfully.' : 'Place created successfully.'
        );

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $place = Place::findOrFail($id);
        $this->place_id = $id;
        $this->name = $place->name;
        $this->description = $place->description;
        $this->lat = $place->lat;
        $this->long = $place->long;
        $this->img_url = $place->img_url;

        $this->openModalPopover();
    }

    public function deleteConfirm($id)
    {
        $this->dialog()->confirm([
            'title' => 'Are you sure?',
            'description' => 'Do you want to delete this place?',
            'icon' => 'question',
            'accept' => [
                'label' => 'Yes, Delete',
                'method' => 'delete',
                'params' => $id,
            ],
            'reject' => [
                'label' => 'No, cancel',
                'method' => 'cancel',
            ],
        ]);
    }

    public function delete($id)
    {
        Place::find($id)->delete();
        $this->notification()->success(
            $title ='Place deleted.',
            $description = 'Place deleted successfully.'
        );
    }
}
