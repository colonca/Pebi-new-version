<?php

namespace App\Http\Livewire\Intervenciones\Individuales;

use App\Http\Livewire\Traits\InteractsWithFlashMessage;
use App\Http\Livewire\Traits\InteractsWithModal;
use App\Models\Intervenciones\Solicitud;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{

	use WithPagination;
	use InteractsWithModal;
	use InteractsWithFlashMessage;

	public $intervencion_id;

	public $listeners = ['list:refresh' => 'render'];

	public function render()
	{
		return view('livewire.intervenciones.individuales.table', [
			'solicitudes' => Solicitud::with('estudianteRelation')->paginate(8),
		]);
	}

	public function create()
	{
		$this->openModal('forms.solicitud-form', [], 'w-4/5');
	}

	public function edit($id)
	{
		$solicitud = Solicitud::find($id);
		$this->openModal('forms.solicitud-form', $solicitud->load('horarios'), 'w-4/5');
	}

	public function delete($id)
	{
		$solicitud = Solicitud::find($id);

		if ($solicitud->estado === 'REMITIDA') {
			$this->message('No se puede eliminar, lo solicitud se encuentra remitida');
			return;
		}

		if ($solicitud->estado === 'FINALIZADA') {
			$this->message('No se puede eliminar, la solicitud ya ha sido finalizda');
			return;
		}

		$this->deleteModal($solicitud);
	}

	public function remitir($id)
	{

		$solicitud = Solicitud::find($id);
		if (!$solicitud) return;

		return $this->openModal('forms.remision-form', ['solicitud' => $solicitud->id, 'area' => $solicitud->motivo], 'w-2/5');
	}
}
