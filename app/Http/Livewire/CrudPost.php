<?php

namespace App\Http\Livewire;

use App\Models\Data;
use Livewire\Component;

class CrudPost extends Component
{
    public $title;
    public $modelId;

    protected $listeners = [
        'getModelId',
        'forcedCloseModal'
    ];

    public function getModelId($modelId)
    {
        $this->modelId = $modelId;

        $model = Data::find($this->modelId);

        $this->title = $model->title;
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|max:20',
        ]);

        $data = [
            'title' => $this->title,
        ];

        if ($this->modelId) {
            Data::find($this->modelId)->update($data);
        } else {
            Data::create($data);
        }

        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('closeModal');
        $this->cleanVars();
    }

    public function forcedCloseModal()
    {
        // This is to reset our public variables
        $this->cleanVars();

        // These will reset our error bags
        $this->resetErrorBag();
        $this->resetValidation();
    }

    private function cleanVars()
    {
        $this->modelId = null;
        $this->title = null;
    }

    public function render()
    {
        return view('livewire.crud-post');
    }
}
