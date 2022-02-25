<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Horario extends Component
{

    public array $horas = [];
    public array $horarios = [];
    public array $disponibilidad = [];

    public function __construct($disponibilidad)
    {
        $this->horas = ['6:00-6:59', '7:00-7:59', '8:00-8:59', '9:00-9:59', '10:00-10:59', '11:00-11:59', '12:00-12:59',
            '13:00-13:59', '14:00-14:59', '15:00-15:59', '16:00-16:59', '17:00-17:59', '18:00-18:59', '19:00-19:59',
            '20:00-20:59', '21:00-21:59'];

        $this->horarios = ['HORA', 'LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO'];

        $this->disponibilidad = $disponibilidad;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.horario');
    }
}
