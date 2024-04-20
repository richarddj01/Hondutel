<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Averia extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'zona_id',
        'numero',
        'problema_presentado',
        'hora_inicio',
        'ubicacion_inicio',
        'ubicacion_final',
        'hora_finalizado',
        'solucionado',
        'observacion',
        'tecnicos_encargados',
    ];

    public function telefonos()
    {
        return $this->belongsTo(telefono::class, 'numero', 'numero');
    }
    public function tipo_averia(){
        return $this->belongsTo(tipo_averia::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function averia_inventario():BelongsTo{
        return $this->belongsTo(averia_inventario::class);
    }
}