<?php

namespace App\Http\Livewire\Cargas;

use App\Imports\EstudiantesImport;
use Livewire\Component;
use Livewire\WithFileUploads;
use File;
use Maatwebsite\Excel\Facades\Excel;

class Estudiantes extends Component
{
	use WithFileUploads;

	public $excel = '';

	protected $rules = [
		'excel' => 'required|max:5000|mimes:xlsx, csv, xls'
	];

	function upload()
	{
		if ($this->excel === '') {
			$this->addError('excel', 'El archivo es requerido.');
			return;
		}

		$ext = File::extension($this->excel->getClientOriginalName());

		if (!in_array($ext, ['xlsx', 'xls', 'csv'])) {
			$this->addError('excel', 'El archivo debe ser de tipo XLSX, XLS o CSV');
			return;
		}

		Excel::import(new EstudiantesImport, $this->excel);
	}

	public function render()
	{
		return view('livewire.cargas.estudiantes');
	}
}
