<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class abonados_servicio extends Model
{
    use HasFactory;
    protected $fillable = [ 'abonado_id', 'servicio_id' ];
    public function servicio():BelongsTo{
        return $this->belongsTo(servicio::class)->withTrashed();
    }
}
