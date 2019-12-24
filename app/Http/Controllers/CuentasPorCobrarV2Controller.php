<?php

namespace App\Http\Controllers;
use App\CartaPorte;
use App\Clientes;
use App\Cruce;
use App\CuentasPorCobrarV2;
use App\Exportacion;
use App\Facturables;
use App\facturacion\Facturacion;
use App\Facturas;
use App\Importacion;
use Illuminate\Http\Request;


class CuentasPorCobrarV2Controller extends Controller
{
    public function serverExterno(Request $request){
        Facturacion::facturacionUno();
    }

    public function datosAGuardarEnFactura(Request $request){
        //return count($request[0]);
        //return count($request[0]);

        $guardadoFactura = Facturas::create([
            'lugar_expedicion' => $request[1],
            'metodo_pago' => $request[2],
            'forma_pago' => $request[3],
            'tipo_comprobante' => $request[4],
            'moneda' => $request[5]
        ]);
        //$facturables = new Facturables();
        //$facturables->factura = $guardadoFactura->id;
        //$cartaPorte = $request[0][0][0]->only(['_token', '_method']);
        for($i=0; $i < count($request[0]); $i++){
            Facturables::where('id', '=', $request[0][$i][0]['id'])->update(['factura' => $guardadoFactura->id]);
        }
        return response()->json($request);
/*============================================================*/

        /*$tamInputCheckFacturar = count($request[0]);
        for($i=0; $i < $tamInputCheckFacturar; $i++){
            $factura = new Facturas();
            $factura->lugar_expedicion = $request[0][$i][0]['USER_NOMBRE_RUTA'];
            $factura->save();
        }
        return count($request[0]);*/
    }

    public function datosParaFacturar(Request $request){
        //dd(array_count_values($request));
        //$prueba =  join(',', json_decode($request));
        $valores =[];
        $facturables = [];
        for ($i=0; $i<count($request->valoresIds); $i++){
            $valores[$i] = Facturables::where('id', '=', $request->valoresIds[$i])->get();
            if (count($valores[$i]) != 0){
                $facturables[$i] = $valores[$i];
            }
        }
        return response()->json($facturables);

        //return $request->valoresIds[2];
    }

    public function getDatosCuentasPorCobrar(Request $request ){
        $query = Facturables::where('emisor_razon_social', $request[0]['facturador'])
            ->where('cliente_id', '=', $request[1]['cliente'])
            ->get();
        return response()->json($query);
    }

