<?php

namespace App\Models\Generales;

use App\Models\Intervenciones\Solicitud;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Remision extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'remisiones';

    protected $fillable = ['area', 'estado', 'fecha_cita', 'tallerista', 'solicitud'];

    public static function validationRules(): array
    {
        return [
            'solicitud' => '',
            'area' => '',
            'tallerista' => '',
            'horario' => ''
        ];
    }

    public function talleristaRelation()
    {
        return $this->belongsTo(Talleristas::class, 'tallerista', 'id', 'talleristas');
    }

    public function solicitudRelation()
    {
        return $this->belongsTo(Solicitud::class, 'solicitud', 'id', 'solicitudes');
    }
}
