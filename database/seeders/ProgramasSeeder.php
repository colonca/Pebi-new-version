<?php

namespace Database\Seeders;

use App\Models\Generales\Programas;
use Illuminate\Database\Seeder;

class ProgramasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Programas::factory()->count(10)->create();
    }
}
