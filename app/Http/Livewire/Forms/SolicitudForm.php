<?php

namespace App\Http\Livewire\Forms;

use App\Http\Livewire\Traits\InteractsWithFlashMessage;
use App\Http\Livewire\Traits\InteractsWithModal;
use App\Models\Intervenciones\Solicitud;
use App\Models\Generales\Estudiantes;
use App\Models\Generales\Horario;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class SolicitudForm extends BaseForm
{
    use InteractsWithModal;
    use InteractsWithFlashMessage;

    public $query = '';
    public $estudiante;
    public bool $loading = false;

    public $form = [
        'id' => '',
        'estado' => 'PENDIENTE',
        'motivo' => '',
        'discapacidad' => '',
        'esDiscapacitado' => '',
        'estudiante' => '',
        'fecha' => '',
        'disponibilidad' => []
    ];

    public function mount(array $params = [])
    {
        $this->form['fecha'] = date('Y-m-d');

        parent::mount($params);

        if (array_key_exists('id', $params)) {
            $solicitud = Solicitud::find($params['id']);
            if ($solicitud && $solicitud->estado !== 'PENDIENTE') {
                $this->closeModal();
                $this->message('Operacion no valida.');
                return;
            }
        }

        if (array_key_exists('estudiante', $params)) {
            $estudiante = Estudiantes::find($params['estudiante']);
            $this->estudiante = $estudiante;
        }
        if (array_key_exists('horarios', $params)) {
            foreach ($params['horarios'] as $horario) {
                $key = $horario['dia'] . '-' . $horario['hora'];
                $this->form['disponibilidad'][$key] =  ['dia' => $horario['dia'], 'hora' => $horario['hora']];
            }
        }
    }

    public function rules()
    {
        return Arr::dot(['form' => Solicitud::validationRules()]);
    }

    public function search(): void
    {
        $estudiante = Estudiantes::where('identificacion', $this->query)->first();
        $hoy = date("Y-m-d");

        if ($estudiante === null) {
            $this->message('No se encontraron registros para está identificación', 'danger');
            return;
        }

        $estudiante->edad = date_diff(date_create($estudiante->fecha_nacimiento), date_create($hoy))->y;

        $this->estudiante = $estudiante;
        $this->form['estudiante'] = $estudiante->id;
        $this->query = '';
    }

    public function submit()
    {
        $data = $this->validate()['form'];

        if (!array_key_exists('id', $data) && Solicitud::where([['estudiante', $data['estudiante'], ['fecha', $data['fecha']]]])->count() > 0) {
            $this->message('Operacion no valida, el estudiante ya tiene una solicitud para el dia ' . $data['fecha']);
            $this->closeModal();
            return;
        }

        try {
            $this->loading = true;
            $solicitud = Solicitud::updateOrCreate(
                ['id' => $data['id']],
                $data
            );
            if (count($this->form['disponibilidad']) > 0) {
                $dis = [];
                foreach ($this->form['disponibilidad'] as $value) {
                    $horario = Horario::where([['dia', strtoupper($value['dia'])], ['hora', $value['hora']]])->first();
                    $dis[] = $horario->id;
                }
                $solicitud->horarios()->sync($dis);
            }
            $this->loading = false;
            $this->message('Solicitud Guardada Correctamente');
            $this->emit('list:refresh');
            $this->closeModal();
        } catch (Exception $e) {
            $this->loading = false;
            DB::rollBack();
            $this->message('Hubo un error en el servidor, por favor contacta con el administrador.');
        }
    }

    public function cancelar()
    {
        $this->closeModal();
    }

    public function toggle($dia, $hora)
    {
        $key = $dia . '-' . $hora;
        if (array_key_exists($key, $this->form['disponibilidad'])) {
            unset($this->form['disponibilidad'][$key]);
            return;
        }
        $this->form['disponibilidad']["$dia-$hora"] = ['dia' => $dia, 'hora' => $hora];
    }

    public function render()
    {
        return view('livewire.forms.solicitud-form', [
            'disponibilidad' => $this->form['disponibilidad']
        ]);
    }
}
