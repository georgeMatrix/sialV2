<?php

namespace App\Http\Controllers;

use App\Clientes;
use App\CuentasPorPagar;
use App\Facturables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class CuentasPorPagarController extends Controller
{
    public function postCuentasPorPagar(Request $request){
        $model = DB::table('facturables');
        return DataTables::of($model)->filter(function ($query) use ($request){
            if ($request->has('prueba')){
                $query->where('id', '=', $request->get('prueba'));
            }
        })->make();
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
        //
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
