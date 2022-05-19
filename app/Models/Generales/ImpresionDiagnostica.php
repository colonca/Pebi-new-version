<?php

namespace App\Models\Generales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImpresionDiagnostica extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'impresion_diagnostica';
    protected $fillable = ['id', 'descripcion'];
}
