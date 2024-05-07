<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class zona extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'descripcion',
        'nombre_corto',
    ];
    public function telefonos()
    {
        return $this->hasMany(telefono::class);
    }
}
