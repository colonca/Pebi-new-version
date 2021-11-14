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
            'talleres' => Talleres::paginate(10)
        ]);
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

    public function store(): void
    {

        $this->validate([
            'nombre' => 'required'
        ]);

        Talleres::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion
        ]);
        $this->resetInputFields();
        $this->message('Taller grupal guardado correctamente');
    }

    public function edit($id)
    {
        $taller = Talleres::findOrFail($id);
        $this->taller_id =  $taller->id;
        $this->nombre = $taller->nombre;
        $this->descripcion = $taller->descripcion ?? '';
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'nombre' => 'required'
        ]);
        $taller = Talleres::find($this->taller_id);
        $taller->update([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion
        ]);
        $this->updateMode = false;
        $this->message('Taller grupal actualizado correctamente');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        $this->resetInputFields();
        $taller = Talleres::find($id);
        $this->deleteModal($taller);
    }
}
