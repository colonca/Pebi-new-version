<?php

namespace App\Models\Generales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Horario extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id', 'dia', 'hora', 'created_at', 'updated_at'
    ];

}
