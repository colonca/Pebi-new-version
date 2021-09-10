<?php

namespace Database\Factories\Generales;

use App\Models\Generales\Asignaturas;
use App\Models\Generales\Estudiantes;
use App\Models\Generales\Programas;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstudiantesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Estudiantes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tipos = ['CC','TI'];
        $sexo = ['FEMENINO','MASCULINO'];
        $programa = Programas::all()->random();

        return [
            'identificacion' => $this->faker->numberBetween(10000000,20000000),
            'tipo_documento' => $tipos[rand(0,sizeof($tipos)-1)],
            'primer_nombre' => $this->faker->firstName,
            'segundo_nombre' => $this->faker->firstName,
            'primer_apellido' => $this->faker->lastName,
            'segundo_apellido' => $this->faker->lastName,
            'direccion'=>$this->faker->address,
            'telefono' => $this->faker->phoneNumber,
            'celular' => $this->faker->phoneNumber,
            'correo' => $this->faker->email,
            'semestre' => rand(0,10),
            'fecha_nacimiento' => $this->faker->dateTimeBetween('-30 years','-16 years'),
            'procedencia' => $this->faker->country,
            'fecha_ingreso' => $this->faker->dateTimeBetween('-3 years','now'),
            'programa_id' => $programa->id,
            'sexo' => $sexo[rand(0,sizeof($sexo)-1)]
        ];
    }
}
