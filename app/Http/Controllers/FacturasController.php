<?php

namespace App\Http\Controllers;

use App\Contrarecibo;
use App\Facturables;
use App\Facturas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacturasController extends Controller
{
    public function cambioStatus(Request $request){
        $actualizar = null;
        $idParaBuscarTodosLosDatos = $request[0]["valoresIds"][0];
        $noDocumentos = count($request[0]["valoresIds"]);
        $fecha = $request[0]["fechaEstimadaPago"];
        $emisor = Facturas::where('id','=',$idParaBuscarTodosLosDatos)->first(['emisor_razon_social']);
        if ($emisor->emisor_razon_social == 2){
            $emisor = "TRANSPORTES LOGIEXPRESS SA DE CV";
        }else{
            $emisor = "RUBEN GUTIERREZ VELAZCO";
        }
        $cliente = Facturas::where('id','=',$idParaBuscarTodosLosDatos)->first(['receptor_razon_social']);
        $facturas = [];
        //$contrarecibo = Contrarecibo::last;

        foreach($request[0]["valoresIds"] as $index=>$valoresId){
            $registro = Facturas::where("id", "=", $valoresId)->first();
            if ($registro->contrarecibo == null){
                //da en los dos por que los dos regresan datos
                //identificar los que son NO nulos para indicarle al usuario que esos ya traen algun valor
                $actualizar = true;
                //return "true";
            }else{
                $actualizar = false;
                //$facturas = "No actualizado";
                break;
            }
        }
        //return $actualizar;
        if ($actualizar == true){
            $contrarecibo = Contrarecibo::all()->last();
            if ($contrarecibo == null){
                Contrarecibo::create(['contrarecibo' => '1']);
            }else{
                $contrarecibo = Contrarecibo::all()->last();
                $consecutivo = intval($contrarecibo->contrarecibo) + 1;
                Contrarecibo::create(['contrarecibo' => $consecutivo]);
            }
            foreach($request[0]["valoresIds"] as $index=>$valoresId){
                Facturas::where("id", "=", $valoresId)->update(["status" => "REVISION"]);
                Facturas::where("id", "=", $valoresId)->update(["contrarecibo" => $consecutivo]);
                Facturas::where("id", "=", $valoresId)->update(["revicion" => $request[0]["fechaEstimadaPago"]]);
                $facturas[$index] = Facturas::where("id", "=", $valoresId)->get();
            }

        //return $facturas;
        $myFile = \Excel::load('CONTRARECIBO.xlsx', function($reader) use ($facturas, $fecha, $emisor, $cliente, $noDocumentos){
            $reader->sheet('Hoja1', function($sheet) use($facturas, $fecha, $emisor, $cliente, $noDocumentos){
                $sheet->cell('A1', function($cell) use($emisor) {
                    // manipulate the cell
                    $cell->setValue($emisor);
                });
                $sheet->cell('B4', function($cell) use($fecha) {
                    // manipulate the cell
                    $cell->setValue($fecha);
                });
                $sheet->cell('B5', function($cell) use($cliente) {
                    // manipulate the cell
                    $cell->setValue($cliente->receptor_razon_social);
                });
                $sheet->cell('C7', function($cell) use($noDocumentos) {
                    // manipulate the cell
                    $cell->setValue($noDocumentos);
                });
                $noDocumentos=$noDocumentos-1;
                for ($i=0; $i<=$noDocumentos; $i++){
                    foreach ($facturas[$i] as $factura){
                        $j = $i +10;
                        $sheet->cell('A'.$j, function($cell) use($factura) {
                            // manipulate the cell
                            $cell->setValue($factura->folio);
                        });
                        $sheet->cell('B'.$j, function($cell) use($factura) {
                            // manipulate the cell
                            $cell->setValue($factura->total);
                        });
                        $sheet->cell('C'.$j, function($cell) use($factura) {
                            // manipulate the cell
                            $cell->setValue($factura->moneda);
                        });
                        $sheet->cell('D'.$j, function($cell) use($factura) {
                            // manipulate the cell
                            $cell->setValue($factura->tipoCambio);
                        });
                        if ($factura->moneda == 'MXN'){
                            $totalMxn = $factura->total*1;
                            $sheet->cell('E'.$j, function($cell) use($factura, $totalMxn) {
                                // manipulate the cell
                                $cell->setValue($totalMxn);
                            });
                        }
                        if ($factura->moneda == 'USD'){
                            $totalUsd = $factura->total*$factura->tipoCambio;
                            $sheet->cell('E'.$j, function($cell) use($factura, $totalUsd) {
                                // manipulate the cell
                                $cell->setValue($totalUsd);
                            });
                        }
                    }
                }
            });
        });
        $myFile = $myFile->string('xlsx'); //change xlsx for the format you want, default is xls
        $response =  array(
            'name' => "Documento",
            'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,".base64_encode($myFile) //mime type of used format
        );
            return response()->json($response);
        }
    }

    public function cambioStatusPagado(Request $request){
        $validacion = null;
        foreach ($request[0]["valoresIds"] as $valoresId){
            $query = Facturas::where("id", "=", $valoresId)
                ->where("contrarecibo", "<>", null)
                ->where("status", "=", "REVISION")
                ->get();
            if (count($query) > 0){
                $validacion = true;
            }else{
                $validacion = false;
                break;
            }
        }
        if ($validacion == true){
            foreach ($request[0]["valoresIds"] as $valoresId) {
                $importePagado = Facturas::where("id", "=", $valoresId)->first();
                Facturas::where("id", "=", $valoresId)->update(["status" => "PAGADO"]);
                Facturas::where("id", "=", $valoresId)->update(["importe_pagado" => $importePagado->total]);
            }
        }else{
            return "error";
        }
    }

    public function getFacturas(Request $request)
    {
        $facturas = null;
        if ($request[0]['facturas'] == 'ALL' and $request[1]["emisor"] == null and $request[2]["cliente"] == null){
            $facturas = Facturas::all();
            //$facturas = "ALL";
        }
        if ($request[2]["cliente"] != null and $request[0]['facturas'] == "ALL" and $request[1]["emisor"] == null){
            $facturas = Facturas::where('receptor_razon_social', '=', $request[2])
                ->get();
            //$facturas = "PURO CLIENTE";
        }
        if ($request[1]["emisor"] != null and $request[0]["facturas"] == "ALL" and $request[2]["cliente"] == null){
            $facturas = Facturas::where('emisor_razon_social', '=', $request[1])
                ->get();
            //$facturas = "PURO EMISOR";
        }
        if ($request[1]["emisor"] != null and $request[2]["cliente"] != null){
            if ($request[0]["facturas"] != "ALL"){
            $facturas = Facturas::where('receptor_razon_social', '=', $request[2])
                                ->where('emisor_razon_social', '=', $request[1])
                                ->where('status', '=', $request[0]["facturas"])
                                ->get();
                //$facturas = $request;
            }else{
                $facturas = Facturas::where('receptor_razon_social', '=', $request[2])
                    ->where('emisor_razon_social', '=', $request[1])
                    ->get();
            }
            //$facturas = $request;
        }
        return $facturas;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emisorRazonSocial = Facturas::distinct()->get('emisor_razon_social');
        $receptorRazonSocial = Facturas::distinct()->get('receptor_razon_social');
        return view('factura/factura')
            ->with('receptorRazonSocial', $receptorRazonSocial)
            ->with('emisorRazonSocial', $emisorRazonSocial);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Facturas  $facturas
     * @return \Illuminate\Http\Response
     */
    public function show(Facturas $facturas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Facturas  $facturas
     * @return \Illuminate\Http\Response
     */
    public function edit(Facturas $facturas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Facturas  $facturas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facturas $facturas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Facturas  $facturas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facturas $facturas)
    {
        //
    }
}
