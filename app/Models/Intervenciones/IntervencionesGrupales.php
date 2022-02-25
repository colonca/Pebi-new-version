<?php

namespace App\Models\Intervenciones;

use App\Models\Generales\Asignaturas;
use App\Models\Generales\Campanhas;
use App\Models\Generales\Estudiantes;
use App\Models\Generales\Linea;
use App\Models\Generales\PeriodosAcademicos;
use App\Models\Generales\Programas;
use App\Models\Generales\TalleresGrupales;
use App\Models\Generales\Talleristas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IntervencionesGrupales extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $fillable = [
		'id', 'programa_id', 'asignatura_id', 'taller_id', 'tallerista_id', 'linea_id',
		'campanha_id', 'fecha', 'created_at', 'updated_at', 'profesor', 'lugar', 'celular_profesor',
        'periodo_id'
	];

	public static function validationRules(): array
	{
		return [
			'id' => 'numeric|nullable',
			'programa_id' =>  'required',
			'asignatura_id' => 'required',
			'taller_id' => 'required',
			'fecha' => 'required',
			'estudiantes' => 'array',
			'linea_id' => 'required',
			'campanha_id' => 'required|numeric',
			'tallerista_id' => 'numeric|required',
			'lugar' => 'nullable',
			'profesor' => 'required',
			'celular_profesor' => 'required'
		];
	}

	public function getFechaAttribute($value): string
	{
		return date('Y-m-d\TH:i', strtotime($value));
	}

	public function estudiantes()
	{
		return $this->belongsToMany(Estudiantes::class, 'grupales_estudiante', 'grupal_id', 'estudiante_id');
	}

    public function periodo(){
        return $this->belongsTo(PeriodosAcademicos::class, 'periodo_id','id')->withTrashed();
    }

	public function taller()
	{
		return $this->belongsTo(TalleresGrupales::class, 'taller_id', 'id')->withTrashed();
	}

	public function asignatura()
	{
		return $this->belongsTo(Asignaturas::class, 'asignatura_id', 'id')->withTrashed();
	}

	public function tallerista()
	{
		return $this->belongsTo(Talleristas::class)->withTrashed();
	}

	public function linea()
	{
		return $this->belongsTo(Linea::class)->withTrashed();
	}

	public function programa()
	{
		return $this->belongsTo(Programas::class, 'programa_id', 'id')->withTrashed();
	}

	public function campanha()
	{
		return $this->belongsTo(Campanhas::class)->withTrashed();
	}
}
