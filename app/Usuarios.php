<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $fillable = [
        'apellidoPaterno',
        'apellidoMaterno',
        'nombre',
        'password',
        'nombreCorto',
        'cargo',
        'area',
        'modulo01',
        'modulo02',
        'modulo03',
        'modulo04',
        'modulo05',
        'modulo06',
        'modulo07',
        'modulo08',
        'modulo09',
        'modulo10'
    ];
}