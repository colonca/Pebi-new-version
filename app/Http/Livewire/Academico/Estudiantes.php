<?php

namespace App\Http\Livewire\Academico;

use App\Http\Livewire\Traits\InteractsWithModal;
use App\Models\Generales\Estudiantes as GeneralesEstudiantes;
use App\Models\Generales\Programas;
use Livewire\Component;
use Livewire\WithPagination;

class Estudiantes extends Component
{

	use WithPagination;
	use InteractsWithModal;

	public $filtros = [
		'programa' => '',
		'estado' => '',
		'identificacion' => '',
		'riesgo' => '',
		'sede' => ''
	];

	public function filtro($filtro, $value)
	{
		if (!key_exists($filtro, $this->filtros))
			return;
		$this->filtros[$filtro] = $value;
	}

	public function limpiarFiltro($filtro)
	{
		if (!key_exists($filtro, $this->filtros))
			return;
		$this->filtros[$filtro] = '';
	}

	public function infoEstudiante($id)
	{
		$this->openModal('academico.info-estudiantes', ['estudiante' => $id], 'modal-lg');
	}

	public function render()
	{
		$query = GeneralesEstudiantes::query();
		$query->with('programa');
		$query->when($this->filtros['programa'], function ($query) {
			return $query->where('programa_id', $this->filtros['programa']);
		});
		$query->when($this->filtros['estado'], function ($query) {
			return $query->where('estado', $this->filtros['estado']);
		});
		$query->when($this->filtros['identificacion'], function ($query) {
			return $query->where('identificacion', 'like', '%' . $this->filtros['identificacion'] . '%');
		});
		$estudiantes = $query->orderBy('primer_nombre')->paginate(15);
		$programas = Programas::all()->mapWithKeys(function ($item) {
			return [$item['id'] => $item];
		});
		return view('livewire.academico.estudiantes', [
			'estudiantes' => $estudiantes,
			'programas' => $programas
		]);
	}
}
