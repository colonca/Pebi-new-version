<?php

namespace App\Http\Livewire\Generales;

use App\Http\Livewire\Traits\InteractsWithFlashMessage;
use App\Http\Livewire\Traits\InteractsWithModal;
use App\Models\Generales\Linea;
use Livewire\Component;
use Livewire\WithPagination;

class Lineas extends Component
{
	use WithPagination;
	use InteractsWithModal;
	use InteractsWithFlashMessage;

	public $listeners = ['list:refresh' => 'render'];

	public function render()
	{
		$lineas = Linea::paginate(8);
		return view('livewire.generales.lineas.index', [
			'lineas' => $lineas
		]);
	}

	public function create()
	{
		$this->openModal('forms.linea-form', [], "w-3/5");
	}

	public function edit($id)
	{
		$linea = Linea::findOrFail($id);
		$this->openModal('forms.linea-form', $linea, "w-3/5");
	}

	public function delete($id)
	{
		$linea = Linea::findOrFail($id);
		$this->deleteModal($linea);
	}
}
