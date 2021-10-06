<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResolucionCredencial extends Model
{
    protected $primaryKey = 'IdResolucionCredencial';
    protected $fillable = [
        'IdResolucionCredencial', 'Descripcion', 'created_at', 'updated_at',
    ];
}
