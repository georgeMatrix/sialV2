<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturas extends Model
{
    protected $fillable = ['lugar_expedicion', 'metodo_pago', 'forma_pago', 'tipo_comprobante', 'moneda', 'uso_cfdi', 'peso', 'referencia', 'impuestos_trasladados', 'tipoCambio', 'condicionesPago', 'emisor_razon_social', 'receptor_razon_social', 'status'];
}
