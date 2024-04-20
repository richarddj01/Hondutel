<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class telefono extends Model
{
    use HasFactory;
    protected $primaryKey = 'numero';
    public function averias():HasMany{
        return $this->hasMany(averia::class);
    }
    public function zona():BelongsTo{
        return $this->belongsTo(zona::class);
    }
}