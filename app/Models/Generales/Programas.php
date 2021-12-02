<?php

namespace App\Models\Generales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Programas extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $fillable = ['id', 'codigo', 'nombre', 'facultad', 'created_at', 'updated_at'];
}
