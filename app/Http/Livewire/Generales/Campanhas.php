<?php

namespace App\Http\Livewire\Generales;

use App\Http\Livewire\Traits\InteractsWithFlashMessage;
use App\Http\Livewire\Traits\InteractsWithModal;
use App\Models\Generales\Campanhas as GeneralesCampanhas;
use Livewire\Component;
use Livewire\WithPagination;

class Campanhas extends Component
{
	use InteractsWithModal;
	use InteractsWithFlashMessage;
    use WithPagination;

	public $listeners = ['list:refresh' => 'render'];

	public function render()
	{
		return view('livewire.generales.campanhas.index', [
			'campanhas' => GeneralesCampanhas::paginate(10)
		]);
	}

	public function create()
	{
		$this->openModal('forms.campanha-form', [], 'w-3/5');
	}

	public function edit($id)
	{
		$campanha = GeneralesCampanhas::findOrFail($id);
		$this->openModal('forms.campanha-form', $campanha, 'w-3/5');
	}

	public function delete($id)
	{
		$campanha = GeneralesCampanhas::findOrFail($id);
		$this->deleteModal($campanha);
	}
}
