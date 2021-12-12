<?php

namespace App\Models\Generales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

	public function getNombreAttribute()
	{
		return $this->primer_nombre . ' ' . $this->primer_apellido;
	}

	public function getNumeroIdentificacionAttribute()
	{
		return $this->tipo_documento . ' - ' . $this->identificacion;
	}

	public function programa()
	{
		return $this->belongsTo(Programas::class);
	}
}
