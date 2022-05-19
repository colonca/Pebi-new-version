<?php

namespace App\Models\Intervenciones;

use App\Models\Generales\Estudiantes;
use App\Models\Generales\Horario;
use App\Models\Generales\Remision;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Solicitud extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "solicitudes";
    protected $fillable = ['motivo', 'estudiante', 'discapacidad', 'esDiscapacitado', 'estado', 'fecha', 'fecha_remision'];

    public static function validationRules(): array
    {
        return [
            'id' => 'numeric|nullable',
            'estudiante' => 'numeric|required',
            'motivo' => 'required',
            'discapacidad' => 'nullable',
            'esDiscapacitado' => 'required',
            'estado' => 'required',
            'fecha' => 'required'
        ];
    }

    public function estudianteRelation()
    {
        return $this->belongsTo(Estudiantes::class, 'estudiante', 'id', 'estudiantes');
    }

    public function horarios()
    {
        return $this->belongsToMany(Horario::class, 'disponibilidad_estudiante', 'solicitud_id', 'horario_id');
    }
}
