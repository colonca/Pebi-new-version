<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Modal extends Component
{

	public bool $isOpen = false;
	public string $type = '';
	public array $params = [];
	public string $modalSize = 'sm:max-w-lg';

	protected $listeners = ['showModal' => 'open', 'closeModal' => 'close', 'deleteModal' => 'delete'];

	public function open(string $type, array $params = [], ?string $modalSize = null)
	{
		$this->isOpen = true;
		$this->type = $type;
		$this->params = $params;

		if ($modalSize) {
			$this->modalSize  = $modalSize;
		}
	}

	public function close()
	{
		$this->isOpen = false;
	}

	public function delete($params, string $form = 'forms.base-delete-form')
	{
		return $this->open($form, $params);
	}

	public function render()
	{
		return view('livewire.components.modal');
	}
}
