<?php

namespace App\Http\Livewire\Generales;

use App\Models\Generales\Campanhas as GeneralesCampanhas;
use App\Support\Concerns\InteractsWithFlashMessage;
use Livewire\Component;

class Campanhas extends Component
{
    use InteractsWithFlashMessage;

    public function render()
    {
        return view('livewire.generales.campanhas.index', [
            'campanhas' => GeneralesCampanhas::paginate(10)
        ]);
    }
}
