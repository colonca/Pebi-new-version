<?php

namespace App\Http\Livewire\Forms;

use App\Http\Livewire\Traits\InteractsWithFlashMessage;
use App\Http\Livewire\Traits\InteractsWithModal;
use App\Models\Generales\Remision;

class AtenderForm extends BaseForm
{

    use InteractsWithModal;
    use InteractsWithFlashMessage;

    public string $estudiante = '';
    public string $remision = '';

    public function mount(array $params = [])
    {
        parent::mount($params);
        $estudiante = $params['solicitud_relation']['estudiante_relation'];
        $this->estudiante = $estudiante['primer_nombre'] . ' ' . $estudiante['primer_apellido'];
        $this->remision = $params['id'];
        $this->title = "Atender Estudiante";
    }

    public function submit()
    {
        $remision = Remision::findOrFail($this->remision);
        $remision->estado = 'FINALIZADA';
        $remision->save();
        $this->emit('list:refresh');
        $this->closeModal();
        $this->message('Estudiante atendido correctamente');
    }

    public function cancel()
    {
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.forms.atender-form');
    }
}
