<?php

namespace App\Imports;

use App\Models\Generales\Estudiantes;
use App\Models\Generales\Programas;
use Exception;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;
use Illuminate\Support\Arr;

class EstudiantesImport implements OnEachRow, WithHeadingRow, WithChunkReading
{
	public  $programas;

	public function __construct()
	{
		$this->programas = Programas::all()->pluck('id', 'codigo');
	}

	public function chunkSize(): int
	{
		return 1000;
	}

	public function onRow(Row $row)
	{
		$row = $row->toArray();

		if (!Arr::exists($this->programas, $row['programa_id']))
			return;

		$programa = $this->programas[$row['programa_id']];

		if ($programa) {
			try {
				DB::beginTransaction();
				Estudiantes::updateOrCreate(
					['identificacion' => intval($row['identificacion'])],
					[
						'identificacion' => intval($row['identificacion']),
						'tipo_documento' => $row['tipo_documento'],
						'primer_nombre' => $row['primer_nombre'],
						'segundo_nombre' => $row['segundo_nombre'],
						'primer_apellido' => $row['primer_apellido'],
						'segundo_apellido' => $row['segundo_apellido'],
						'direccion' => $row['direccion'],
						'telefono' => $row['telefono'],
						'celular' => $row['celular'],
						'correo' => $row['correo'],
						'fecha_nacimiento' => $row['fecha_nacimiento'] !== '' ? date('Y-m-d', strtotime($row['fecha_nacimiento'])) : date('Y-m-d', strtotime('9999-99-99')),
						'sexo' => $row['sexo'],
						'procedencia' => $row['procedencia'],
						'fecha_ingreso' => $row['fecha_ingreso'] !== '' ?  date('Y-m-d', strtotime($row['fecha_ingreso'])) : date('Y-m-d', strtotime('9999-99-99')),
						'semestre' => $row['semestre'],
						'programa_id' => $programa,
						'sede' => $row['sede'],
						'estado' => 'ACTIVO'
					]
				);
				DB::commit();
			} catch (Exception $ex) {
				DB::rollBack();
				return $ex;
			}
		}
	}

}
