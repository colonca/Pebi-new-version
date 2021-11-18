<?php

namespace Database\Seeders;

use App\Models\Generales\Talleristas;
use Illuminate\Database\Seeder;

class TalleristasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Talleristas::factory()->count(10)->create();
    }
}
