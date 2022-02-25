<?php

namespace App\Models\Generales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    use HasFactory;

    protected $table = 'historico';

    protected $fillable = [
        'id','semestre_actual', 'estado', 'estudiante_id', 'periodo_id', 'riesgo_id', 'created_at', 'updated_at'
    ];

    public function riesgo(){
        return $this->belongsTo(Riesgo::class,'riesgo_id','id');
    }

}
