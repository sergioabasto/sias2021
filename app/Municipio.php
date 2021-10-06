<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $primaryKey = 'IdMunicipio';
    protected $fillable = [
        'IdMunicipio','NombreMunicipio','IdDepartamento','IdProvincia','created_at','updated_at',
    ];

    public function candidatos()
    {
        return $this->hasMany('App\Candidato');
    }

    public function provincias()
    {
        return $this->hasMany('App\Provincia');
    }
    public function scopeName($query, $name)
    {
        if($name)
            return $query->where('NombreMunicipio', 'LIKE', "%$name%");
    }
}
