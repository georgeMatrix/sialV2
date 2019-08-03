<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturables extends Model
{
    public static function saveFacturables($datosFacturacion, $cartasPorte, $i)
    {
        for ($j = 0; $j < count($datosFacturacion); $j++){
            $mFacturables = new Facturables();
            $mFacturables->id_carta_porte = $cartasPorte[$i]->id;
                $mFacturables->id_datos_facturacion = $datosFacturacion[$j]->id;
                $mFacturables->clave_prod_serv = $datosFacturacion[$j]->claveProdServ;
                $mFacturables->no_identificacion = $datosFacturacion[$j]->noIdentificacion;
                $mFacturables->cantidad = $datosFacturacion[$j]->cantidad;
                $mFacturables->clave_unidad = $datosFacturacion[$j]->claveUnidad;
                $mFacturables->unidad = $datosFacturacion[$j]->unidad;
                $mFacturables->descripcion = $datosFacturacion[$j]->descripcion;
                $mFacturables->valor_unitario = $datosFacturacion[$j]->valorUnitario;
                $mFacturables->importe = $datosFacturacion[$j]->importe;
                $mFacturables->emisor_rfc = $datosFacturacion[$j]->facturador;
                $mFacturables->emisor_razon_social = $datosFacturacion[$j]->facturador;
                $mFacturables->emisor_regimen = $datosFacturacion[$j]->facturador;
                $clientes = Clientes::find($datosFacturacion[$j]->clientes);
                $mFacturables->receptor_rfc = $clientes->rfc;
                $mFacturables->receptor_razon_social = $clientes->razonSocial;
                $mFacturables->receptor_regimen = $clientes->regimen;

            if ($datosFacturacion[$j]->tIva != 0){
                $mFacturables->cfdi_t_iva_base = $datosFacturacion[$j]->importe;
                $mFacturables->cfdi_t_iva_impuesto = "002";
                $mFacturables->cfdi_t_iva_tipofactor = "Tasa";
                $tiva = $datosFacturacion[$j]['tIva']/100;
                //bcdiv($valor, '1', 1);
                $mFacturables->cfdi_t_iva_tasacuota = number_format((float)$tiva, 4);
                $importe = ($datosFacturacion[$j]->importe) * $tiva;
                $mFacturables->cfdi_t_iva_importe = $importe;
            }

            if ($datosFacturacion[$j]->tIrs != 0){
                $mFacturables->cfdi_t_isr_base = $datosFacturacion[$j]->importe;
                $mFacturables->cfdi_t_isr_impuesto = "001";
                $mFacturables->cfdi_t_isr_tipofactor = "Tasa";
                $tisr = $datosFacturacion[$j]['tIsr']/100;
                $mFacturables->cfdi_t_isr_tasacuota = number_format((float)$tisr, 4);
                $importe = ($datosFacturacion[$j]->importe) * $tisr;
                $mFacturables->cfdi_t_isr_importe = $importe;
            }

            if ($datosFacturacion[$j]->rIva != 0){
                $mFacturables->cfdi_r_iva_base = $datosFacturacion[$j]->importe;
                $mFacturables->cfdi_r_iva_impuesto = "002";
                $mFacturables->cfdi_r_iva_tipofactor = "Tasa";
                $rIva = $datosFacturacion[$j]['rIva']/100;
                $mFacturables->cfdi_r_iva_tasacuota = number_format((float)$rIva, 4);
                $importe = ($datosFacturacion[$j]->importe) * $rIva;
                $mFacturables->cfdi_t_iva_importe = $importe;
            }

            if ($datosFacturacion[$j]->rIsr != 0){
                $mFacturables->cfdi_r_isr_base = $datosFacturacion[$j]->importe;
                $mFacturables->cfdi_r_isr_impuesto = "001";
                $mFacturables->cfdi_r_isr_tipofactor = "Tasa";
                $rIsr = $datosFacturacion[$j]['rIsr']/100;
                $mFacturables->cfdi_r_isr_tasacuota = number_format((float)$rIsr,4);
                $importe = ($datosFacturacion[$j]->importe) * $rIva;
                $mFacturables->cfdi_t_isr_importe = $importe;
            }
            $mFacturables->save();
        }
        return "bien";
    }
}
