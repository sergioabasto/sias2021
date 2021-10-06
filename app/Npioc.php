<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Npioc extends Model
{
    protected $primaryKey = 'IdCandidato';
    protected $fillable = [ 'IdCandidato',
                            'Nombres',
                            'PrimerApellido',
                            'SegundoApellido',
                            'DocumentoIdentidad',
                            'ComplementoSegip',
                            'LugarExpedido',
                            'Genero',
                            'Direccion',
                            'Telefono',
                            'FechaNacimiento',
                            'IsElecto',
                            'IdCargo',
                            'IdOrganizacionPolitica',
                            'IdProcesoElectoral',
                            'IdDepartamento',
                            'IdProvincia',
                            'IdMunicipio',
                            'created_at',
                            'updated_at',
                          ];


    public function antecedentes()
    {
        return $this->hasMany('App\Antecedente');
    }

    public function autoridades()
    {
        return $this->hasMany('App\Autoridad');
    }

    public function cargo()
    {
        return $this->belongsTo('App\Cargo', 'IdCargo');
    }
    public function organizacion_politica()
    {
        return $this->belongsTo('App\OrganizacionPolitica', 'IdOrganizacionPolitica');
    }
    public function proceso_eletoral()
    {
        return $this->belongsTo('App\ProcesoElectoral', 'IdProcesoElectoral');
    }
    public function departamento()
    {
        return $this->belongsTo('App\Departamento', 'IdDepartamento');
    }
    public function provincia()
    {
        return $this->belongsTo('App\Provincia', 'IdProvincia');
    }
    public function municipio()
    {
        return $this->belongsTo('App\Municipio', 'IdMunicipio');
    }

    //QUERY

    public function scopeNombre($query, $name)
    {
        if($name)
            return $query->where('Nombres', 'LIKE', "%$name%");
    }

    public function scopeAppat($query, $appat)
    {
        if($appat)
            return $query->where('PrimerApellido', 'LIKE', "%$appat%");
    }

    public function scopeApmat($query, $apmat)
    {
        if($apmat)
            return $query->where('SegundoApellido', 'LIKE', "%$apmat%");
    }
    public function scopeCI($query, $ci)
    {
        if($ci)
            return $query->where('DocumentoIdentidad', 'LIKE', "%$ci%");
    }
}
