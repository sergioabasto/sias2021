<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nacion extends Model
{
    protected $primaryKey = 'IdNacion';
    protected $fillable = [
        'NombreNacion','created_at','updated_at',
    ];
}
