<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Autoridad extends Model
{
    protected $primaryKey = 'IdAutoridad';
    protected $fillable = [
        'IdAutoridad','DocumentoAdjunto','Observaciones','FechaSolicitud', 'FechaRespuesta', 'IsHabilitado', 'DetalleIsHabilitado', 'IdCandidato', 'IdCargo', 'IsActivo','created_at','updated_at',
    ];
    public function candidato()
    {
        return $this->belongsTo('App\Candidato', 'IdCandidato');
    }
    public function cargo()
    {
        return $this->belongsTo('App\Cargo', 'IdCargo');
    }

    public function scopeNombre($query, $name)
    {
        if($name)
            return $query->where('IdAutoridad', 'LIKE', "%$name%");
    }
    public function scopeCand($query, $idcand)
    {
        if($idcand)
            return $query->where('IdCandidato', 'LIKE', "%$idcand%");
    }

}
