<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosCporPagar extends Model
{
    protected $fillable = ['ruta', 'concepto', 'asignacionPrecio', 'claveProdServ', 'noIdentificacion', 'cantidad', 'claveUnidad', 'unidad', 'descripcion', 'valorUnitario', 'importe', 'tivaCxP', 'tisrCxP', 'rivaCxP', 'risrCxP'];

    public function rutaF(){
        return $this->belongsTo(Rutas::class, 'ruta');
    }

    public function asignacionPrecioF(){
        return $this->belongsTo(Provedores::class, 'asignacionPrecio');
    }
}
