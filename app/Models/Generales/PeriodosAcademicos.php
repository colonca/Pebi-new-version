<?php

namespace App\Models\Generales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PeriodosAcademicos extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id', 'estado', 'periodo', 'fecha_inicio', 'fecha_fin', 'anio'];


    public static function validationRules(): array
    {
        return [
            'id' => 'numeric|nullable',
            'estado' => 'required',
            'periodo' => 'required|numeric|min:1|max:2',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'anio' => 'required|numeric'
        ];
    }
}
