<?php

namespace Database\Seeders;

use App\Models\Generales\Linea;
use Illuminate\Database\Seeder;

class LineaSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Linea::create(['nombre' => 'Programa de Orientacion Psicosocial', 'slug' => 'POPS']);
		Linea::create(['nombre' => 'Programa de Orientacion Académica', 'slug' => 'POA']);
		Linea::create(['nombre' => 'Programa de Orientacion Vocacional y Adaptación Universitaria', 'slug' => 'POVAU']);
	}
}
