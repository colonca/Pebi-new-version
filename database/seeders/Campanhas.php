<?php

namespace Database\Seeders;

use App\Models\Generales\Campanhas as GeneralesCampanhas;
use Illuminate\Database\Seeder;

class Campanhas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeneralesCampanhas::factory()->count(5)->create();
    }
}
