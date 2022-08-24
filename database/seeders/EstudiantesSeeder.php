<?php

namespace Database\Seeders;

use App\Models\Generales\Estudiantes;
use App\Models\Generales\Historico;
use App\Models\Generales\PeriodosAcademicos;
use App\Models\Generales\Programas;
use App\Models\Generales\Riesgo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class EstudiantesSeeder extends Seeder
{

	public function run()
	{
		$start = microtime(true);
		echo "Seeded: " . EstudiantesSeeder::class . "\n";
		echo "Sincronizando Estudiantes \n";
		$riesgos = Riesgo::all()->mapWithKeys(function ($item) {
			return [$item['descripcion'] => $item];
		});
		$programas = Programas::all();
		$prev = 0;
		$loop = 0;
		$periodo = PeriodosAcademicos::where('estado', 'ACTIVO')->first();
		if (!$periodo) {
			echo 'Error: no se encuentran periodos activos';
			return;
		}
		if (empty($riesgos)) {
			echo 'Error: no existen riesgos registrados';
			return;
		}
		foreach ($programas as $programa) {
			$url = config('academosoft.host') . '/unicesar/academusoft/academico/integracion/estudiantesPrograma.jsp?programa=' . $programa->id;
			$response = Http::get($url);
			if ($response->status() !== 200 && $response->json()['status'] !== "200")
				continue;
			$estudiantes = $response->json()['data'];
			foreach ($estudiantes as $estudiante) {
				DB::beginTransaction();
				$model = Estudiantes::updateOrCreate(
					['identificacion' => $estudiante['identificacion']],
					[
						'tipo_documento' => $estudiante['tipo_documento'],
						'primer_nombre' => $estudiante['primer_nombre'],
						'segundo_nombre' => key_exists('segundo_nombre', $estudiante) ? $estudiante['segundo_nombre'] : '',
						'primer_apellido' => $estudiante['primer_apellido'],
						'segundo_apellido' => key_exists('segundo_apellido', $estudiante) ? $estudiante['segundo_apellido'] : '',
						'correo' => key_exists('correo', $estudiante) ? $estudiante['correo'] : '',
						'semestre' => $estudiante['semestre'],
						'celular' =>  key_exists('celular', $estudiante) ? $estudiante['celular'] : '',
						'telefono' => key_exists('telefono', $estudiante) ? $estudiante['telefono'] : '',
						'procedencia' => $estudiante['procedencia'],
						'estado' => $estudiante['estado'],
						'fecha_ingreso' => key_exists('fecha_ingreso', $estudiante) ? $estudiante['fecha_ingreso'] : date('Y-m-d'),
						'fecha_nacimiento' => key_exists('fecha_nacimiento', $estudiante) ? $estudiante['fecha_nacimiento'] : date('Y-m-d'),
						'programa_id' => $programa->id,
						'sexo' => $estudiante['sexo'],
						'sede' => $estudiante['sede'],
					]
				);
				Historico::updateOrCreate(
					['periodo_id' => $periodo->id, 'estudiante_id' => $model->id],
					[
						'periodo_id' => $periodo->id,
						'estudiante_id' => $model->id,
						'semestre_actual' => $model->semestre,
						'riesgo' => $estudiante['riesgo'],
						'estado' => $model->estado,
					]
				);
				DB::commit();
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
