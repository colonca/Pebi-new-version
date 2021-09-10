<?php

namespace Database\Seeders;

use App\Models\Generales\Asignaturas;
use Illuminate\Database\Seeder;

class AsignaturasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Asignaturas::factory()->count(10)->create();
    }
}
