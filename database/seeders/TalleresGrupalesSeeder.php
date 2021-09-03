<?php

namespace Database\Seeders;

use App\Models\Generales\TalleresGrupales;
use Illuminate\Database\Seeder;

class TalleresGrupalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TalleresGrupales::factory()->count(10)->create();
    }
}
