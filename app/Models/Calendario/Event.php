<?php

namespace App\Models\Calendario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'title', 'description', 'start', 'type'];
}
