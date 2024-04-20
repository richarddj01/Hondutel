<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class abonado extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_cliente',
        'numero'
    ];
    public function cliente()
    {
        return $this->belongsTo(cliente::class);
    }

    public function telefono(): HasOne
    {
        return $this->hasOne(telefono::class, 'numero','numero');
    }
}
