<?php

namespace App;
use Caffeinated\Shinobi\Concerns\HasRolesAndPermissions;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $primaryKey = 'IdDocumento';
    protected $fillable = [
        'IdDocumento','Documento','DocumentoDescripcion','created_at','updated_at',
    ];
}
