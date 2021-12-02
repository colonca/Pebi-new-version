<?php

namespace App\Models\Generales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Linea extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $fillable = ['id', 'nombre', 'slug'];

	public static function validationRules(): array
	{
		return [
			'id' => 'numeric|nullable',
			'nombre' => 'required',
			'slug' => 'required'
		];
	}
}
