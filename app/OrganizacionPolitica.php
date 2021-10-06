<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganizacionPolitica extends Model
{
    protected $primaryKey = 'IdOrganizacionPolitica';
    protected $fillable = [
        'IdOrganizacionPolitica','NombreOrganizacion','Sigla','created_at','updated_at',
    ];

    public function candidato()
    {
        return $this->hasMany('App\Candidato');
    }
}
