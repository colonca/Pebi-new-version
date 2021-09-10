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

    protected $fillable = ['id','programa_id','asignatura_id','taller_id','fecha','created_at','updated_at'];

    public function estudiantes() {
        return $this->belongsToMany(Estudiantes::class,'grupales_estudiante','grupal_id','estudiante_id');
    }

    public function taller(){
        return $this->belongsTo(TalleresGrupales::class,'taller_id','id');
    }

    public function asignatura() {
        return $this->belongsTo(Asignaturas::class);
    }

    public function programa() {
        return $this->belongsTo(Programas::class);
    }

}
