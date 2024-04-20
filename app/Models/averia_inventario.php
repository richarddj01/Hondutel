<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class averia_inventario extends Model
{
    use HasFactory;
    public function inventarios():BelongsTo{
        return $this->belongsTo(inventario::class);
    }
    public function averias():BelongsTo{
        return $this->belongsTo(averia::class);
    }
}
