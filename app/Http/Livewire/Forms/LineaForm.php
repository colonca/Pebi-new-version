<?php

namespace App\Http\Livewire\Forms;

use App\Http\Livewire\Traits\InteractsWithFlashMessage;
use App\Http\Livewire\Traits\InteractsWithModal;
use App\Models\Generales\Linea;
use Illuminate\Support\Arr;

class LineaForm extends BaseForm
{
	use InteractsWithFlashMessage;
	use InteractsWithModal;

	public $form = [
		'id' => null,
		'nombre' => null,
		'slug' => null
	];

	public function rules()
	{
		return Arr::dot(['form' => Linea::validationRules()]);
	}

	public function mount(array $params = [])
	{
		parent::mount($params);
		$this->title = isset($form['id']) ? 'Actualizar Linea' :  'Crear Linea';
	}

	public function submit()
	{
		$data = $this->validate()['form'];
		$model = Linea::updateOrCreate(
			['id' => $data['id']],
			$data
		);
		$model->save();
		$this->message('Linea Guardada Correctamente');
		$this->emit('list:refresh');
		$this->closeModal();
	}

	public function cancelar()
	{
		$this->closeModal();
	}

	public function render()
	{
		return view('livewire.forms.linea-form', ['lineas' => Linea::all()]);
	}
}
