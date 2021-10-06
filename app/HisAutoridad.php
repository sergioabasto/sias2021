<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HisAutoridad extends Model
{
    protected $primaryKey = 'IdHistorico';
    protected $fillable = [
        'HisIdAutoridad','HisDocumentoAdjunto','HisObservaciones','HisFechaSolicitud', 'HisFechaRespuesta',
        'HisIsHabilitado', 'HisDetalleIsHabilitado', 'HisIdCandidato', 'HisIdCargo', 'HisIdDocumento','HisIsActivo',
    ];
}
