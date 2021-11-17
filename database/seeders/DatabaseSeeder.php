<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(Campanhas::class);
        $this->call(TalleresGrupalesSeeder::class);
        $this->call(ProgramasSeeder::class);
        $this->call(AsignaturasSeeder::class);
        $this->call(IntervencionesGrupalesSeeder::class);
    }
}
