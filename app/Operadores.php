<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operadores extends Model
{
    protected $fillable = ['apellido_paterno', 'apellido_materno', 'nombres', 'nombre_corto', 'licencia', 'vigencia_licencia', 'vigencia_medico', 'telefonoCasa', 'personaContacto', 'celular', 'imss', 'rfc', 'obs'];
}
