<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;

class BaseForm extends Component
{

    public $title = '';
    public $form = [];

    public function mount(array $params = [])
    {
        $keys = array_keys($this->form);
        foreach ($keys as $key) {
            if (array_key_exists($key, $params))
                $this->form[$key] = $params[$key];
        }
    }

    public function render()
    {
        return view('livewire.forms.base-form');
    }
}
