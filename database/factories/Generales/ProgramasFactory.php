<?php

namespace Database\Factories\Generales;

use App\Models\Generales\Programas;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Programas::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'facultad' => $this->faker->name()
        ];
    }
}
