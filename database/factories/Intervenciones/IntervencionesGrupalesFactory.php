<?php

namespace Database\Factories\Intervenciones;

use App\Models\Generales\Asignaturas;
use App\Models\Generales\TalleresGrupales;
use App\Models\Intervenciones\IntervencionesGrupales;
use Illuminate\Database\Eloquent\Factories\Factory;

class IntervencionesGrupalesFactory extends Factory
{
  
    protected $model = IntervencionesGrupales::class;

    
    public function definition()
    {
        $asignatura = Asignaturas::all()->random();
        $taller = TalleresGrupales::all()->random();
        return [
            'programa_id' => $asignatura->programa->id,
            'asignatura_id' =>  $asignatura->id,
            'taller_id' =>  $taller->id,
            'fecha' => $this->faker->dateTime
        ];
    }
}
