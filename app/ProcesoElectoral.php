<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcesoElectoral extends Model
{
    protected $primaryKey = 'IdProcesoElectoral';
    protected $fillable = [
        'IdProcesoElectoral','DetalleProceso','created_at','updated_at',
    ];

    public function candidatos()
    {
        return $this->hasMany('App\Candidato');
    }

}
