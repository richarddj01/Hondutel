<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class tipo_averia extends Model
{
    use HasFactory;

    public function averias() : HasMany{
        return $this->hasMany(averia::class);
    }
}
