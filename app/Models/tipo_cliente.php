<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class tipo_cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'descripcion'
    ];
    public function clientes():HasMany{
        return $this->hasMany(cliente::class)->withTrashed();
    }
}
