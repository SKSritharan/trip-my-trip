<?php

namespace App\Http\Livewire\Guide;

use App\Models\Guide;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class Index extends Component
{
    use WithPagination, Actions;

    public $name,$gender, $known_languages, $experience_years, $contact_no, $address, $payment, $guide_id;
    public $isModalOpen = 0;

    public function render()
    {
        $guides = Guide::paginate(10);
        return view('livewire.guide.index', compact('guides'));
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
        $this->gender='';
        $this->known_languages = '';
        $this->experience_years = '';
        $this->contact_no = '';
        $this->address = '';
        $this->payment = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'gender'=>'required',
            'known_languages' => 'required',
            'experience_years' => 'required|numeric|min:0',
            'contact_no' => 'required',
            'address' => 'required',
            'payment' => 'required',
        ]);

        Guide::updateOrCreate(['id' => $this->guide_id], [
            'name' => $this->name,
            'gender' => $this->gender,
            'known_languages' => $this->known_languages,
            'experience_years' => $this->experience_years,
            'contact_no' => $this->contact_no,
            'address' => $this->address,
            'payment' => $this->payment,
        ]);

        $this->notification()->success(
            $title = $this->guide_id ? 'Guide updated.' : 'Guide created.',
            $description = $this->guide_id ? 'Guide updated successfully.' : 'Guide created successfully.'
        );

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $guide = Guide::findOrFail($id);
        $this->guide_id = $id;
        $this->name = $guide->name;
        $this->gender = $guide->gender;
        $this->known_languages = $guide->known_languages;
        $this->experience_years = $guide->experience_years;
        $this->contact_no = $guide->contact_no;
        $this->address = $guide->address;
        $this->payment = $guide->payment;

        $this->openModalPopover();
    }

    public function deleteConfirm($id)
    {
        $this->dialog()->confirm([
            'title' => 'Are you sure?',
            'description' => 'Do you want to delete this guide?',
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
        Guide::find($id)->delete();
        $this->notification()->success(
            $title ='Guide deleted.',
            $description = 'Guide deleted successfully.'
        );
    }
}
