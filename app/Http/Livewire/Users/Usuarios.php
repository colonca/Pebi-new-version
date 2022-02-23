<?php

namespace App\Http\Livewire\Users;

use App\Http\Livewire\Traits\InteractsWithFlashMessage;
use App\Http\Livewire\Traits\InteractsWithModal;
use App\Models\User;
use Livewire\Component;

class Usuarios extends Component
{
    use InteractsWithModal;
    use InteractsWithFlashMessage;

    public $listeners = ['list:refresh' => 'render'];

    public function render()
    {
        return view('livewire.users.usuarios',[
            'usuarios'=> User::paginate(8),
        ]);
    }

    public function create()
    {
        $this->openModal('forms.usuarios-form', [], 'w-4/5');
    }


}
