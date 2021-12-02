<?php

namespace Database\Factories\Generales;

use App\Models\Generales\Talleristas;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TalleristasFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Talleristas::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		$name = $this->faker->name;
		return [
			'identificacion' => $this->faker->numberBetween(10000000, 20000000),
			'nombres' => $name,
			'celular' => $this->faker->phoneNumber,
			'correo_institucional' => Str::slug($name) . '@unicesar.edu.co',
			'numero_horas_semanales' => rand(4, 12),
			'tipo' =>  ['PROFESIONAL', 'PRACTICANTE'][rand(0, 1)]
		];
	}
}
