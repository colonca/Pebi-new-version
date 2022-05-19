<?php

namespace App\Http\Livewire\Forms;

use App\Http\Livewire\Traits\InteractsWithFlashMessage;
use App\Http\Livewire\Traits\InteractsWithModal;
use App\Models\Generales\Horario;
use App\Models\Generales\Remision;
use App\Models\Generales\Talleristas;
use App\Models\Intervenciones\Solicitud;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class RemisionForm extends BaseForm
{
    use InteractsWithModal;
    use InteractsWithFlashMessage;

    public $disponibilidad = [];

    public $form = [
        'area' => '',
        'tallerista' => '',
        'horario' => '',
        'solicitud' => '',
    ];

    public function rules()
    {
        return Arr::dot(['form' => Remision::validationRules()]);
    }

    public function disponibilidad($id)
    {
        $tallerista = Talleristas::find($id);
        if ($tallerista) {
            $array = [];
            foreach ($tallerista->horarios as $horario) {
                $after = $horario->hora + 1;
                $array[$horario->id] = "$horario->dia : $horario->hora - $after";
            }
            $this->disponibilidad = $array;
        }
    }

    public function mount(array $params = [])
    {
        parent::mount($params);
        $this->title = "REMITIR SOLICITUD";
        $remision = Remision::where('solicitud', $params['solicitud'])->first();
        if ($remision) {
            $this->form['area'] = $remision->area;
            $this->form['tallerista'] = $remision->tallerista;
            $this->disponibilidad($this->form['tallerista']);
        }
    }

    private function nextDate($dia, $hora)
    {
        $array = [
            'LUNES' => 'monday',
            'MARTES' => 'tuesday',
            'MIERCOLES' => 'wednesday',
            'JUEVES' => 'thursday',
            'VIERNES' => 'friday',
            'SABADO' => 'saturday',
            'DOMINGO' => 'sunday',
        ];
        $date = strtotime('next ' . $array[$dia]);
        $date = date('Y-m-d H:i:s', $date);
        if ($hora > 9) {
            $aux = strval($hora);
            $date[11] = $aux[0];
            $date[12] = $aux[1];
        } else {
            $date[12] = $hora;
        }

        return $date;
    }

    public function submit()
    {
        $data = $this->validate()['form'];
        $horario = Horario::find($data['horario']);
        if (!$horario) {
            $this->message('Error inesperado el horario seleccionado no se encuentra en nuestros registros, por favor verifique he intente nuevamente.', 'error');
            $this->closeModal();
            return;
        }

        $date = $this->nextDate($horario->dia, $horario->hora);
        $remisiones = Remision::where([['fecha_cita', $date], ['tallerista', $data['tallerista']]])->count();

        if ($remisiones > 2) {
            $this->message('El tallerista ya se encuentra ocupado para la fecha seleccionada', 'error');
            return;
        }

        $data['estado'] = 'PENDIENTE';
        $data['fecha_cita'] = $date;

        try {
            DB::beginTransaction();
            $solicitud = Solicitud::find($data['solicitud']);
            $solicitud->estado = 'REMITIDA';
            $solicitud->fecha_remision = $date;
            $solicitud->save();

            $remision = Remision::find($data['solicitud']);

            if ($remision && $remision->estado === 'FINALIZADA') {
                $this->message('La remision que intenta actualizar ya fue finalizada.', 'error');
                return;
            }

            $remision = Remision::updateOrCreate(
                ['id' => $data['solicitud']],
                $data
            );

            $this->message('La solicitud ha sido remitida correctamente.');
            $this->closeModal();
            $this->emit('list:refresh');
            DB::commit();
        } catch (Exception $e) {
            $this->message('ha ocurrido un error inesperado, por favor intentelo más tarde.', 'error');
            DB::rollBack();
        }
    }

    public function cancelar()
    {
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.forms.remision-form', [
            'talleristas' => Talleristas::with('horarios')
                ->where('tipo', 'PROFESIONAL')->get(),
        ]);
    }
}
