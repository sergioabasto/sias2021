<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $primaryKey = 'IdProvincia';
    protected $fillable = [
        'IdProvincia','NombreProvincia','IdDepartamento','created_at','updated_at',
    ];

    public function candidatos()
    {
        return $this->hasMany('App\Candidato');
    }

    public function departamentos()
    {
        return $this->hasMany('App\Departamento');
    }
    public function scopeName($query, $name)
    {
        if($name)
            return $query->where('NombreProvincia', 'LIKE', "%$name%");
    }
}
