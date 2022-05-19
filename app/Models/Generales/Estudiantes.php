<?php

namespace App\Models\Generales;

use App\Models\Intervenciones\IntervencionesGrupales;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Estudiantes extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $fillable = [
		'id', 'estado', 'identificacion',
		'tipo_documento', 'primer_nombre', 'segundo_nombre',
		'primer_apellido', 'segundo_apellido', 'direccion', 'telefono',
		'celular', 'correo', 'fecha_nacimiento', 'procedencia', 'semestre', 'estado',
		'sexo', 'fecha_ingreso', 'programa_id', 'sede', 'created_at', 'updated_at'
	];

	public function intervenciones_grupales()
	{
		return $this->belongsToMany(IntervencionesGrupales::class, 'grupales_estudiante', 'estudiante_id', 'grupal_id');
	}

	public function getRiesgoAttribute()
	{
		$periodo = PeriodosAcademicos::where('estado', 'ACTIVO')->first();
		if (!$periodo)
			return 'INDEFINIDO';
		$historico = Historico::where(['estudiante_id' => $this->id, 'periodo_id' => $periodo->id])->first();
		$riesgo = $historico ? $historico->riesgo : 'INDEFINIDO';
		return $riesgo;
	}


	public function getNombreAttribute()
	{
		return $this->primer_nombre . ' ' . $this->segundo_nombre . ' ' . $this->primer_apellido . ' ' . $this->segundo_apellido;
	}

	public function getNumeroTelefonoAttribute()
	{

		if (isset($this->celular)  && isset($this->telefono))
			return $this->celular . ' - ' . $this->telefono;

		if (isset($this->celular))
			return $this->celular;

		if (isset($this->telefono))
			return $this->telefono;
	}

	public function getNumeroIdentificacionAttribute()
	{
		return $this->tipo_documento . ' - ' . $this->identificacion;
	}

	public function getProgramaEstudianteAttribute()
	{
		return $this->programa ? Str::limit($this->programa->nombre, 20) : '';
	}

	public function historico()
	{
		return $this->hasMany(Historico::class, 'estudiante_id', 'id');
	}

	public function programa()
	{
		return $this->belongsTo(Programas::class)->withTrashed();
	}
}
