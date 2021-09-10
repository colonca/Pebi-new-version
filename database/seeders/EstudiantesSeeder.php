<?php

namespace Database\Seeders;

use App\Models\Generales\Estudiantes;
use Illuminate\Database\Seeder;

class EstudiantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estudiantes::factory()->count(20)->create();
    }
}
