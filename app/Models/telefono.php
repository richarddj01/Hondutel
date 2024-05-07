<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class telefono extends Model
{
    use HasFactory;
    protected $primaryKey = 'numero';
    protected $fillable = [
        'numero_de_enlace',
        'zona_id',
        'numero_cable',
        'armario',
        'par_primario',
        'par_secundario',
        'caja_terminal',
        'borne',
        'ruta',
        'codigo_pots',
        'codigo_puerto_pots',
        'codigo_adsl',
        'codigo_puerto_adsl',
        'velocidad',
        'ip_publica',
        'nodo'
        //'_token'
    ];
    public function averias():HasMany{
        return $this->hasMany(averia::class);
    }
    public function zona():BelongsTo{
        return $this->belongsTo(zona::class)->withTrashed();
    }
    public function abonado():HasOne{
        return $this->hasOne(zona::class);
    }
}
