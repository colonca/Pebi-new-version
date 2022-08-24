<?php

namespace App\Models\Generales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seguimiento extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'seguimientos';

    protected $fillable = [
        'id', 'seguimiento', 'conclusion',
        'tallerista_id', 'remision_ips', 'historia_id',
        'deleted_at', 'created_at', 'updated_at'
    ];

    public function historia()
    {
        return $this->belongsTo(HistoriaPsicologica::class, 'historia_id', 'id', 'historia_psicologica');
    }

    public function tallerista()
    {
        return $this->belongsTo(Talleristas::class, 'tallerista_id', 'id');
    }

    public static function validationRules(): array
    {
        return [
            'id' => 'numeric|nullable',
            'seguimiento' => 'required',
            'conclusion' => 'required',
            'remision_ips' => 'required',
            'tallerista_id' => 'numeric|required',
            'historia_id' => 'numeric|required',
        ];
    }
}
