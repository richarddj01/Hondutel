<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class inventario extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'descripcion',
        'cantidad'
    ];
    public function averia_inventarios():HasMany{
        return $this->hasMany(averia_inventario::class);
    }
    public function averias()
    {
        return $this->belongsToMany(Averia::class, 'averia_inventarios')->withPivot('cantidad'); // conPivot para obtener la cantidad usada
    }
}
