<?php

namespace Database\Factories\Intervenciones;

use App\Models\Calendario\Event;
use App\Models\Generales\Asignaturas;
use App\Models\Generales\TalleresGrupales;
use App\Models\Generales\Campanhas;
use App\Models\Generales\Talleristas;
use App\Models\Intervenciones\IntervencionesGrupales;
use Illuminate\Database\Eloquent\Factories\Factory;

class IntervencionesGrupalesFactory extends Factory
{

    protected $model = IntervencionesGrupales::class;

    public function configure()
    {
        return $this->afterCreating(function (IntervencionesGrupales $intervencion) {
            $event = new Event([
                'title' =>  'Intervencion Grupal',
                'description' => json_encode([
                    'id' => $intervencion->id,
                    'taller' => $intervencion->taller->nombre,
                    'programa' => $intervencion->programa->nombre,
                    'asignatura' => $intervencion->asignatura->nombre,
                    'tallerista' => $intervencion->tallerista->nombre,
                    'lugar' => $intervencion->lugar,
                    'profesor' => $intervencion->profesor,
                    'celular_profesor' => $intervencion->celular_profesor
                ]),
                'type' => 'Intervencion Grupal',
                'start' => $intervencion->fecha,
            ]);
            $event->save();
        });
    }

    public function definition()
    {

        $asignatura = Asignaturas::all()->random();
        $taller = TalleresGrupales::all()->random();
        $campanha = Campanhas::all()->random();
        $tallerista = Talleristas::all()->random();
        $date =  date('Y-m');
        return [
            'programa_id' => $asignatura->programa->id,
            'asignatura_id' =>  $asignatura->id,
            'taller_id' =>  $taller->id,
            'fecha' => date_format($this->faker->dateTime(), "$date-d\TH:i"),
            'campanha_id' => $campanha->id,
            'tallerista_id' => $tallerista->id,
            'lugar' => $this->faker->city,
            'profesor' => $this->faker->name,
            'celular_profesor' => $this->faker->phoneNumber,
        ];
    }
}
