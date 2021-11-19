<?php

namespace App\Http\Livewire\Components;

use App\Http\Livewire\Traits\InteractsWithFlashMessage;
use App\Http\Livewire\Traits\InteractsWithModal;
use App\Models\Calendario\Event;
use App\Models\Intervenciones\IntervencionesGrupales;
use Livewire\Component;

class Calendario extends Component
{
    use InteractsWithModal;
    use InteractsWithFlashMessage;

    public $events = '';

    public $listeners = ['list:refresh' => 'refreshEvents'];

    public function refreshEvents()
    {
        $events = Event::select('id', 'title', 'description', 'start')->get();
        $this->events = json_encode($events);
        $this->emit('refreshCalendar');
    }

    public function crear_intervencion_grupal($fecha)
    {
        $this->openModal('forms.intervencion-grupal-form', ['fecha' => $fecha], 'w-4/5');
    }

    public function edit_intervencion_grupal($event)
    {
        $id = json_decode($event['extendedProps']['description'])->id;
        $intervencion = IntervencionesGrupales::findOrFail($id);
        $this->openModal('forms.intervencion-grupal-form', $intervencion->load('estudiantes'), 'w-4/5');
    }

    public function render()
    {
        $events = Event::select('id', 'title', 'description', 'type', 'start')->get();

        $this->events = json_encode($events);

        return view('livewire.components.calendario');
    }
}
