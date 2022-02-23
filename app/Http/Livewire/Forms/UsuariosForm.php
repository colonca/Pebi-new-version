<?php

namespace App\Http\Livewire\Forms;

use App\Http\Livewire\Traits\InteractsWithFlashMessage;
use App\Http\Livewire\Traits\InteractsWithModal;
use App\Models\Generales\Talleristas;
use App\Models\User;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UsuariosForm extends BaseForm
{
	use InteractsWithModal;
	use InteractsWithFlashMessage;

	public $form = [
		'id' => null,
		'name' => null,
        'email' => null,
		'password' => null,
        'password_confirmation' => null,
	];

	public $listeners = ['list:refresh' => 'render'];

	public function mount(array $params = [])
	{
		parent::mount($params);
		$this->title = isset($params['id']) ? 'Actualizar Usuario' : 'Nuevo Usuario';
	}

	public function submit()
	{
		$data = $this->validate()['form'];
		try {
			DB::beginTransaction();
			$tallerista = User::updateOrCreate(
				['id' => $data['id']],
				$data
			);
			$user = User::where('model', $tallerista->id)->first();
			$user = User::updateOrCreate(
                ['id' => $data['id']],
				[
					'name' => $data['name'],
					'email' => $data['email'],
					'email_verified_at' => now(),
					'password' => bcrypt($data['password']),
					'remember_token' => Str::random(10),
				]
			);
			$user->assignRole($data['rol']);
			DB::commit();
			$this->message('Usuario Guardado Correctamente');
			$this->emit('list:refresh');
			$this->closeModal();
		} catch (Exception $e) {
            dd($e);
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
		return Arr::dot(['form' => User::validationRules()]);
	}

	public function render()
	{
		return view('livewire.forms.usuarios-form',[
            'roles'=> Role::all()->pluck('name','id'),
        ]);
	}
}
