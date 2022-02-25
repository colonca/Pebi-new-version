<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days = ['LUNES','MARTES', 'MIERCOLES', 'JUEVES','VIERNES'];
        $horarios = [];
        foreach ($days as $day){
            for($i = 6; $i <= 21; $i++){
                $horarios[] = ['dia' => $day, 'hora' => $i];
            }
        }
        DB::table('horarios')->insert($horarios);
    }
}
