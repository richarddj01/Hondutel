<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class abonados_servicio extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [ 'abonado_id', 'servicio_id' ];
    public function servicio():BelongsTo{
        return $this->belongsTo(servicio::class)->withTrashed();
    }
    public function abonado():BelongsTo{
        return $this->belongsTo(abonado::class)->withTrashed();
    }
}
