<?php

namespace App\Http\Livewire\Academico;

use App\Models\Generales\Estudiantes;
use Livewire\Component;

class InfoEstudiantes extends Component
{
	public $title = '';
	public $estudiante = '';

	public function mount(array $params = [])
	{
		parent::mount($params);
		$this->estudiante = Estudiantes::findOrFail($params['estudiante'])->load(['intervenciones_grupales', 'programa']);
		$this->title = 'Info Estudiantes';
	}

	public function render()
	{
		return view('livewire.academico.info-estudiantes', [
			'estudiante' => $this->estudiante
		]);
	}
}
