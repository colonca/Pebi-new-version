<?php

namespace App\Http\Livewire\Forms;

use App\Http\Livewire\Traits\InteractsWithFlashMessage;
use App\Http\Livewire\Traits\InteractsWithModal;
use App\Models\Generales\Asignaturas;
use App\Models\Generales\Estudiantes;
use App\Models\Generales\Programas;
use App\Models\Generales\TalleresGrupales;
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
        'taller_id' => null,
        'type' => IntervencionesGrupales::class,
        'fecha' => '',
        'estudiantes' => []
    ];

    public $asignaturas = [];
    public string $query = '';

    public function rules() {
        return Arr::dot(['form' => IntervencionesGrupales::validationRules()]);
    }

    public function mount(array $params = []) {
        parent::mount($params);
        $this->title = isset($params['id']) ? 'Actualizar Intervención Grupal' : 'Nueva Intervención Grupal';
    }

    public function search() : void {

        $estudiante = Estudiantes::where('identificacion',$this->query)->first();

        if($estudiante === null) {
          $this->message('No se encontraron registros para está identificación','danger');         
          return;
        }

        $estudiantesConEstaMismaIdentificacion = array_filter($this->form['estudiantes'], function($item) use($estudiante) {
            return $item['identificacion'] === $estudiante->identificacion;
        });

        if(count($estudiantesConEstaMismaIdentificacion) !== 0){
          $this->message('El actual estudiante ya se encuentra registrado','danger');
          return;
        }

        $this->form['estudiantes'][] = $estudiante;
        $this->query = '';
    }

    public function delete(string $identificacion) : void {
        $this->form['estudiantes'] = array_filter($this->form['estudiantes'],function($item) use($identificacion) {
             return $item['identificacion']  !== $identificacion;
        });
    } 

    public function cancelar() : void {
       $this->closeModal();
    }

    public function submit() : void {
        $data = $this->validate()['form'];
        $model = IntervencionesGrupales::updateOrCreate(
            ['id' => $data['id']],
            $data
        );
        $model->save();
        $estudiantes = array_map(function($item) {
            return $item['id'];
        }, $data['estudiantes']);
        $model->estudiantes()->sync($estudiantes);
        $this->message('Intervención Grupal Guardada Correctamente');
        $this->closeModal();
    }

    public function render()
    {
        if(!empty($this->form['programa_id'])){
            $this->asignaturas = Asignaturas::where('programa_id',$this->form['programa_id'])->get();
        }

        return view('livewire.forms.intervencion-grupal-form',[
            'programas' => Programas::orderBy('nombre')->get(),
            'talleres' => TalleresGrupales::orderBy('nombre')->get(),
        ]);
    }
}
