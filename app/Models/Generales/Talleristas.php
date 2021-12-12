<?php

namespace App\Models\Generales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Talleristas extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $fillable = ['id', 'identificacion', 'nombres', 'celular', 'correo_institucional', 'numero_horas_semanales', 'tipo'];

	public static function boot()
	{
		parent::boot();

		static::deleting(function ($tallerista) {
			$user = DB::table('users')->where('model', $tallerista->id)->first();
			if ($user)
				$user->delete();
			return true;
		});
	}

	public static function validationRules(): array
	{
		return [
			'id' => 'numeric|nullable',
			'identificacion' => 'numeric|required',
			'nombres' => 'required',
			'celular' => 'required',
			'correo_institucional' => 'required|email',
			'numero_horas_semanales' => 'numeric|required',
			'tipo' => 'required'
		];
	}
}
