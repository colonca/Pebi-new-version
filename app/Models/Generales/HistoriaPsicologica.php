<?php

namespace App\Models\Generales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistoriaPsicologica extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'historia_psicologica';

    protected $fillable = [
        'id','estudiante_id', 'estado_civil',
        'trabaja', 'procedencia_recursos', 'tipo_familia',
        'relacion_compañeros', 'relacion_docente',
        'direccion', 'plan_de_accion','conclusiones', 'soporte'
    ];

    public static function validationRules(): array
    {
        return [
            'estudiante_id' => 'numeric|required',
            'direccion' => 'required',
            'estado_civil' => 'numeric|required',
            'trabaja' => 'required',
            'tipo_familia' => 'numeric|required',
            'relacion_compañeros' => 'required',
            'relacion_docente' => 'required',
            'plan_de_accion' => 'required',
            'problemas' => 'required|array|min:1',
        ];
    }

    public function estudiante()
    {
        return $this->belongsTo(Estudiantes::class, 'estudiante_id','id', 'estudiantes');
    }

    public function estadoCivil()
    {
        return $this->belongsTo(EstadoCivil::class, 'estado_civil', 'id');
    }

    public function familia()
    {
        return $this->belongsTo(Familias::class, 'tipo_familia', 'id');
    }

    public function problemas(){
        return $this->belongsToMany(ImpresionDiagnostica::class, 'rel_historia_impresion','historia_psicologica_id','impresion_diagnostica_id');
    }

}
