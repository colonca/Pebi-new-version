<?php

namespace Database\Seeders;

use App\Models\Generales\Asignaturas;
use App\Models\Generales\Programas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class AsignaturasSeeder extends Seeder
{

	public function run()
	{
		$start = microtime(true);
		$programas = Programas::all();
		echo "Seeded: " . AsignaturasSeeder::class . "\n";
		echo "Sincronizando Asignaturas";
		$prev = 0;
		$loop = 0;
		foreach ($programas as $programa) {
			$url = config('academosoft.host') . '/unicesar/academusoft/academico/integracion/asignatura.jsp?programa=' . $programa->id;
			$url .= '&user=' . config('academosoft.user');
			$url .= '&password=' . config('academosoft.password');
			$url .= '&token=' . config('academosoft.token');
			$response = Http::get($url);
			if ($response->status() !== 200 || $response->json() === null) continue;
			$asignaturas = $response->json()['data'];
			foreach ($asignaturas as $asignatura) {
				Asignaturas::updateOrcreate(['codigo' => $asignatura['codigo'], 'programa_id' => $programa->id], [
					'codigo' => $asignatura['codigo'],
					'nombre' => $asignatura['nombre'],
					'creditos' => $asignatura['creditos'],
					'programa_id' => $programa->id
				]);
			}
			$done = intval(100 * ($loop) / count($programas));
			echo $prev . '% done ...' . "\n";
			$prev = $done;
			$loop++;
		}
		$finish = microtime(true);
		$time = number_format($finish - $start, 2);
		echo "Sicronizacion terminada - time ($time s) \n";
	}
}
