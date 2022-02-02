<?php

namespace App\Http\Livewire\Cargas;

use Livewire\Component;
use Livewire\WithFileUploads;

class Estudiantes extends Component
{
	use WithFileUploads;

	public $file = '';

	public function rules()
	{
	}

	function upload()
	{
	}

	public function render()
	{
		return view('livewire.cargas.estudiantes');
	}
}
