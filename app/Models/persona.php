<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $primaryKey = 'identidad';
    protected $fillable = [
        'identidad',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'telefono',
        'celular',
        'correo',
        'direccion'
    ];
}
