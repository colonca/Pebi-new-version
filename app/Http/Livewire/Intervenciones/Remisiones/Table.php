<?php

namespace App\Http\Livewire\Intervenciones\Remisiones;

use App\Http\Livewire\Traits\InteractsWithFlashMessage;
use App\Http\Livewire\Traits\InteractsWithModal;
use App\Models\Generales\Remision;
use App\Models\Intervenciones\Solicitud;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Table extends Component
{

    use InteractsWithModal;
    use InteractsWithFlashMessage;

    public $listeners = ['list:refresh' => 'render'];

    public function render()
    {
        return view('livewire.intervenciones.remisiones.table', [
            'remisiones' => Remision::with('talleristaRelation', 'solicitudRelation')->where('estado', 'PENDIENTE')->paginate(8)
        ]);
    }

    public function remitir($id)
    {
        $solicitud = Solicitud::find($id);
        if (!$solicitud)
            return;

        if ($solicitud->estado === 'CANCELADA' || $solicitud->estado === 'ATENDIDO') {
            $this->message('La solicitud que esta intentando modificar no se puede reagendar.', 'warning');
        }

        $this->openModal('forms.remision-form', ['solicitud' => $solicitud->id, 'area' => $solicitud->motivo], 'w-3/5');
    }

    public function atender($remision)
    {
        $remision = Remision::find($remision);
        $this->openModal('forms.atender-form', [$remision], 'w-3/5');
    }
}
