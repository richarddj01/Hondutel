<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class inventario extends Model
{
    use HasFactory;
    protected $fillable = [
        'descripcion',
        'cantidad'
    ];
    public function averia_inventarios():HasMany{
        return $this->hasMany(averia_inventario::class);
    }
}
