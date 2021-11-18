<?php

namespace App\Http\Livewire\Generales;

use App\Http\Livewire\Traits\InteractsWithFlashMessage;
use App\Http\Livewire\Traits\InteractsWithModal;
use App\Models\Generales\Talleristas as GeneralesTalleristas;
use Livewire\Component;

class Talleristas extends Component
{
    use InteractsWithModal;
    use InteractsWithFlashMessage;

    public $listeners = ['list:refresh' => 'render'];


    public function create()
    {
        $this->openModal('forms.tallerista-form', [], 'w-9/12');
    }

    public function edit($id)
    {
        $tallerista = GeneralesTalleristas::findOrFail($id);
        $this->openModal('forms.tallerista-form', $tallerista, 'w-9/12');
    }

    public function delete($id)
    {
        $tallerista = GeneralesTalleristas::findOrFail($id);
        $this->deleteModal($tallerista);
    }

    public function render()
    {
        return view('livewire.generales.talleristas.talleristas', [
            'talleristas' => GeneralesTalleristas::paginate(8),
        ]);
    }
}
