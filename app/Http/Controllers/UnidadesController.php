<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\Provedores;
use App\Unidades;
use DateTime;
use Illuminate\Http\Request;

class UnidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provedores = Provedores::all();
        $unidades = Unidades::orderBy('id', 'DESC')->paginate(10);
        return view('unidad/unidades')
            ->with('unidades' , $unidades)
            ->with('provedores', $provedores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provedores = Provedores::all();
        return view('unidad/unidadCreate')->with('provedores', $provedores);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unidades = new Unidades();
        $unidades->provedor = $request->provedor;
        $unidades->nombre = $request->nombre;
        $unidades->economico = $request->economico;
        $unidades->tipo = $request->tipo;
        $unidades->marca = $request->marca;
        $unidades->modelo = $request->modelo;
        $unidades->placas = $request->placas;
        $unidades->serie = $request->serie;
        $unidades->motor = $request->motor;
        $unidades->seguro = $request->seguro;
        $unidades->verificacion = $request->verificacion;
        $unidades->fm = $request->fm;
        $unidades->obs = $request->obs;
        $unidades->save();

        $status = 'guardado';
        $actividad = new Actividad();
        $actividad->tabla = Unidades::class;
        $actividad->ref = $request->id;
        $actividad->fecha = new DateTime();
        $actividad->status = $status;
        $actividad->descripcion = $status;
        $actividad->usuario = auth()->user()->name;
        $actividad->save();

        return redirect()->route('unidades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unidades  $unidades
     * @return \Illuminate\Http\Response
     */
    public function show(Unidades $unidades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unidades  $unidades
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provedores = Provedores::all();
        $unidad = Unidades::findOrFail($id);
        return view('unidad/unidadEdit')->with('unidad', $unidad)->with('provedores', $provedores);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unidades  $unidades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $unidades = $request->except(['_token', '_method']);
        Unidades::where('id', '=', $id)->update($unidades);
        $status = 'actualizado';
        $actividad = new Actividad();
        $actividad->tabla = Unidades::class;
        $actividad->ref = $id;
        $actividad->fecha = new DateTime();
        $actividad->status = $status;
        $actividad->descripcion = $status;
        $actividad->usuario = auth()->user()->name;
        $actividad->save();
        return redirect()->route('unidades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unidades  $unidades
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Unidades::destroy($id);
        $status = 'eliminado';
        $actividad = new Actividad();
        $actividad->tabla = Provedores::class;
        $actividad->ref = $id;
        $actividad->fecha = new DateTime();
        $actividad->status = $status;
        $actividad->descripcion = $status;
        $actividad->usuario = auth()->user()->name;
        $actividad->save();
        return redirect()->route('unidades.index');
    }
}
