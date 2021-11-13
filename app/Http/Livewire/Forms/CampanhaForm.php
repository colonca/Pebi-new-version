<?php

namespace App\Http\Livewire\Forms;

use App\Http\Livewire\Traits\InteractsWithFlashMessage;
use App\Http\Livewire\Traits\InteractsWithModal;
use App\Models\Generales\Campanhas;
use Illuminate\Support\Arr;
use Livewire\WithFileUploads;

class CampanhaForm extends  BaseForm
{

    use WithFileUploads;
    use InteractsWithFlashMessage;
    use InteractsWithModal;

    public $form = [
        'id' => null,
        'nombre' => null,
        'poblacion' => null,
        'imagen' => null
    ];

    public function rules()
    {
        return Arr::dot(['form' => Campanhas::validationRules()]);
    }


    public function mount(array $params = [])
    {
        parent::mount($params);
        $this->title = isset($params['id']) ? 'Actualizar Campaña' : 'Nueva Campaña';
    }

    public function submit()
    {
        $data = $this->validate()['form'];
        $model = Campanhas::updateOrCreate(
            ['id' => $data['id']],
            $data
        );
        $model->save();
        $this->message('Campaña Guardada Correctamente');
        $this->emit('list:refresh');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.forms.campanha-form');
    }
}
