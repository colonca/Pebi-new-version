<?php

namespace App\Models\Generales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstadoCivil extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'estado_civil';
    protected $fillable = ['id','estado_civil'];
}
