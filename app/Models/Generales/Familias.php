<?php

namespace App\Models\Generales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Familias extends Model
{
    use HasFactory;
    protected $table = 'familias';
    protected $fillable = ['id','descripcion','created_at','updated_at'];
}
