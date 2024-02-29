<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Averia extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'zona_id',
        'numero',
        'problema_presentado',
        'hora_inicio',
        'ubicacion_latitud',
        'ubicacion_longitud',
        'hora_finalizado',
        'solucionado',
        'observacion',
        'tecnicos_encargados',
    ];

    public function abonado()
    {
        return $this->belongsTo(Abonado::class, 'numero', 'numero');
    }

    public function zona()
    {
        return $this->belongsTo(Zona::class);
    }
    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
}
