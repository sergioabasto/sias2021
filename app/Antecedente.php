<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antecedente extends Model
{
    protected $primaryKey = 'IdAntecedente';
    protected $fillable = [
        'IdAntecedente','Asentamiento','DocumentoAdjunto','IdCandidato',
    ];


    public function candidato()
    {
        return $this->belongsTo('App\Candidato', 'IdCandidato');
    }
}
