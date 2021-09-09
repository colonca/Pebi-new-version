<?php

namespace App\Models\Generales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programas extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nombre', 'facultad', 'created_at', 'updated_at'];
}
