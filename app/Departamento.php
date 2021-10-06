<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $primaryKey = 'IdDepartamento';
    protected $fillable = [
        'IdDepartamento','NombreDepartamento','created_at','updated_at',
    ];

    public function candidatos()
    {
        return $this->hasMany('App\Candidato');
    }
}
