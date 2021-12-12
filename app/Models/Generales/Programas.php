<?php

namespace App\Models\Generales;

use App\Models\Generales\Facultad;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Programas extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $fillable = ['id', 'nombre', 'facultad_id', 'created_at', 'updated_at'];

	public function facultad()
	{
		return $this->belongsTo(Facultad::class, 'facultad_id', 'id');
	}
}
