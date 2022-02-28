<?php

namespace App\Http\Livewire\Forms;

use App\Models\Generales\PeriodosAcademicos;
use App\Models\Generales\PeriodosAcademicos as AcademicoPeriodo;
use App\Http\Livewire\Traits\InteractsWithFlashMessage;
use App\Http\Livewire\Traits\InteractsWithModal;
use Illuminate\Support\Arr;
use Livewire\WithFileUploads;

class PeriodosForm extends  BaseForm
{

	use WithFileUploads;
	use InteractsWithFlashMessage;
	use InteractsWithModal;

	public $form = [
		'id' => null,
		'estado' => null,
		'periodo' => null,
		'fecha_inicio' => null,
		'fecha_fin' => null,
		'anio' => null,
	];

	public function rules()
	{
		return Arr::dot(['form' => AcademicoPeriodo::validationRules()]);
	}


	public function mount(array $params = [])
	{
		parent::mount($params);
		$this->title = isset($params['id']) ? 'Actualizar Período' : 'Nuevo Período';
	}

	public function submit()
	{
		$data = $this->validate()['form'];
        $exist = PeriodosAcademicos::where([['periodo',$data['periodo']],['anio',$data['anio']]])->first();
        if($exist){
            $this->message('Ya existe un período con los mismos datos.','danger');
            $this->closeModal();
            return;
        }
		$model = AcademicoPeriodo::updateOrCreate(
			['id' => $data['id']],
			$data
		);
		$model->save();
		$this->message('Período Guardado Correctamente');
		$this->emit('list:refresh');
		$this->closeModal();
	}

	public function cancelar()
	{
		$this->closeModal();
	}

	public function render()
	{
		return view('livewire.forms.periodos-form');
	}
}
