<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datos_tecnicos_telefono extends Model
{
    //use HasFactory;
    protected $primaryKey = 'numero';
    public function zona()
    {
        return $this->belongsTo(zona::class, 'zonas_id')->withTrashed();
    }
    public function abonado()
    {
        return $this->belongsTo(Abonado::class, 'numero', 'numero');
    }

}
