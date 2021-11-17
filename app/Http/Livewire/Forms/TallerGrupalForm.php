<?php

namespace App\Http\Livewire\Forms;

use App\Http\Livewire\Traits\InteractsWithFlashMessage;
use App\Http\Livewire\Traits\InteractsWithModal;
use App\Models\Generales\Campanhas as GeneralesCampanhas;
use App\Models\Generales\TalleresGrupales;
use Illuminate\Support\Arr;

class TallerGrupalForm extends BaseForm
{

    use InteractsWithModal;
    use InteractsWithFlashMessage;

    public $form = [
        'id' => null,
        'nombre' => null,
        'descripcion' => null,
        'campanha_id' => null,
    ];

    public function mount(array $params = [])
    {
        parent::mount($params);
        $this->title = isset($params['id']) ? 'Actualizar Taller Grupal' : 'Nuevo Taller Grupal';
    }

    public function rules()
    {
        return Arr::dot(['form' => TalleresGrupales::validationRules()]);
    }


    public function render()
    {
        return view('livewire.forms.taller-grupal-form', [
            'campanhas' => GeneralesCampanhas::all()
        ]);
    }

    public function submit()
    {
        $data = $this->validate()['form'];
        $model = TalleresGrupales::updateOrCreate(
            ['id' => $data['id']],
            $data
        );
        $model->save();
        $this->message('Taller Grupal Guardado Correctamente');
        $this->emit('list:refresh');
        $this->closeModal();
    }
}
