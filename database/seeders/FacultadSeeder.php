<?php

namespace Database\Seeders;

use App\Models\Generales\Facultad;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class FacultadSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$url = config('academosoft.host') . '/unicesar/academusoft/academico/integracion/facultades.jsp';
		$url .= '&user=' . config('academosoft.user');
		$url .= '&password=' . config('academosoft.password');
		$url .= '&token=' . config('academosoft.token');
		$response = Http::get($url);
		echo  "Consulta de Facultades" . $response->status();
		if ($response->status() === 200 && $response->json() !== null) {
			$response = $response->json();
			$facultades = $response['data'];
			foreach ($facultades as $facultad) {
				Facultad::updateOrCreate(
					['id' => $facultad['id']],
					['nombre' => $facultad['nombre'], 'facultad' => $facultad['facultad']],
				);
			}
		}
	}
}
