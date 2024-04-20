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
    ];
    public function telefonos()
    {
        return $this->hasMany(telefono::class);
    }
}
