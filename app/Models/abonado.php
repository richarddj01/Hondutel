<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class abonado extends Model
{
    use HasFactory;
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'identidad', 'identidad');
    }

    public function datos_tecnicos_telefono()
    {
        return $this->hasMany(datos_tecnicos_telefono::class, 'numero', 'numero');
    }
}
