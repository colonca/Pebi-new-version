<?php

namespace App\Http\Livewire\Components;

use App\Http\Livewire\Traits\InteractsWithFlashMessage;
use Livewire\Component;

class DeleteModal extends Component
{

    use InteractsWithFlashMessage;

    public bool $isOpen =  false;
    public $model;

    protected $listeners = ['showModal' => 'open', 'closeModal' => 'close'];

    public function open($model)
    {
        $this->isOpen = true;
        $this->model = $model;
    }

    public function close()
    {
        $this->isOpen =  false;
    }

    public function delete()
    {
        $model = $this->model['className']::find($this->model['id']);
        $model->delete();
        $this->message('Registro eliminado correctamente');
        $this->isOpen = false;
        $this->emit('list:refresh');
    }

    public function render()
    {
        return view('livewire.components.delete-modal');
    }
}
