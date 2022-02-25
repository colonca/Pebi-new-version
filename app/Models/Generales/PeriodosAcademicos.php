<?php

namespace App\Models\Generales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodosAcademicos extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'estado', 'periodo', 'fecha_inicio', 'fecha_fin', 'anio'];


}
