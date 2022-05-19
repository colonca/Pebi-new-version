<?php

namespace App\Http\Livewire\Forms;

use App\Http\Livewire\Traits\InteractsWithFlashMessage;
use App\Http\Livewire\Traits\InteractsWithModal;
use App\Models\Generales\Horario;
use App\Models\Generales\Talleristas;
use App\Models\User;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
        'disponibilidad' => []
	];

	public $listeners = ['list:refresh' => 'render'];

	public function mount(array $params = [])
	{
		parent::mount($params);
        if(array_key_exists('horarios', $params)){
            foreach ($params['horarios'] as $horario){
                $key = $horario['dia'].'-'.$horario['hora'];
                $this->form['disponibilidad'][$key] =  ['dia' => $horario['dia'], 'hora' => $horario['hora']];
            }
        }

		$this->title = isset($params['id']) ? 'Actualizar Tallerista' : 'Nuevo Tallerista';
	}

	public function submit()
	{
		$data = $this->validate()['form'];
		try {
			DB::beginTransaction();
			$tallerista = Talleristas::updateOrCreate(
				['id' => $data['id']],
				$data
			);
            if (count($this->form['disponibilidad']) > 0) {
                $dis = [];
                foreach ($this->form['disponibilidad'] as $value) {
                    $horario = Horario::where([['dia', strtoupper($value['dia'])], ['hora', $value['hora']]])->first();
                    $dis[] = $horario->id;
                }
                $tallerista->horarios()->sync($dis);
            }
			$user = User::where('model', $tallerista->id)->first();
			$user = User::updateOrCreate(
				['id' => $user ? $user->id : null],
				[
					'name' => $tallerista->nombres,
					'email' => $tallerista->correo_institucional,
					'email_verified_at' => now(),
					'password' => bcrypt($tallerista->identificacion),
					'remember_token' => Str::random(10),
					'model' => $tallerista->id,
				]
			);
			if ($tallerista->tipo === 'PRACTICANTE')
				$user->assignRole('tallerista-practicante');
			$user->assignRole('tallerista-profesional');
			DB::commit();
			$this->message('Tallerista Guardada Correctamente');
			$this->emit('list:refresh');
			$this->closeModal();
		} catch (Exception $e) {
			DB::rollBack();
			$this->message('Hubo un error en el servidor, por favor contacta con el administrador.');
		}
	}

    public function toggle($dia,$hora){
        $key = $dia.'-'.$hora;
        if(array_key_exists($key,$this->form['disponibilidad'])){
            unset($this->form['disponibilidad'][$key]);
            return;
        }
        $this->form['disponibilidad']["$dia-$hora"] = ['dia' => $dia, 'hora' => $hora];
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
		return view('livewire.forms.tallerista-form',[
            'disponibilidad' => $this->form['disponibilidad']
        ]);
	}

}
