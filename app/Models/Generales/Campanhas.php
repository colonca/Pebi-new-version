<?php

namespace App\Models\Generales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Campanhas extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nombre', 'poblacion', 'imagen'];

    public function talleres()
    {
        return  $this->hasMany(TalleresGrupales::class);
    }

    public static function validationRules(): array
    {
        return [
            'id' => 'numeric|nullable',
            'nombre' => 'required',
            'poblacion' => 'required'
        ];
    }

    public function getPoblacionAttribute($value)
    {
        return Str::limit($value, 30);
    }
}
