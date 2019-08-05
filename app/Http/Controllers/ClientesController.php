<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\Clientes;
use DateTime;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dias = [1=>'lunes', 2=>'martes', 3=>'miercoles', 4=>'jueves', 5=>'viernes'];
        $clientes = Clientes::orderBy('id', 'DESC')->paginate(10);
        return view('cliente/clientes')->with('clientes' , $clientes)->with('dias' ,$dias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Clientes::all();
        $id = $clientes->last();
        return view('cliente/clienteCreate')->with('id', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clientes = new Clientes();
        $clientes->nombre = $request->nombre;

        $clientes->razonSocial = $request->razonSocial;
        $clientes->rfc = $request->rfc;
        $clientes->regimen = $request->regimen;

        $clientes->calle = $request->calle;
        $clientes->numero = $request->numero;
        $clientes->interior = $request->interior;
        $clientes->colonia = $request->colonia;
        $clientes->ciudad = $request->ciudad;
        $clientes->cp = $request->cp;
        $clientes->estado = $request->estado;
        $clientes->contacto1 = $request->contacto1;
        $clientes->tel1 = $request->tel1;
        $clientes->mail1 = $request->mail1;
        $clientes->contacto2 = $request->contacto2;
        $clientes->tel2 = $request->tel2;
        $clientes->mail2 = $request->mail2;
        $clientes->dia_revision = $request->dia_revision;
        $clientes->dia_credito = $request->dia_credito;
        $clientes->save();

        $status = 'guardado';
        $actividad = new Actividad();
        $clienteActividad = new Clientes();
        $actividad->tabla = Clientes::class;
            $clientesAll = Clientes::all();
            $last = $clientesAll->last();
            $idActual = $last->id;
            $actividad->ref = $idActual;
        $actividad->fecha = new DateTime();
        $actividad->status = $status;
        $actividad->descripcion = $status;
        $actividad->usuario = auth()->user()->name;
        $actividad->save();
        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show(Clientes $clientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dias = [1=>'lunes', 2=>'martes', 3=>'miercoles', 4=>'jueves', 5=>'viernes'];
        $cliente = Clientes::findOrFail($id);
        return view('cliente/clienteEdit')->with('cliente', $cliente)->with('id',$id)->with('dias', $dias);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $clientes = $request->except(['_token', '_method']);
        Clientes::where('id', '=', $id)->update($clientes);

        $status = 'actualizado';
        $actividad = new Actividad();
        $actividad->tabla = Clientes::class;
        $actividad->ref = $id;
        $actividad->fecha = new DateTime();
        $actividad->status = $status;
        $actividad->descripcion = $status;
        $actividad->usuario = auth()->user()->name;
        $actividad->save();
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Clientes::destroy($id);

        $status = 'eliminacion';
        $actividad = new Actividad();
        $actividad->tabla = Clientes::class;
        $actividad->ref = $id;
        $actividad->fecha = new DateTime();
        $actividad->status = $status;
        $actividad->descripcion = $status;
        $actividad->usuario = auth()->user()->name;
        $actividad->save();
        return redirect()->route('clientes.index');
    }
}
