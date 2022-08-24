<?php

namespace App\Http\Livewire\Forms;

use App\Http\Livewire\Traits\InteractsWithFlashMessage;
use App\Http\Livewire\Traits\InteractsWithModal;
use App\Models\Generales\Seguimiento;

class DetalleHistoriaForm extends BaseForm
{
    use InteractsWithModal;
    use InteractsWithFlashMessage;

    public $title = 'Detalle';

    public $historia = '';
    public $detalle = null;

    public function mount(array $params = [])
    {
        parent::mount($params);
        $this->historia = $params;
    }

    public function ver_detalle($id)
    {
        $detalle = Seguimiento::find($id)->load('tallerista');
        $this->detalle = $detalle;
    }

    public function render()
    {
        return view('livewire.forms.detalle-historia-form');
    }
}
