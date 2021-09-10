<?php

namespace Database\Seeders;

use App\Models\Generales\Asignaturas;
use App\Models\Generales\Estudiantes;
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
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(TalleresGrupalesSeeder::class);
        $this->call(ProgramasSeeder::class);
        $this->call(AsignaturasSeeder::class);
        //$this->call(EstudiantesSeeder::class);
        $this->call(IntervencionesGrupalesSeeder::class);
    }
}
