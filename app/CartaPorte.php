<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartaPorte extends Model
{
    public function rutaCartaP(){
        return $this->belongsTo(Rutas::class, 'rutas');
    }

    public function unidadesF(){
        return $this->belongsTo(Unidades::class, 'unidades');
    }

    public function operadorF(){
        return $this->belongsTo(Operadores::class, 'operadores');
    }
}
