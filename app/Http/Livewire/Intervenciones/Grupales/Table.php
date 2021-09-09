<?php

namespace App\Http\Livewire\Intervenciones\Grupales;

use App\Models\Generales\Programas;
use App\Models\Generales\TalleresGrupales;
use Livewire\Component;

class Table extends Component
{
    public function render()
    {
        return view('livewire.intervenciones.grupales.table',[
            'programas' => Programas::all(),
            'talleres' => TalleresGrupales::all()
        ]);
    }
}
