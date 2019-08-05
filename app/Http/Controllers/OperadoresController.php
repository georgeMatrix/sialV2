<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\Http\Requests\OperadoresRequest;
use App\Operadores;
use DateTime;
use Illuminate\Http\Request;

class OperadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operadores = Operadores::orderBy('id', 'DESC')->paginate(10);
        return view('operador/operadores')->with('operadores' , $operadores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('operador/operadorCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OperadoresRequest $request)
    {
        $operador = new Operadores();
        $operador->apellido_paterno = $request->apellido_paterno;
        $operador->apellido_materno = $request->apellido_materno;
        $operador->nombres = $request->nombres;
        $operador->nombre_corto = $request->nombre_corto;
        $operador->licencia = $request->licencia;
        $operador->vigencia_licencia = $request->vigencia_licencia;
        $operador->vigencia_medico = $request->vigencia_medico;
        $operador->telefonoCasa = $request->telefonoCasa;
        $operador->personaContacto = $request->personaContacto;
        $operador->celular = $request->celular;
        $operador->imss = $request->imss;
        $operador->rfc = $request->rfc;
        $operador->obs = $request->obs;
        $operador->save();

        $status = 'guardado';
        $actividad = new Actividad();
        $actividad->tabla = Operadores::class;
            $operadoresAll = Operadores::all();
            $last = $operadoresAll->last();
            $idActual = $last->id;
            $actividad->ref = $idActual;
        $actividad->fecha = new DateTime();
        $actividad->status = $status;
        $actividad->descripcion = $status;
        $actividad->usuario = auth()->user()->name;
        $actividad->save();
        return redirect()->route('operadores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Operadores  $operadores
     * @return \Illuminate\Http\Response
     */
    public function show(Operadores $operadores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Operadores  $operadores
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $operador = Operadores::findOrFail($id);
        return view('operador/operadorEdit')->with('operador', $operador);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Operadores  $operadores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $operadores = $request->except(['_token', '_method']);
        Operadores::where('id', '=', $id)->update($operadores);
        $status = 'actualizado';
        $actividad = new Actividad();
        $actividad->tabla = Operadores::class;
        $actividad->ref = $id;
        $actividad->fecha = new DateTime();
        $actividad->status = $status;
        $actividad->descripcion = $status;
        $actividad->usuario = auth()->user()->name;
        $actividad->save();
        return redirect()->route('operadores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Operadores  $operadores
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Operadores::destroy($id);
        $status = 'eliminado';
        $actividad = new Actividad();
        $actividad->tabla = Operadores::class;
        $actividad->ref = $id;
        $actividad->fecha = new DateTime();
        $actividad->status = $status;
        $actividad->descripcion = $status;
        $actividad->usuario = auth()->user()->name;
        $actividad->save();
        return redirect()->route('operadores.index');
    }
}