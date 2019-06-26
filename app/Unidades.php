<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidades extends Model
{
    protected $fillable = ['provedor', 'nombre', 'economico', 'tipo', 'marca', 'modelo', 'placas', 'serie', 'motor', 'seguro', 'verificacion', 'fm', 'obs'];
    public function provedores(){
        return $this->belongsTo(Unidades::class, 'provedor');
    }
}
