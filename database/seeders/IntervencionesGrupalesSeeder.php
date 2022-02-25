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
        $estudiantes = Estudiantes::all(['id'])->take(10);
        IntervencionesGrupales::factory()
                    ->count(5)
                    ->create();
    }
}
