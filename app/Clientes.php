<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $fillable = ['nombre', 'razonSocial', 'rfc', 'regimen', 'calle', 'numero', 'interior', 'colonia', 'ciudad', 'cp', 'estado', 'contacto1', 'telefono1', 'mail1', 'contacto2', 'telefono2', 'mail2', 'diaRevision', 'diaCredito'];
}
