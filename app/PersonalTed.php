<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalTed extends Model
{
    protected $primaryKey = 'IdPersonalTed';
    protected $fillable = [
        'IdPersonalTed','NombreCompleto','Cargo','Posicion','created_at','updated_at',
    ];
}
