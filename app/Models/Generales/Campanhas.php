<?php

namespace App\Models\Generales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Campanhas extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $fillable = ['id', 'nombre', 'poblacion', 'imagen', 'linea_id'];

	public function talleres()
	{
		return  $this->hasMany(TalleresGrupales::class);
	}

	public static function validationRules(): array
	{
		return [
			'id' => 'numeric|nullable',
			'nombre' => 'required',
			'poblacion' => 'required',
			'linea_id' => 'required|numeric'
		];
	}

	public function getPoblacionAttribute($value)
	{
		return Str::limit($value, 30);
	}


	public function linea()
	{
		return $this->belongsTo(Linea::class);
	}
}
