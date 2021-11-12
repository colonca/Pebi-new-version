<?php

namespace App\Http\Livewire\Generales;

use App\Models\Generales\Campanhas as GeneralesCampanhas;
use Livewire\Component;

class Campanhas extends Component
{

    public function render()
    {
        return view('livewire.generales.campanhas.index', [
            'campanhas' => GeneralesCampanhas::paginate(10)
        ]);
    }
}
