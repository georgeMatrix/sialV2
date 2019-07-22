<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\Clientes;
use App\DatosFacturacion;
use App\Provedores;
use App\Rutas;
use DateTime;
use Illuminate\Http\Request;

class DatosFacturacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosF = DatosFacturacion::orderBy('id', 'DESC')->paginate(10);
        return view('datosFacturacion/datosFacturacions')->with('datosF' , $datosF);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rutas = Rutas::all();
        return view('datosFacturacion/datosFacturacionCreate')->with('rutas' ,$rutas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()){
            DatosFacturacion::create($request->all());
            return response()->json([
                "mensaje" =>"creado"
            ]);
        }
        //return response()->json($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DatosFacturacion  $datosFacturacion
     * @return \Illuminate\Http\Response
     */
    public function show(DatosFacturacion $datosFacturacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DatosFacturacion  $datosFacturacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rutas = Rutas::all();
        $provedores = Provedores::all();
        $clientes = Clientes::all();
        $datosF = DatosFacturacion::findOrFail($id);
        return view('datosFacturacion/datosFacturacionEdit')->with('datosF', $datosF)->with('rutas', $rutas)->with('provedores', $provedores)->with('clientes', $clientes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DatosFacturacion  $datosFacturacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosF = $request->except(['_token', '_method']);
        DatosFacturacion::where('id', '=', $id)->update($datosF);
        $status = 'actualizado';
        $actividad = new Actividad();
        $actividad->tabla = DatosFacturacion::class;
        $actividad->ref = $id;
        $actividad->fecha = new DateTime();
        $actividad->status = $status;
        $actividad->descripcion = $status;
        $actividad->usuario = auth()->user()->name;
        $actividad->save();
        return redirect()->route('rutas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DatosFacturacion  $datosFacturacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DatosFacturacion::destroy($id);
        $status = 'eliminado';
        $actividad = new Actividad();
        $actividad->tabla = DatosFacturacion::class;
        $actividad->ref = $id;
        $actividad->fecha = new DateTime();
        $actividad->status = $status;
        $actividad->descripcion = $status;
        $actividad->usuario = auth()->user()->name;
        $actividad->save();
        return redirect()->route('rutas.index');
    }
}
