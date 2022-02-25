<?php

namespace App\Http\Livewire\Generales;

use App\Http\Livewire\Traits\InteractsWithFlashMessage;
use App\Http\Livewire\Traits\InteractsWithModal;
use App\Models\Generales\Talleristas as GeneralesTalleristas;
use Livewire\Component;
use Livewire\WithPagination;

class Talleristas extends Component
{
	use InteractsWithModal;
	use InteractsWithFlashMessage;
    use WithPagination;

	public $listeners = ['list:refresh' => 'render'];


	public function create()
	{
		$this->openModal('forms.tallerista-form', [], 'w-4/5');
	}

	public function edit($id)
	{
		$tallerista = GeneralesTalleristas::findOrFail($id)->load('horarios');
		$this->openModal('forms.tallerista-form', $tallerista, 'w-4/5');
	}

	public function delete($id)
	{
		$tallerista = GeneralesTalleristas::findOrFail($id);
		$this->deleteModal($tallerista);
	}

	public function render()
	{
		return view('livewire.generales.talleristas.talleristas', [
			'talleristas' => GeneralesTalleristas::paginate(8),
		]);
	}
}
