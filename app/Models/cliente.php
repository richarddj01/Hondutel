<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_tipo_cliente',
        'nombre',
        'apellido',
        'direccion',
        'telefono',
        'celular',
        'correo'
    ];

    public function abonados():HasMany{
        return $this->hasMany(abonado::class);
    }
    public function tipo_cliente():BelongsTo{
        return $this->belongsTo(tipo_cliente::class);
    }
}
