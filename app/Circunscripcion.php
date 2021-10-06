<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Circunscripcion extends Model
{
    protected $primaryKey = 'IdCircunscripcion';
    protected $fillable = [
        'IdCircunscripcion','Circunscripcion', 'IdDepartamento','created_at','updated_at',
    ];

    public function departamentos()
    {
        return $this->hasMany('App\Departamento');
    }
}
