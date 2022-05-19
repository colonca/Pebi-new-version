<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RiesgosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $riesgos = [
            [
                'descripcion' => 'RIESGO SUPER ALTO',
                'nota_inicio' => 0,
                'nota_fin' => 2.9
            ],
            [
                'descripcion' => 'RIESGO ALTO',
                'nota_inicio' => 3,
                'nota_fin' => 3.3
            ],
            [
                'descripcion' => 'RIESGO MEDIO',
                'nota_inicio' => 3.4,
                'nota_fin' => 3.7
            ],
            [
                'descripcion' => 'RIESGO BAJO',
                'nota_inicio' => 3.8,
                'nota_fin' => 4.2
            ],
            [
                'descripcion' => 'RIESGO SUPER BAJO',
                'nota_inicio' => 4.3,
                'nota_fin' => 5
            ]
        ];

        DB::table('riesgos')->insert($riesgos);
    }
}
