<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $fillable = ['fecha', 'ref', 'tabla', 'status', 'descripcion', 'usuario'];
}
