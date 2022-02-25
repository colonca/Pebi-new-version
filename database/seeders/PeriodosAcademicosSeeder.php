<?php

namespace Database\Seeders;

use App\Models\Generales\PeriodosAcademicos;
use Illuminate\Database\Seeder;

class PeriodosAcademicosSeeder extends Seeder
{

    public function run()
    {
        PeriodosAcademicos::create([
            'periodo' => date('m') <= 6 ? '1' : '2',
            'anio' => date('Y'),
            'fecha_inicio' => date('Y-m-d'),
            'fecha_fin' => date('Y-m-d'),
            'estado' => 'ACTIVO'
        ]);
    }

}
