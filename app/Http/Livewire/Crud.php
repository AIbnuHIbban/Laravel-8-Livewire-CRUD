<?php

namespace App\Http\Livewire;

use App\Models\Data;
use Livewire\Component;
use Livewire\WithPagination;

class Crud extends Component
{
    use WithPagination;
    public $action;
    public $selectedItem;


    protected $listeners = [
        'refreshParent' => '$refresh'
    ];

    public function selectItem($itemId, $action)
    {
        $this->selectedItem = $itemId;

        if ($action == 'delete') {
            // This will show the modal on the frontend
            $this->dispatchBrowserEvent('openDeleteModal');
        } else {
            $this->emit('getModelId', $this->selectedItem);
            $this->dispatchBrowserEvent('openModal');
        }
    }

    public function delete($id)
    {
        Data::destroy($id);
        $this->dispatchBrowserEvent('closeDeleteModal');
    }
    public function render()
    {
        return view('livewire.crud', [
            'datas' => Data::paginate(3)
        ]);
    }
}
