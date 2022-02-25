<?php

namespace App\Models\Generales;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Docentes extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id', 'identificacion', 'nombres', 'celular', 'correo_institucional' ];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($docentes) {
            $user = User::where('model',$docentes->id)->first();
            if ($user)
                $user->delete();
            return true;
        });
    }

    public static function validationRules(): array
    {
        return [
            'id' => 'numeric|nullable',
            'identificacion' => 'numeric|required',
            'nombres' => 'required',
            'celular' => 'required',
            'correo_institucional' => 'required|email',
        ];
    }
}