    public function cliente($id){
        $cliente = Clientes::where('id', '=', $id)->get();
        return response()->json($cliente);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturables = Facturables::orderBy('id', 'DESC')->paginate(10);
        $clientes = Clientes::all();
        return view('cuentasPorCobrar/cuentasPorCobrarV2')
            ->with('clientes', $clientes)
            ->with('facturables', $facturables);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cartasPorteRelease = CartaPorte::where('status', '=', 'release')->get();
        $clientes = Clientes::all();
        return view('cuentasPorCobrar/cuentasPorCobrarCreate')
            ->with('clientes', $clientes)
            ->with('cartasPorteRelease', $cartasPorteRelease);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
        //Facturables::create($request->all());
        $facturable = new Facturables();
        $facturable->id_carta_porte = $request->id_carta_porte;
        $facturable->id_datos_facturacion = $request->id_datos_facturacion;
        $facturable->clave_prod_serv = $request->clave_prod_serv;
        $facturable->no_identificacion = $request->no_identificacion;
        $facturable->cantidad = $request->cantidad;
        $facturable->clave_unidad = $request->clave_unidad;
        $facturable->unidad = $request->unidad;
        $facturable->descripcion = $request->descripcion;
        $facturable->valor_unitario = $request->valor_unitario;
        $facturable->importe = $request->importe;
        $facturable->emisor_razon_social = $request->emisor_razon_social;

            $facturable->emisor_rfc = $request->emisor_rfc;
        $facturable->emisor_regimen = $request->emisor_regimen;
        $facturable->receptor_rfc = $request->receptor_rfc;
            $facturable->receptor_razon_social = $request->receptor_razon_social;
            $facturable->cliente_id = $request->cliente_id;
            $facturable->receptor_regimen = $request->receptor_regimen;
        //$facturable->trasladoIva = $request->trasladoIva;
        //$facturable->trasladoIsr = $request->trasladoIsr;
        //$facturable->retencionIva = $request->retencionIva;
        //$facturable->retencionIsr = $request->retencionIsr;
        $facturable->cfdi_t_iva_base = $request->cfdi_t_iva_base;
        $facturable->cfdi_t_iva_impuesto = $request->cfdi_t_iva_impuesto;
        $facturable->cfdi_t_iva_tipofactor = $request->cfdi_t_iva_tipofactor;
        $facturable->cfdi_t_iva_tasacuota = $request->cfdi_t_iva_tasacuota;
        $facturable->cfdi_t_iva_importe = $request->cfdi_t_iva_importe;
        $facturable->cfdi_t_isr_base = $request->cfdi_t_isr_base;
        $facturable->cfdi_t_isr_impuesto = $request->cfdi_t_isr_impuesto;
        $facturable->cfdi_t_isr_tipofactor = $request->cfdi_t_isr_tipofactor;
        $facturable->cfdi_t_isr_tasacuota = $request->cfdi_t_isr_tasacuota;
        $facturable->cfdi_t_isr_importe = $request->cfdi_t_isr_importe;
        $facturable->cfdi_r_iva_base = $request->cfdi_r_iva_base;
        $facturable->cfdi_r_iva_impuesto = $request->cfdi_r_iva_impuesto;
        $facturable->cfdi_r_iva_tipofactor = $request->cfdi_r_iva_tipofactor;
        $facturable->cfdi_r_iva_tasacuota = $request->cfdi_r_iva_tasacuota;
        $facturable->cfdi_r_iva_importe = $request->cfdi_r_iva_importe;
        $facturable->cfdi_r_isr_base = $request->cfdi_r_isr_base;
        $facturable->cfdi_r_isr_impuesto = $request->cfdi_r_isr_impuesto;
        $facturable->cfdi_r_isr_tipofactor = $request->cfdi_r_isr_tipofactor;
        $facturable->cfdi_r_isr_tasacuota = $request->cfdi_r_isr_tasacuota;
        $facturable->cfdi_r_isr_importe = $request->cfdi_r_isr_importe;

        /*==================================================================
        /*FALTA QUE GUARDE ESTOS VALORES POR QUE SI NO DARA UN ERROR*/
        /*==================================================================*/
        $cartaPorte = CartaPorte::where('id', '=', $request->id_carta_porte)->get();
        foreach ($cartaPorte as $carta){
        $facturable->USER_CARTA_PORTE_TIPO = $carta->id;
        $facturable->USER_CARTA_PORTE_TIPO_ID = $carta->tipo;
        $facturable->USER_NOMBRE_RUTA = $carta->rutaCartaP->nombre;
        $facturable->USER_UNIDAD = $carta->unidadesF->economico;
        $facturable->USER_REMOLQUE = $carta->unidadesF->economico;
        $facturable->USER_OPERADOR = $carta->operadorF->nombre_corto;
        }
        $facturable->save();

        return redirect('cuentasPorCobrarV2');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CuentasPorCobrarV2  $cuentasPorCobrarV2
     * @return \Illuminate\Http\Response
     */
    public function show(CuentasPorCobrarV2 $cuentasPorCobrarV2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CuentasPorCobrarV2  $cuentasPorCobrarV2
     * @return \Illuminate\Http\Response
     */
    public function edit(CuentasPorCobrarV2 $cuentasPorCobrarV2)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CuentasPorCobrarV2  $cuentasPorCobrarV2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CuentasPorCobrarV2 $cuentasPorCobrarV2)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CuentasPorCobrarV2  $cuentasPorCobrarV2
     * @return \Illuminate\Http\Response
     */
    public function destroy(CuentasPorCobrarV2 $cuentasPorCobrarV2)
    {
        //
    }
}
