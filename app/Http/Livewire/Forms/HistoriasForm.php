<?php

namespace App\Http\Livewire\Forms;

use App\Http\Livewire\Traits\InteractsWithFlashMessage;
use App\Http\Livewire\Traits\InteractsWithModal;
use App\Models\Generales\EstadoCivil;
use App\Models\Generales\Estudiantes;
use App\Models\Generales\Familias;
use App\Models\Generales\HistoriaPsicologica;
use App\Models\Generales\ImpresionDiagnostica;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class HistoriasForm extends BaseForm
{
    use InteractsWithModal;
    use InteractsWithFlashMessage;
    use WithFileUploads;

    public $query = '';

    public $estudiante = null;
    public $problemas = [];
    public $soporte;
    public $form = [
        'estudiante_id' => '',
        'estado_civil' => '',
        'direccion' => '',
        'trabaja' => 'NO',
        'tipo_familia' => '',
        'procedencia_recursos' => '',
        'relacion_compañeros' => '',
        'relacion_docente' => '',
        'plan_de_accion' => '',
        'conclusiones' => '',
        'problemas' => [],
    ];

    public function rules()
    {
        return Arr::dot(['form' => HistoriaPsicologica::validationRules()]);
    }

    public function render()
    {
        return view('livewire.forms.historias-form', [
            'estados' => EstadoCivil::all(),
            'familias' => Familias::all(),
            'problematicas' => ImpresionDiagnostica::all()
        ]);
    }

    public function search(): void
    {
        $estudiante = Estudiantes::where('identificacion', $this->query)->first();
        $hoy = date("Y-m-d");
        $estudiante->edad = date_diff(date_create($estudiante->fecha_nacimiento), date_create($hoy))->y;

        if ($estudiante === null) {
            $this->message('No se encontraron registros para está identificación', 'danger');
            return;
        }

        $historia = HistoriaPsicologica::where('estudiante_id', $estudiante->id)->first();
        if ($historia) {
            $this->form['estado_civil'] = $historia->estado_civil;
            $this->form['direccion'] = $historia->direccion;
            $this->form['plan_de_accion'] = $historia->plan_de_accion;
            $this->form['trabaja'] = $historia->trabaja;
            $this->form['tipo_familia'] = $historia->tipo_familia;
            $this->form['relacion_docente'] = $historia->relacion_docente;
            $this->form['relacion_compañeros'] = $historia->relacion_compañeros;
            $array = [];
            foreach ($historia->problemas as $key => $value) {
                $array[] = $value['id'];
            }
            $this->form['problemas'] = $array;
        }
        $this->estudiante = $estudiante;
        $this->form['estudiante_id'] = $estudiante->id;
        $this->query = '';
    }

    public function submit()
    {

        $data = $this->validate()['form'];

        if ($data['estudiante_id'] && $this->soporte) {
            $historia = HistoriaPsicologica::where('estudiante_id', $data['estudiante_id'])->first();
            if ($historia) {
                $path = $historia->soporte;
                if (Storage::exists($path)) {
                    Storage::delete($path);
                }
            }
        }

        if ($this->soporte) {
            $data['soporte'] = $this->soporte->store('historias');
        }

        $model = HistoriaPsicologica::updateOrCreate(
            ['estudiante_id' => $data['estudiante_id']],
            $data
        );
        $result = $model->save();
        if ($result) {
            $array = [];
            foreach ($this->form['problemas'] as $key => $value) {
                $array[] = $value;
            }
            $model->problemas()->sync($array);
        }
        $this->message('Historia Guardada Correctamente');
        $this->emit('list:refresh');
        $this->closeModal();
    }

    public function cancelar()
    {
        $this->closeModal();
    }
}
