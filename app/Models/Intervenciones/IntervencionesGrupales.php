<?php

namespace App\Models\Intervenciones;

use App\Models\Generales\Asignaturas;
use App\Models\Generales\Estudiantes;
use App\Models\Generales\Programas;
use App\Models\Generales\TalleresGrupales;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IntervencionesGrupales extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id', 'programa_id', 'asignatura_id', 'taller_id', 'fecha', 'created_at', 'updated_at'];

    public static function validationRules(): array
    {
        return [
            'id' => 'numeric|nullable',
            'programa_id' =>  'required',
            'asignatura_id' => 'required',
            'taller_id' => 'required',
            'fecha' => 'required',
            'estudiantes' => 'required|array'
        ];
    }

    public function estudiantes()
    {
        return $this->belongsToMany(Estudiantes::class, 'grupales_estudiante', 'grupal_id', 'estudiante_id');
    }

    public function taller()
    {
        return $this->belongsTo(TalleresGrupales::class, 'taller_id', 'id')->withTrashed();
    }

    public function asignatura()
    {
        return $this->belongsTo(Asignaturas::class)->withTrashed();
    }

    public function programa()
    {
        return $this->belongsTo(Programas::class)->withTrashed();
    }
}
