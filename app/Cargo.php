<?php

namespace App;
use Caffeinated\Shinobi\Concerns\HasRolesAndPermissions;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $primaryKey = 'IdCargo';
    protected $fillable = [
        'IdCargo','Ambito','NombreCargo','Titularidad', 'Posicion', 'DetalleCargo','created_at','updated_at',
    ];

    public function autoridads()
    {
        return $this->hasMany('App\Autoridad');
    }

    public function candidatos()
    {
        return $this->hasMany('App\Candidato');
    }

    public function scopeName($query, $name)
    {
        if($name)
            return $query->where('NombreCargo', 'LIKE', "%$name%");
    }
}
