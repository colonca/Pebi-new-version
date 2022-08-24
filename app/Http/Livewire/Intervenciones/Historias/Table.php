<?php

namespace App\Http\Livewire\Intervenciones\Historias;

use App\Http\Livewire\Traits\InteractsWithFlashMessage;
use App\Http\Livewire\Traits\InteractsWithModal;
use App\Models\Generales\HistoriaPsicologica;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use File;

class Table extends Component
{

    use WithPagination;
    use InteractsWithFlashMessage;
    use InteractsWithModal;

    public function render()
    {
        $historias = HistoriaPsicologica::with('estudiante')
            ->paginate(8);
        return view('livewire.intervenciones.historias.table', [
            'historias' => $historias
        ]);
    }

    public function download($id)
    {
        $historia = HistoriaPsicologica::find($id);
        if ($historia) {
            $path = $historia->soporte;
            $ext = File::extension($path);
            $estudiante = $historia->estudiante;
            return Storage::download($path, "HISTORIA-$estudiante->primer_nombre-$estudiante->primer_apellido.$ext");
        }
        $this->message("Esta historia psicologica no ha sido cargada con ningun soporte.");
    }

    public function seguimiento($id)
    {
        $historia = HistoriaPsicologica::find($id);
        $this->openModal('forms.seguimiento-form',  $historia->load('estudiante.programa'), 'w-4/5');
    }

    public function ver_detalle($id)
    {
        $historia = HistoriaPsicologica::find($id);
        $this->openModal('forms.detalle-historia-form', $historia->load('estudiante.programa', 'seguimientos.tallerista'),  'w-4/5');
    }


    public function create()
    {
        return $this->openModal('forms.historias-form', [], 'w-4/5');
    }
}
