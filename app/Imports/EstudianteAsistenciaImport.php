<?php

namespace App\Imports;

use App\Models\Generales\Estudiantes;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EstudianteAsistenciaImport implements ToModel, WithHeadingRow, WithChunkReading
{
	use Importable;

	public function __construct()
	{
		$this->estudiantes = Estudiantes::all(['identificacion'])->pluck('identificacion', 'primer_nombre');
	}

	public function model(array $row)
	{
		$estudiante = $this->estudiantes[$row['identificacion']];
		return $estudiante;
	}

	public function chunkSize(): int
	{
		return 5000;
	}
}
