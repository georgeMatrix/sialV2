<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\Provedores;
use DateTime;
use Illuminate\Http\Request;

class ProvedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provedores = Provedores::orderBy('id', 'DESC')->paginate(10);
        return view('provedor/provedores')->with('provedores' , $provedores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Provedores::all();
        $id = $clientes->last();
        return view('provedor/provedorCreate')->with('id', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $provedor = new Provedores();
        $provedor->nombre = $request->nombre;
        $provedor->razon_social = $request->razon_social;
        $provedor->rfc = $request->rfc;
        $provedor->direccion = $request->direccion;
        $provedor->contacto = $request->contacto;
        $provedor->mail = $request->mail;
        $provedor->credito = $request->credito;
        $provedor->saldo = $request->saldo;
        $provedor->save();

        $status = 'guardado';
        $actividad = new Actividad();
        $actividad->tabla = Provedores::class;
            //$actividad->ref = $request->id;
            $provedoresAll = Provedores::all();
            $last = $provedoresAll->last();
            $idActual = $last->id;
            $actividad->ref = $idActual;
        $actividad->fecha = new DateTime();
        $actividad->status = $status;
        $actividad->descripcion = $status;
        $actividad->usuario = auth()->user()->name;
        $actividad->save();
        return redirect()->route('provedores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Provedores  $provedores
     * @return \Illuminate\Http\Response
     */
    public function show(Provedores $provedores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Provedores  $provedores
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provedor = Provedores::findOrFail($id);
        return view('provedor/provedorEdit')->with('provedor', $provedor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Provedores  $provedores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $provedores = $request->except(['_token', '_method']);
        Provedores::where('id', '=', $id)->update($provedores);
        $status = 'actualizado';
        $actividad = new Actividad();
        $actividad->tabla = Provedores::class;
        $actividad->ref = $id;
        $actividad->fecha = new DateTime();
        $actividad->status = $status;
        $actividad->descripcion = $status;
        $actividad->usuario = auth()->user()->name;
        $actividad->save();
        return redirect()->route('provedores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provedores  $provedores
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Provedores::destroy($id);
        $status = 'eliminado';
        $actividad = new Actividad();
        $actividad->tabla = Provedores::class;
        $actividad->ref = $id;
        $actividad->fecha = new DateTime();
        $actividad->status = $status;
        $actividad->descripcion = $status;
        $actividad->usuario = auth()->user()->name;
        $actividad->save();
        return redirect()->route('provedores.index');
    }
}
