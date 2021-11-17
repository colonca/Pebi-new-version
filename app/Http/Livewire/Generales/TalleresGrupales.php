<?php

namespace App\Http\Livewire\Generales;

use App\Http\Livewire\Traits\InteractsWithFlashMessage;
use App\Http\Livewire\Traits\InteractsWithModal;
use App\Models\Generales\TalleresGrupales as Talleres;
use Livewire\Component;
use Livewire\WithPagination;

class TalleresGrupales extends Component
{
    use WithPagination;
    use InteractsWithModal;
    use InteractsWithFlashMessage;

    public $taller_id;
    public string $nombre = '';
    public string $descripcion = '';
    public bool $confirmacion = false;
    public bool $updateMode = false;

    public $listeners = ['list:refresh' => 'render'];

    public function render()
    {
        return view('livewire.generales.talleres-grupales.talleres-grupales', [
            'talleres' => Talleres::with('campanha')->paginate(8)
        ]);
    }

    public function create()
    {
        $this->openModal('forms.taller-grupal-form', [], 'w-2/3');
    }

    public function edit($id)
    {
        $taller = Talleres::findOrFail($id);
        $this->openModal('forms.taller-grupal-form', $taller->load('campanha'), 'w-2/3');
    }

    public function resetInputFields()
    {
        $this->nombre = '';
        $this->descripcion = '';
        $this->updateMode = false;
    }

    public function cancelar()
    {
        $this->resetInputFields();
        $this->updateMode = false;
    }

    public function delete($id)
    {
        $taller = Talleres::findOrFail($id);
        $this->deleteModal($taller);
    }
}
