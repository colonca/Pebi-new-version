<?php

namespace App\Http\Livewire\Generales;

use App\Http\Livewire\Traits\InteractsWithFlashMessage;
use App\Http\Livewire\Traits\InteractsWithModal;
use App\Models\Generales\Docentes as GeneralesDocentes;
use Livewire\Component;

class Docentes extends Component
{
    use InteractsWithModal;
    use InteractsWithFlashMessage;

    public $listeners = ['list:refresh' => 'render'];

    public function create()
    {
        $this->openModal('forms.docente-form', [], 'w-3/5');
    }
    public function edit($id)
    {
        $docente = GeneralesDocentes::findOrFail($id);
        $this->openModal('forms.docente-form', $docente, 'w-3/5');
    }

    public function delete($id)
    {
        $docente = GeneralesDocentes::findOrFail($id);
        $this->deleteModal($docente);
    }
    public function render()
    {
        return view('livewire.generales.docentes.docentes',[
            'docentes'=> GeneralesDocentes::paginate(8),
        ]);
    }
}
