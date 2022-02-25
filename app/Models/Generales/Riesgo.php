<?php

namespace App\Models\Generales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riesgo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'descripcion', 'nota_inicio', 'nota_fin', 'created_at', 'updated_at'
    ];
}
