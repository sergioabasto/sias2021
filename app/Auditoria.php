<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
    protected $primaryKey = 'IdAuditoria';
    protected $fillable = [
        'IdAuditoria','NombreTabla','Accion','IdUsuario','created_at','updated_at',
    ];

    public function usuario()
    {
        return $this->belongsTo('App\User', 'IdUsuario');
    }
}
