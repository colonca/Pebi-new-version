<?php

namespace App\Models\Generales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class TalleresGrupales extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $fillable = ['nombre', 'descripcion', 'campanha_id'];

	public function toArray(): array
	{
		$array =  parent::toArray();
		$array['type'] = get_class($this);
		return $array;
	}

	public static function validationRules(): array
	{
		return [
			'id' => 'numeric|nullable',
			'nombre' => 'required',
			'descripcion' => 'nullable',
			'campanha_id' => 'numeric|required'
		];
	}

	public function getDescripcionCortaAttribute()
	{
		return Str::limit($this->descripcion, 20);
	}

	public function campanha()
	{
		return $this->belongsTo(Campanhas::class);
	}
}
