<?php

namespace App\Http\Livewire\Forms;

use App\Http\Livewire\Traits\InteractsWithFlashMessage;
use App\Http\Livewire\Traits\InteractsWithModal;
use App\Models\Calendario\Event;
use App\Models\Generales\Asignaturas;
use App\Models\Generales\Estudiantes;
use App\Models\Generales\Programas;
use App\Models\Generales\TalleresGrupales;
use App\Models\Generales\Campanhas;
use App\Models\Generales\Talleristas;
use App\Models\Intervenciones\IntervencionesGrupales;
use Illuminate\Support\Arr;

class IntervencionGrupalForm extends BaseForm
{

    use InteractsWithFlashMessage;
    use InteractsWithModal;

    public $form = [
        'id' => null,
        'programa_id' => null,
        'asignatura_id' => null,
        'campanha_id' => null,
        'taller_id' => null,
        'tallerista_id' => null,
        'fecha' => null,
        'lugar' => null,
        'profesor' => null,
        'celular_profesor' => null,
        'type' => IntervencionesGrupales::class,
        'estudiantes' => []
    ];

    public $asignaturas = [];
    public $talleres = [];
    public string $query = '';



    public function rules()
    {
        return Arr::dot(['form' => IntervencionesGrupales::validationRules()]);
    }

    public function mount(array $params = [])
    {
        parent::mount($params);
        $this->title = isset($params['id']) ? 'Actualizar Intervención Grupal' : 'Nueva Intervención Grupal';
    }

    public function search(): void
    {

        $estudiante = Estudiantes::where('identificacion', $this->query)->first();

        if ($estudiante === null) {
            $this->message('No se encontraron registros para está identificación', 'danger');
            return;
        }

        $estudiantesConEstaMismaIdentificacion = array_filter($this->form['estudiantes'], function ($item) use ($estudiante) {
            return $item['identificacion'] === $estudiante->identificacion;
        });

        if (count($estudiantesConEstaMismaIdentificacion) !== 0) {
            $this->message('El actual estudiante ya se encuentra registrado', 'danger');
            return;
        }

        $this->form['estudiantes'][] = $estudiante;
        $this->query = '';
    }

    public function delete(string $identificacion): void
    {
        $this->form['estudiantes'] = array_filter($this->form['estudiantes'], function ($item) use ($identificacion) {
            return $item['identificacion']  !== $identificacion;
        });
    }

    public function cancelar(): void
    {
        $this->closeModal();
    }

    public function submit(): void
    {
        $data = $this->validate()['form'];
        $model = IntervencionesGrupales::updateOrCreate(
            ['id' => $data['id']],
            $data
        );
        $model->save();
        $estudiantes = array_map(function ($item) {
            return $item['id'];
        }, $data['estudiantes']);
        $model->estudiantes()->sync($estudiantes);
        $this->message('Intervención Grupal Guardada Correctamente');
        //agendar o actualizar evento
        $event = Event::where('description', 'like', '%' . $model->id . '%')->first();
        $event = $event ? $event->id : null;
        $event = Event::updateOrCreate(
            ['id' => $event],
            [
                'title' => 'Intervencion Grupal',
                'description' => json_encode([
                    'id' => $model->id,
                    'asignatura' => $model->asignatura->nombre,
                    'programa' => $model->programa->nombre,
                    'taller' => $model->taller->nombre,
                    'tallerista' => $model->tallerista->nombres,
                    'lugar' => $model->lugar,
                    'profesor' => $model->profesor,
                    'celular_profesor' => $model->celular_profesor

                ]),
                'type' => 'Intervencion Grupal',
                'start' => $data['fecha']
            ]
        );
        $event->save();
        $this->emit('list:refresh');
        $this->closeModal();
    }

    public function render()
    {
        if (!empty($this->form['programa_id'])) {
            $this->asignaturas = Asignaturas::where('programa_id', $this->form['programa_id'])->get();
        }

        if (!empty($this->form['campanha_id'])) {
            $this->talleres = TalleresGrupales::where('campanha_id', $this->form['campanha_id'])->get();
        }

        return view('livewire.forms.intervencion-grupal-form', [
            'programas' => Programas::orderBy('nombre')->get(),
            'campanhas' => Campanhas::orderBy('nombre')->get(),
            'talleristas' => Talleristas::orderBy('nombres')->get(),
        ]);
    }
}
