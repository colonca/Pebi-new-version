<?php

namespace Database\Seeders;

use App\Models\Generales\Facultad;
use App\Models\Generales\Programas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ProgramasSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$facultades = Facultad::all();
		foreach ($facultades as $facultad) {
			$url = config('academosoft.host') . '/unicesar/academusoft/academico/integracion/programa.jsp?facultad=' . $facultad->id;
			$response = Http::get($url);
			if ($response->status() !== 200 && $response->json()['status'] !== "200")
				continue;
			$programas = $response->json()['data'];
			foreach ($programas as $programa) {
				Programas::updateOrCreate(
					['id' => $programa['id']],
					['nombre' => $programa['nombre'], 'facultad_id' => $facultad->id, 'sede' => $programa['sede']]
				);
			}
		}
	}
}
