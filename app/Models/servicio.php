<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class servicio extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'descripcion'
    ];
    public function servicios():HasMany{
        return $this->hasMany(servicio::class);
    }
}
