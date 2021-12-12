<?php

namespace App\Models\Generales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facultad extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'facultades';

	public $fillable = ['id', 'nombre', 'facultad'];

	public function programas()
	{
		return $this->hasMany(Programas::class)->withTrahed();
	}
}
