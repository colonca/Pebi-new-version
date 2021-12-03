<?php

namespace Database\Factories\Generales;

use App\Models\Generales\Asignaturas;
use App\Models\Generales\Programas;
use Illuminate\Database\Eloquent\Factories\Factory;

class AsignaturasFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Asignaturas::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		$programa = Programas::all()->random();
		return [
			'codigo' => $this->faker->postcode,
			'nombre' => $this->faker->firstName,
			'creditos' => $this->faker->numberBetween(1, 4),
			'programa_id' => $programa->id,
		];
	}
}
