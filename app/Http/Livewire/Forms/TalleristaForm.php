<?php

namespace App\Http\Livewire\Forms;

use App\Http\Livewire\Traits\InteractsWithFlashMessage;
use App\Http\Livewire\Traits\InteractsWithModal;
use App\Models\Generales\Talleristas;
use Illuminate\Support\Arr;

class TalleristaForm extends BaseForm
{
    use InteractsWithModal;
    use InteractsWithFlashMessage;

    public $form = [
        'id' => null,
        'identificacion' => null,
        'nombres' => null,
        'celular' => null,
        'correo_personal' => null,
        'correo_institucional' => null,
        'numero_horas_semanales' => null,
        'tipo' => null,
    ];

    public $listeners = ['list:refresh' => 'render'];

    public function mount(array $params = [])
    {
        parent::mount($params);
        $this->title = isset($params['id']) ? 'Actualizar Tallerista' : 'Nuevo Tallerista';
    }

    public function submit()
    {
        $data = $this->validate()['form'];
        $model = Talleristas::updateOrCreate(
            ['id' => $data['id']],
            $data
        );
        $this->message('Tallerista Guardada Correctamente');
        $this->emit('list:refresh');
        $this->closeModal();
    }

    public function cancelar()
    {
        $this->closeModal();
    }

    public function rules()
    {
        return Arr::dot(['form' => Talleristas::validationRules()]);
    }

    public function render()
    {
        return view('livewire.forms.tallerista-form');
    }
}
