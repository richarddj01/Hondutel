<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class tipo_usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion'
    ];

    public function users():HasMany{
        return $this->hasMany(user::class);
    }
}
