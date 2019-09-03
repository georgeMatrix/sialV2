<?php

namespace App\Http\Controllers;

use App\CartaPorte;
use App\Clientes;
use App\Cruce;
use App\CuentasPorCobrarV2;
use App\Exportacion;
use App\Facturables;
use App\Importacion;
use Illuminate\Http\Request;

class CuentasPorCobrarV2Controller extends Controller
{
    public function getDatosCuentasPorCobrar(Request $request ){
        $query = Facturables::where('emisor_razon_social', $request[0]['facturador'])
            ->where('cliente_id', $request[1]['cliente'])
            ->get();
        return response()->json($query);
    }

    /*public function getDatosCuentasPorCobrar(){
        return "llegando";
        //return $request;
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturables = Facturables::orderBy('id', 'DESC')->paginate();
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
