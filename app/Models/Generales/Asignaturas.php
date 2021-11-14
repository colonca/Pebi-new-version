<?php

namespace App\Models\Generales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asignaturas extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'id', 'codigo', 'nombre', 'creditos', 'programa_id', 'created_at', 'updated_at'
    ];

    public function programa() {
        return $this->belongsTo(Programas::class);
    }
}
