<?php

namespace App\Http\Controllers;

use App\CartaPorte;
use App\Clientes;
use App\CuentasPorPagar;
use App\Facturables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class CuentasPorPagarController extends Controller
{
    public function postCuentasPorPagar(Request $request){
        /*echo $request;
        $model = DB::table('facturables');
        return DataTables::of($model)->make();*/

        $model = DB::table('facturables');
        return DataTables::of($model)->filter(function ($query) use ($request){
            if ($request->has('facturadorCuentasPorPagar') && request('facturadorCuentasPorPagar') && !request('clienteCuentasPorPagar')){
                $query->where('emisor_razon_social', '=', $request->get('facturadorCuentasPorPagar'));
            }

            if ($request->has('clienteCuentasPorPagar') && request('clienteCuentasPorPagar') && !request('facturadorCuentasPorPagar')){
                $query->where('cliente_id', '=', $request->get('clienteCuentasPorPagar'));
            }
            if ($request->has('clienteCuentasPorPagar') && request('clienteCuentasPorPagar') && ($request->has('facturadorCuentasPorPagar'))){
                $query->where('emisor_rfc', '=', $request->get('facturadorCuentasPorPagar'));
                $query->where('cliente_id', '=', $request->get('clienteCuentasPorPagar'));
                //receptor_razon_social
                //receptor_razon_social
            }
            //DECIRLE A PETER QUE METAMOS EL CLIENTE CON NUMERO

            /*if ($request->has('clienteCuentasPorPagar')){
                $query->where('id_carta_porte', '=', $request->get('clienteCuentasPorPagar'));
            }*/
        })->make(true);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturables = Facturables::orderBy('id', 'DESC')->paginate();
        $clientes = Clientes::all();
        return view('cuentasPorPagar/cuentasPorPagar')
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
        return view('cuentasPorPagar/cuentasPorPagarCreate')
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
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CuentasPorPagar  $cuentasPorPagar
     * @return \Illuminate\Http\Response
     */
    public function show(CuentasPorPagar $cuentasPorPagar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CuentasPorPagar  $cuentasPorPagar
     * @return \Illuminate\Http\Response
     */
    public function edit(CuentasPorPagar $cuentasPorPagar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CuentasPorPagar  $cuentasPorPagar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CuentasPorPagar $cuentasPorPagar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CuentasPorPagar  $cuentasPorPagar
     * @return \Illuminate\Http\Response
     */
    public function destroy(CuentasPorPagar $cuentasPorPagar)
    {
        //
    }
}
