<?php

namespace Database\Factories\Generales;

use App\Models\Linea;
use Illuminate\Database\Eloquent\Factories\Factory;

class LineasFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Linea::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'nombres' => $this->faker->name,
			'slug' => $this->faker->slug,
		];
	}
}
