<?php

namespace App\Http\Livewire\Forms;

use App\Http\Livewire\Traits\InteractsWithFlashMessage;
use App\Http\Livewire\Traits\InteractsWithModal;
use App\Models\Generales\Docentes;
use App\Models\Generales\Talleristas;
use App\Models\User;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DocenteForm extends BaseForm
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
	];

	public $listeners = ['list:refresh' => 'render'];

	public function mount(array $params = [])
	{
		parent::mount($params);
		$this->title = isset($params['id']) ? 'Actualizar Docente' : 'Nuevo Docente';
	}

	public function submit()
	{
		$data = $this->validate()['form'];
		try {
			DB::beginTransaction();
			$docente = Docentes::updateOrCreate(
				['id' => $data['id']],
				$data
			);
			$user = User::where('model', $docente->id)->first();
			$user = User::updateOrCreate(
				['id' => $user ? $user->id : null],
				[
					'name' => $docente->nombres,
					'email' => $docente->correo_institucional,
					'email_verified_at' => now(),
					'password' => bcrypt($docente->identificacion),
					'remember_token' => Str::random(10),
					'model' => $docente->id,
				]
			);
			$user->assignRole('docente-permanencia');
			DB::commit();
			$this->message('Docente Guardado Correctamente');
			$this->emit('list:refresh');
			$this->closeModal();
		} catch (Exception $e) {
			DB::rollBack();
			$this->message('Hubo un error en el servidor, por favor contacta con el administrador.');
		}
	}

	public function cancelar()
	{
		$this->closeModal();
	}

	public function rules()
	{
		return Arr::dot(['form' => Docentes::validationRules()]);
	}

	public function render()
	{
		return view('livewire.forms.docentes-form');
	}
}
