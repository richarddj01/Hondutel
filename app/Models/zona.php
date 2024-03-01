<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class zona extends Model
{
    use HasFactory;
    protected $fillable = [
        'descripcion',
        'nombre_corto',
        'oculto',
    ];
    public function datos_tecnicos_telefono()
    {
        return $this->hasMany(datos_tecnicos_telefono::class, 'zonas_id', 'zonas_id');
    }
}
