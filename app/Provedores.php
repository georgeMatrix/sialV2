<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provedores extends Model
{
    protected $fillable = ['nombre', 'razon_social', 'rfc', 'direccion', 'contacto', 'mail', 'credito', 'saldo'];
}
