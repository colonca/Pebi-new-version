<?php

namespace Database\Factories\Generales;

use App\Models\Generales\Campanhas;
use App\Models\Generales\TalleresGrupales;
use Illuminate\Database\Eloquent\Factories\Factory;

class TalleresGrupalesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TalleresGrupales::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $campanhas = Campanhas::all();
        return [
            'nombre' =>  $this->faker->name(),
            'campanha_id' => $campanhas[rand(0, $campanhas->count() - 1)]
        ];
    }
}
