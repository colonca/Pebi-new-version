<?php

namespace Database\Factories\Generales;

use App\Models\Generales\Campanhas;
use App\Models\Generales\Linea;
use Illuminate\Database\Eloquent\Factories\Factory;

class CampanhasFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Campanhas::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		$linea = Linea::all()->random();
		return [
			'nombre' => $this->faker->name,
			'poblacion' =>  $this->faker->text,
			'imagen' => $this->faker->imageUrl,
			'linea_id' => $linea->id,
		];
	}
}
