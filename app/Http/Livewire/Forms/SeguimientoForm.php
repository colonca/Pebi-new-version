<?php

namespace App\Http\Livewire\Forms;

use App\Http\Livewire\Traits\InteractsWithFlashMessage;
use App\Http\Livewire\Traits\InteractsWithModal;
use App\Models\Generales\Seguimiento;
use App\Models\Generales\Talleristas;
use Exception;
use Illuminate\Support\Arr;

class SeguimientoForm extends BaseForm
{

    use InteractsWithModal;
    use InteractsWithFlashMessage;

    public $estudiante = [];

    public $form = [
        "seguimiento" => '',
        "conclusion" => '',
        "tallerista_id" => '',
        "historia_id" => '',
        "remision_ips" => 'NO',
    ];

    public function mount(array $params = [])
    {
        parent::mount($params);
        $this->form['historia_id'] = $params['id'];
        if (isset($params['estudiante'])) {
            $this->estudiante = $params['estudiante'];
            $this->estudiante['nombres'] = $params['estudiante']['primer_nombre'] . ' ' . $params['estudiante']['primer_apellido'];
        }
    }

    public function cancelar()
    {
        $this->closeModal();
    }

    public function submit()
    {
        $data = $this->validate()['form'];
        try {
            $seguimiento = new Seguimiento($data);
            $seguimiento->save();
            $this->message('Seguimiento Guardado Correctamente');
            $this->emit('list:refresh');
            $this->closeModal();
        } catch (Exception $e) {
            dd($e);
            $this->message('Hubo un error en el servidor, por favor contacta con el administrador.');
        }
    }


    public function rules()
    {
        return Arr::dot(['form' => Seguimiento::validationRules()]);
    }

    public function render()
    {
        $talleristas = Talleristas::all()->pluck('nombres', 'id');
        return view('livewire.forms.seguimiento-form', ['talleristas' => $talleristas]);
    }
}
