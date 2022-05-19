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
		$this->call(RolesYPermisosSeeder::class);
		$this->call(UserSeeder::class);
		$this->call(LineaSeeder::class);
		$this->call(Campanhas::class);
		$this->call(PeriodosAcademicosSeeder::class);
		$this->call(FacultadSeeder::class);
		$this->call(ProgramasSeeder::class);
		$this->call(RiesgosSeeder::class);
		$this->call(EstudiantesSeeder::class);
		$this->call(AsignaturasSeeder::class);
		$this->call(TalleristasSeeder::class);
		$this->call(HorarioSeeder::class);
	}
}
