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
    public function abonados() //Numeros de telefonos asignados en la tabla abonados
    {
        return $this->hasMany(abonado::class, 'identidad', 'identidad');
    }

    public function tipos_servicios() //Numeros de telefonos asignados en la tabla abonados
    {
        return $this->belongsTo(tipo_servicio::class, 'tipo_servicios_id','id');
    }
}
