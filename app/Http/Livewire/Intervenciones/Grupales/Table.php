<?php

namespace App\Http\Livewire\Intervenciones\Grupales;

use App\Http\Livewire\Traits\InteractsWithModal;
use App\Models\Calendario\Event;
use App\Models\Intervenciones\IntervencionesGrupales;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{

	use WithPagination;
	use InteractsWithModal;

	public $intervencion_id;

	public $listeners = ['list:refresh' => 'render'];

	public function render()
	{
		return view('livewire.intervenciones.grupales.table', [
			'intervenciones' => IntervencionesGrupales::paginate(8),
		]);
	}

	public function create()
	{
		$this->openModal('forms.intervencion-grupal-form', [], 'w-4/5');
	}

	public function edit($id)
	{
		$intervencion = IntervencionesGrupales::find($id);
		$this->openModal('forms.intervencion-grupal-form', $intervencion->load('estudiantes'), 'w-4/5');
	}

	public function delete($id)
	{
		$intervencion = IntervencionesGrupales::find($id);
		$event = Event::where('description', 'like', '%' . $intervencion->id . '%')->first();
		if ($event) $event->delete();
		$this->deleteModal($intervencion);
	}
}
