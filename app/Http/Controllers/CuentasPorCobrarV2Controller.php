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
use App\Nacional;
use App\Provedores;
use App\Rutas;
use App\Unidades;
use function Couchbase\defaultDecoder;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class CuentasPorCobrarV2Controller extends Controller
{
    public function excel(Request $request){
        $facturables = Facturables::where('factura', '=', $request['idFactura'])->get();
        $facturablesFirst = Facturables::where('factura', '=', $request['idFactura'])->first();
        $conceptos = Facturables::where('factura', '=', $request['idFactura'])->get();
        $tamConceptos = count($conceptos);
        $cartaPorte = CartaPorte::where('id', '=', $facturablesFirst->id_carta_porte)->first();
        $unidades = Unidades::where('id', '=', $cartaPorte->unidades)->first();
        $provedor = Provedores::where('id', '=', $unidades->provedor)->first();
        $rutas = Rutas::where('id', '=', $cartaPorte->rutas)->first();
        $factura = Facturas::where('id', '=', $facturablesFirst->factura)->first();
        $cliente = Clientes::where('id', '=', $facturablesFirst->cliente_id)->first();
        //var_dump($facturables->updated_at);
        //return $facturables;
        $myFile = \Excel::load('FACTURA_V3.xlsx', function($reader) use($facturablesFirst, $facturables, $factura, $conceptos, $tamConceptos, $cliente, $rutas, $provedor, $unidades){
        //$myFile = \Excel::load('FACTURA_V2.xlsx', function($reader) use($facturables, $conceptos, $tamConceptos){
            $reader->sheet('Hoja1', function($sheet) use($facturablesFirst, $facturables, $factura, $conceptos, $tamConceptos, $cliente, $rutas, $provedor, $unidades){
            //$reader->sheet('Hoja1', function($sheet) use($facturables, $conceptos, $tamConceptos){

                $sheet->cell('L1', function($cell) use($facturablesFirst) {
                    // manipulate the cell
                    $cell->setValue($facturablesFirst->id);
                });
                $sheet->cell('J3', function($cell) use($factura) {
                    // manipulate the cell
                    $cell->setValue($factura->uuid);
                });
                $sheet->cell('J5', function($cell) use($factura) {
                    // manipulate the cell
                    $cell->setValue($factura->numero_de_certificado);
                });
                $sheet->cell('J7', function($cell) use($factura) {
                    // manipulate the cell
                    $cell->setValue($factura->fecha);
                });
                $sheet->cell('A8', function($cell) use($facturablesFirst) {
                    // manipulate the cell
                    $cell->setValue($facturablesFirst->receptor_razon_social);
                });
                $sheet->cell('A9', function($cell) use($facturablesFirst) {
                    // manipulate the cell
                    $cell->setValue($facturablesFirst->receptor_rfc);
                });
                $sheet->cell('A11', function($cell) use($cliente) {
                    // manipulate the cell
                    $calle = $cliente->calle . " " . $cliente->numero;
                    $cell->setValue($calle);
                });
                $sheet->cell('A12', function($cell) use($cliente) {
                    // manipulate the cell
                    $cell->setValue($cliente->colonia);
                });
                $sheet->cell('A13', function($cell) use($cliente) {
                    // manipulate the cell
                    $cell->setValue($cliente->cp);
                });
                $sheet->cell('A14', function($cell) use($cliente) {
                    // manipulate the cell
                    $cell->setValue($cliente->ciudad);
                });
                $sheet->cell('A15', function($cell) use($cliente) {
                    // manipulate the cell
                    $cell->setValue($cliente->estado);
                });
                $sheet->cell('G12', function($cell) use($factura) {
                    // manipulate the cell
                    $cell->setValue($factura->lugar_expedicion);
                });
                $sheet->cell('I13', function($cell) use($factura) {
                    // manipulate the cell
                    $cell->setValue($factura->forma_pago);
                });
                $sheet->cell('I14', function($cell) use($factura) {
                    // manipulate the cell
                    $cell->setValue($factura->condicionesPago);
                });
                $sheet->cell('I16', function($cell) use($factura) {
                    // manipulate the cell
                    $cell->setValue($factura->uso_cfdi);
                });
                $sheet->cell('I21', function($cell) use($factura) {
                    // manipulate the cell
                    $cell->setValue($factura->tipoCambio);
                });
                $sheet->cell('I15', function($cell) use($factura) {
                    // manipulate the cell
                    $cell->setValue($factura->metodo_pago);
                });
                $sheet->cell('B18', function($cell) use($rutas) {
                    // manipulate the cell
                    $cell->setValue($rutas->origen);
                });
                $sheet->cell('B19', function($cell) use($rutas) {
                    // manipulate the cell
                    $cell->setValue($rutas->destino);
                });
                $sheet->cell('B21', function($cell) use($provedor) {
                    // manipulate the cell
                    $cell->setValue($provedor->nombre);
                });
                $sheet->cell('K18', function($cell) use($unidades) {
                    // manipulate the cell
                    $cell->setValue($unidades->placas);
                });
                $sheet->cell('H18', function($cell) use($facturablesFirst) {
                    // manipulate the cell
                    $cell->setValue($facturablesFirst->USER_UNIDAD);
                });
                $sheet->cell('H19', function($cell) use($facturablesFirst) {
                    // manipulate the cell
                    $cell->setValue($facturablesFirst->USER_REMOLQUE);
                });
                $sheet->cell('C20', function($cell) use($facturablesFirst) {
                    // manipulate the cell
                    $cell->setValue($facturablesFirst->USER_CARTA_PORTE_TIPO.$facturablesFirst->USER_CARTA_PORTE_ID);
                });
                $sheet->cell('C22', function($cell) use($facturablesFirst) {
                    // manipulate the cell
                    $cell->setValue($facturablesFirst->USER_OPERADOR);
                });
                $sheet->cell('H22', function($cell) use($factura) {
                    // manipulate the cell
                    $cell->setValue($factura->moneda);
                });
                $sheet->cell('H20', function($cell) use($factura) {
                    // manipulate the cell
                    $cell->setValue($factura->peso);
                });
                $sheet->cell('M22', function($cell) use($factura) {
                    // manipulate the cell
                    $cell->setValue($factura->tipo_comprobante);
                });

                $sellos = 0;
                $celda = 0;
                for ($i=0; $i<$tamConceptos; $i++){
                    if ($celda == 0){
                        $celda = 25+$i;
                    }else{
                        $celda = $celda+2;
                    }
                    $celdaIvas = $celda + 1;
                    //$sheet->mergeCells('A'.$celda.':B'.$celda);
                    /*$sheet->mergeCells('A'.$celdaIvas.':B'.$celdaIvas);
                    $sheet->mergeCells('E'.$celdaIvas.':F'.$celdaIvas);
                    $sheet->mergeCells('J'.$celdaIvas.':K'.$celdaIvas);
                    $sheet->mergeCells('M'.$celdaIvas.':N'.$celdaIvas);
                    $sheet->mergeCells('E'.$celda.':J'.$celda);
                    $sheet->mergeCells('C'.$celda.':D'.$celda);
                    $sheet->mergeCells('K'.$celda.':L'.$celda);
                    $sheet->mergeCells('M'.$celda.':N'.$celda);*/

                    $sheet->cell('E'.$celda, function($cell) use($conceptos, $i) {
                        // manipulate the cell
                        foreach ($conceptos as $k=>$concepto) {
                            if ($i==$k){
                                $cell->setValue($concepto->descripcion);
                            }
                        }
                    });

                    $sheet->cell('A'.$celda, function($cell) use($conceptos, $i) {
                        // manipulate the cell
                        foreach ($conceptos as $k=>$concepto) {
                            if ($i == $k) {
                                $cell->setValue($concepto->cantidad);
                            }
                        }
                    });

                    $sheet->cell('C'.$celda, function($cell) use($facturables, $i) {
                        // manipulate the cell
                        foreach ($facturables as $k=>$facturable) {
                            if ($i == $k) {
                                $cell->setValue($facturable->unidad);
                            }
                        }
                    });

                    $sheet->cell('K'.$celda, function($cell) use($facturables, $i) {
                        // manipulate the cell
                        foreach ($facturables as $k=>$facturable) {
                            if ($i == $k) {
                                $cell->setValue($facturable->valor_unitario);
                            }
                        }
                    });
                    $sheet->cell('M'.$celda, function($cell) use($facturables, $i) {
                        // manipulate the cell
                        foreach ($facturables as $k=>$facturable) {
                            if ($i == $k) {
                                $cell->setValue($facturable->importe);
                            }
                        }
                    });
                    $sheet->cell('A'.$celdaIvas, function($cell) use($facturables, $i) {
                        // manipulate the cell
                        foreach ($facturables as $k=>$facturable) {
                            if ($i == $k) {
                                $cell->setValue($facturable->clave_prod_serv);
                            }
                        }
                    });
                    /*$sheet->cell('A'.$celdaIvas, function($cell) {
                        // manipulate the cell
                        $cell->setValue("ClaveProdServ");
                    });*/
                    $sheet->cell('C'.$celdaIvas, function($cell) use($facturables, $i) {
                        // manipulate the cell
                        foreach ($facturables as $k=>$facturable) {
                            if ($i == $k) {
                                $cell->setValue($facturable->clave_unidad);
                            }
                        }
                    });
                    /*$sheet->cell('E'.$celdaIvas, function($cell) {
                        // manipulate the cell
                        $cell->setValue("ClaveUnidad");
                    });*/
                    $sheet->cell('H'.$celdaIvas, function($cell) use($facturables, $i) {
                        // manipulate the cell
                        foreach ($facturables as $k=>$facturable) {
                            if ($i == $k) {
                                $cell->setValue($facturable->cfdi_r_iva_importe);
                            }
                        }
                    });
                    $sheet->cell('G'.$celdaIvas, function($cell) {
                        // manipulate the cell
                        $cell->setValue("IVA RET");
                    });
                    $sheet->cell('F'.$celdaIvas, function($cell) use($facturables, $i) {
                        // manipulate the cell
                        foreach ($facturables as $k=>$facturable) {
                            if ($i == $k) {
                                $cell->setValue($facturable->cfdi_t_iva_importe);
                            }
                        }
                    });
                    $sheet->cell('E'.$celdaIvas, function($cell) {
                        // manipulate the cell
                        $cell->setValue("IVA");
                    });
                    $subtotal = $celdaIvas;
                    $sellos = $celdaIvas;
                }
                $subtotal = $subtotal + 4;
                $retenidos = $subtotal+1;
                $trasladados = $retenidos+2;
                $total = $subtotal+3;
                $sellos = $sellos + 10;

                $sheet->cell('M38', function($cell) use($factura) {
                    // manipulate the cell
                    $cell->setValue($factura->subtotal);
                });
                /*$sheet->cell('J'.$subtotal, function($cell) {
                    // manipulate the cell
                    $cell->setValue("Subtotal");
                });*/
                $sheet->cell('M39', function($cell) use($factura) {
                    // manipulate the cell
                    $cell->setValue($factura->impuestos_trasladados);
                });
                $sheet->cell('M40', function($cell) use($factura) {
                    // manipulate the cell
                    //$cell->setValue($factura->impuestos_retenidos);
                    $cell->setValue($factura->impuestos_retenidos);
                });
                /*$sheet->cell('J'.$trasladados, function($cell) {
                    // manipulate the cell
                    $cell->setValue("Impuestos Trasladados");
                });*/
                /*$sheet->cell('J'.$retenidos, function($cell) {
                    // manipulate the cell
                    $cell->setValue("impuestos Retenidos");
                });*/

                $sheet->cell('M41', function($cell) use($factura) {
                    // manipulate the cell
                    $cell->setValue($factura->total);
                });
                /*$sheet->cell('J'.$total, function($cell) {
                    // manipulate the cell
                    $cell->setValue("Total");
                });*/


                $finalSellos = $sellos+4;
                $sellosTitulo = $sellos-1;
                /*$sheet->cell('A'.$sellosTitulo, function($cell) {
                    // manipulate the cell
                    $cell->setValue("Sello Digital CFDI");
                });*/
                $sheet->cell('A43', function($cell) use($factura) {
                    // manipulate the cell
                    $cell->setValue($factura->sello);
                });


                //---------------------------------
                $selloSat = $sellos+6;
                $selloFinalSat = $selloSat + 4;
                $selloSatTitulo = $selloSat-1;
                /*$sheet->cell('A'.$selloSatTitulo, function($cell) {
                    // manipulate the cell
                    $cell->setValue("Sello digital del SAT:");
                });*/

                $sheet->cell('A47', function($cell) use($factura) {
                    // manipulate the cell
                    $cell->setValue($factura->selloCFD);
                });
                //----------------------------------
                $certificado = $selloSat+6;
                $certificadoFinal = $certificado+4;
                $certificadoTitulo = $certificado-1;
                /*$sheet->cell('D'.$certificadoTitulo, function($cell) {
                    // manipulate the cell
                    $cell->setValue("Cadena Original del complemento de certificación digital del SAT:");
                });*/
                $sheet->cell('D51', function($cell) use($factura) {
                    // manipulate the cell
                    $cell->setValue($factura->certificado);
                });

            });
        });
        //->download();
        $myFile = $myFile->string('xlsx'); //change xlsx for the format you want, default is xls
        $response =  array(
            'name' => "FACTURA".$request['idFactura'],
            'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,".base64_encode($myFile) //mime type of used format
        );
        return response()->json($response);
    }

    public function serverExterno(Request $request){
        Facturacion::facturacionUno();
    }

    public function datosAGuardarEnFactura(Request $request){
        //dd($request[0][0][0]['emisor_razon_social']);
        //return count($request[0]);
        //return count($request[0]);
        $guardadoFactura = Facturas::create([
            'lugar_expedicion' => $request[1],
            'metodo_pago' => $request[2],
            'forma_pago' => $request[3],
            'tipo_comprobante' => $request[4],
            'moneda' => $request[5],
            'uso_cfdi' => $request[6],
            'peso' => $request[7],
            'referencia' => $request[8],
            'tipoCambio' => $request[9],
            'condicionesPago' => $request[10],
            'emisor_razon_social' => $request[0][0][0]['emisor_razon_social'],
            'receptor_razon_social' => $request[0][0][0]['receptor_razon_social'],
            'status' => 'GENERADO'
        ]);
        //$facturables = new Facturables();
        //$facturables->factura = $guardadoFactura->id;
        //$cartaPorte = $request[0][0][0]->only(['_token', '_method']);
        for($i=0; $i < count($request[0]); $i++){
            Facturables::where('id', '=', $request[0][$i][0]['id'])->update(['factura' => $guardadoFactura->id]);
        }
        return response()->json($guardadoFactura->id);
    }

    public function datosLlenosAGuardarEnFactura(Request $request){
        //$verificador = count($request->datosDeFactura[6]);
        /*dd($request->datosDeFactura[6]);
        $verificador = null;*/
        if($request->datosDeFactura[6] != null){
        Facturas::where('id', '=', $request->datosDeFactura[0]['Folio'])->update([
            'total' => $request->datosDeFactura[0]['Total'],
            'certificado' => $request->datosDeFactura[0]['Certificado'],
            'subtotal' => $request->datosDeFactura[0]['SubTotal'],
            'numero_de_certificado' => $request->datosDeFactura[0]['NoCertificado'],
            'sello' => $request->datosDeFactura[5]['SelloSAT'],
            'fecha' => $request->datosDeFactura[0]['Fecha'],
            'folio' => $request->datosDeFactura[0]['Folio'],
            'serie' => $request->datosDeFactura[0]['Serie'],
            'version' => $request->datosDeFactura[0]['Version'],
            'uuid' => $request->datosDeFactura[5]['UUID'],
            'fecha_timbrado' => $request->datosDeFactura[5]['FechaTimbrado'],
            'impuestos_trasladados' => $request->datosDeFactura[6]['TotalImpuestosTrasladados'],
            'impuestos_retenidos' => $request->datosDeFactura[6]['TotalImpuestosRetenidos'],
            'selloCFD' => $request->datosDeFactura[5]['SelloCFD']
            ]);
        }
        if($request->datosDeFactura[6] == null){
            Facturas::where('id', '=', $request->datosDeFactura[0]['Folio'])->update([
                'total' => $request->datosDeFactura[0]['Total'],
                'certificado' => $request->datosDeFactura[0]['Certificado'],
                'subtotal' => $request->datosDeFactura[0]['SubTotal'],
                'numero_de_certificado' => $request->datosDeFactura[0]['NoCertificado'],
                'sello' => $request->datosDeFactura[5]['SelloSAT'],
                'fecha' => $request->datosDeFactura[0]['Fecha'],
                'folio' => $request->datosDeFactura[0]['Folio'],
                'serie' => $request->datosDeFactura[0]['Serie'],
                'version' => $request->datosDeFactura[0]['Version'],
                'uuid' => $request->datosDeFactura[5]['UUID'],
                'fecha_timbrado' => $request->datosDeFactura[5]['FechaTimbrado'],
                'impuestos_trasladados' => $request->datosDeFactura[6]['TotalImpuestosTrasladados'],
                'selloCFD' => $request->datosDeFactura[5]['SelloCFD']
            ]);
        }
        return $request->datosDeFactura[0]['Folio'];
        //return $request->datosDeFactura;
        //return "llegando";
        //Facturas::where('id', )
        //return response()->json($request);
    }

    public function datosParaFacturar(Request $request){
        $valores =[];
        $facturables = [];
        for ($i=0; $i<count($request->valoresIds); $i++){
            $valores[$i] = Facturables::where('id', '=', $request->valoresIds[$i])->get();
            if (count($valores[$i]) != 0){
                $facturables[$i] = $valores[$i];
            }
        }
        return response()->json($facturables);
        //return response()->json($request)
    }

    public function getDatosCuentasPorCobrar(Request $request ){
        $query = Facturables::where('emisor_razon_social', $request[0]['facturador'])
            ->where('cliente_id', '=', $request[1]['cliente'])
            ->where('factura', '=', null)
            ->get();
        $tipo = [];
        foreach($query as $k=>$facturables){

            if ($facturables->USER_CARTA_PORTE_TIPO_ID == "N"){
                $tipo[$k] = Nacional::where("cartaPorte", $facturables->USER_CARTA_PORTE_TIPO)->first();
                $letra = "N";

            }
            elseif ($facturables->USER_CARTA_PORTE_TIPO_ID == "I") {
                $tipo[$k] = Importacion::where("cartaPorte", $facturables->USER_CARTA_PORTE_TIPO)->first();
                $letra = "I";
            }

            elseif ($facturables->USER_CARTA_PORTE_TIPO_ID == "E") {
                $tipo[$k] = Exportacion::where("cartaPorte", "=", $facturables->USER_CARTA_PORTE_TIPO)->first();
                $letra = "E";

            }

            elseif ($facturables->USER_CARTA_PORTE_TIPO_ID == "C") {
                $tipo[$k] = Cruce::where("cartaPorte", "=", $facturables->USER_CARTA_PORTE_TIPO)->first();
                $letra = "C";

            }
        }
        //dd($tipo);
        return response()->json([$query, $tipo]);
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
