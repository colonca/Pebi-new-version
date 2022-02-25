<?php

namespace App\Http\Livewire\Academico;

use App\Http\Livewire\Traits\InteractsWithFlashMessage;
use App\Http\Livewire\Traits\InteractsWithModal;
use App\Models\Generales\PeriodosAcademicos;
use Livewire\Component;
use Livewire\WithPagination;

class PeriodoAcademicos extends Component
{
    use InteractsWithModal;
    use InteractsWithFlashMessage;
    use WithPagination;

    public $listeners = ['list:refresh' => 'render'];
    public function create()
    {
        $this->openModal('forms.periodos-form', [], 'w-3/5');
    }
    public function edit($id)
    {
        $periodo = PeriodosAcademicos::findOrFail($id);
        $this->openModal('forms.periodos-form', $periodo, 'w-3/5');
    }

    public function delete($id)
    {
        $periodo = PeriodosAcademicos::findOrFail($id);
        $this->deleteModal($periodo);
    }
    public function render()
    {
        return view('livewire.academico.periodo-academicos',[
            'periodos'=> PeriodosAcademicos::paginate(8),
        ]);
    }
}
