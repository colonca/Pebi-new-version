<?php

namespace App\Http\Livewire\Intervenciones\Grupales;

use App\Models\Generales\Asignaturas;
use App\Models\Generales\Programas;
use App\Models\Generales\TalleresGrupales;
use App\Models\Intervenciones\IntervencionesGrupales;
use App\Support\Concerns\InteractsWithFlashMessage;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{

    use WithPagination;
    use InteractsWithFlashMessage;

    public bool $confirmacion = false;
    public $intervencion_id;

    public function render()
    {
        return view('livewire.intervenciones.grupales.table',[
            'programas' => Programas::all(),
            'talleres' => TalleresGrupales::all(),
            'asignaturas' => Asignaturas::all(),
            'intervenciones' => IntervencionesGrupales::paginate(8),
        ]);
    }

    public function showModal($id) {
        $this->intervencion_id = $id;
        $this->confirmacion = true;
    }

    public function delete() {
        IntervencionesGrupales::find($this->intervencion_id)->delete();
        $this->confirmacion = false;
        $this->message('Intervencion grupal eliminada correctamente');
    }

}
