<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturables extends Model
{
    public static function saveFacturables($datosFacturacion, $contador, $cartasPorte)
    {
        for ($j = 0; $j < count($datosFacturacion); $j++){
            for ($i = 0; $i < $contador; $i++) {
                $datosFacturaciones = new Facturables();
                for ($k=0; $k < count($cartasPorte); $k++){
                    if ($datosFacturacion[$j][$i]['id'] == $cartasPorte[$k]['id']){
                        $datosFacturaciones->id_carta_porte = $cartasPorte[$k]['id'];  //primary de carta porte
                    }
                }
                //$facturablesObj->id_carta_porte = $facturables[$j][$i]['rutas']; si es que fuera la ruta
                $datosFacturaciones->id_datos_facturacion = $datosFacturacion[$j][$i]['id'];
                $datosFacturaciones->clave_prod_serv = $datosFacturacion[$j][$i]['claveProdServ'];
                $datosFacturaciones->no_identificacion = $datosFacturacion[$j][$i]['noIdentificacion'];
                $datosFacturaciones->cantidad = $datosFacturacion[$j][$i]['cantidad'];
                $datosFacturaciones->clave_unidad = $datosFacturacion[$j][$i]['claveUnidad'];
                $datosFacturaciones->unidad = $datosFacturacion[$j][$i]['unidad'];
                $datosFacturaciones->descripcion = $datosFacturacion[$j][$i]['descripcion'];
                $datosFacturaciones->valor_unitario = $datosFacturacion[$j][$i]['valorUnitario'];
                $datosFacturaciones->importe = $datosFacturacion[$j][$i]['importe'];

                $datosFacturaciones->emisor_rfc = "X";
                $datosFacturaciones->emisor_razon_social = "X";
                $datosFacturaciones->emisor_regimen = "X";
                $datosFacturaciones->receptor_rfc = $datosFacturacion[$j][$i]->clientesF->rfc;
                $datosFacturaciones->receptor_razon_social = $datosFacturacion[$j][$i]->clientesF->razonSocial;
                $datosFacturaciones->receptor_regimen = $datosFacturacion[$j][$i]->clientesF->regimen;
                if ($datosFacturacion[$j][$i]['tIva'] != 0){
                    $valorTIva = $datosFacturacion[$j][$i]['tIva'];
                    $valorReal = $valorTIva/100;
                    $valorConCero = "0".$valorReal;
                    $valorImporte = $datosFacturacion[$j][$i]->importe;
                    $valorCfdiTivaImporte = $valorImporte/$valorTIva;

                    $datosFacturaciones->cfdi_t_iva_base = $datosFacturacion[$j][$i]->importe;
                    $datosFacturaciones->cfdi_t_iva_impuesto = '002';
                    $datosFacturaciones->cfdi_t_iva_tipofactor = 'Tasa';
                    $datosFacturaciones->cfdi_t_iva_tasacuota = $valorConCero;
                    $datosFacturaciones->cfdi_t_iva_importe = $valorCfdiTivaImporte;
                    }
                $datosFacturaciones->save();
            }
        }
        return $datosFacturacion;
    }
}
