<?php

namespace Database\Seeders;

use App\Models\Generales\Estudiantes;
use App\Models\Intervenciones\IntervencionesGrupales;
use Illuminate\Database\Seeder;

class IntervencionesGrupalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IntervencionesGrupales::factory()
                    ->count(10)
                    ->has(Estudiantes::factory()->count(8))
                    ->create();
    }
}
