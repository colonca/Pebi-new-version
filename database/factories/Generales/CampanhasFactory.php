<?php

namespace Database\Factories\Generales;

use App\Models\Generales\Campanhas;
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
        return [
            'nombre' => $this->faker->name,
            'poblacion' =>  $this->faker->text,
            'imagen' => $this->faker->imageUrl
        ];
    }
}
