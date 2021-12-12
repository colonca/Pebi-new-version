<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EstudianteAsistenciaImport implements WithHeadingRow, WithChunkReading
{
	use Importable;

	public function chunkSize(): int
	{
		return 5000;
	}
}
