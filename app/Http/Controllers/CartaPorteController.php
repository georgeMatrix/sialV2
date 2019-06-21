<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\CartaPorte;
use App\Clientes;
use App\Cruce;
use App\Exportacion;
use App\Internacional;
use App\Nacional;
use App\Operadores;
use App\Rutas;
use App\Unidades;
use DateTime;
use Illuminate\Http\Request;

class CartaPorteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = ['Nacional', 'Internacional', 'Exportacion', 'Cruce'];
        $cartaPorte = CartaPorte::orderBy('id', 'DESC')->paginate(10);
        return view('cartaPorte/cartasPorte')
            ->with('cartaPorte', $cartaPorte)
            ->with('tipos', $tipos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cartaPorte = CartaPorte::all();
        $id = $cartaPorte->last();
        $rutas = Rutas::all();
        $unidades = Unidades::where("tipo", "=", "1")->get();
        $remolques = Unidades::where("tipo", "=", "2")->get();
        $operadores = Operadores::all();
        $actividades = Actividad::all();
        $clientes = Clientes::all();
        return view('cartaPorte/cartaPorteCreate')
            ->with('clientes', $clientes)
            ->with('rutas', $rutas)
            ->with('unidades', $unidades)
            ->with('remolques', $remolques)
            ->with('operadores', $operadores)
            ->with('actividades', $actividades)
            ->with('id', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cartaPorte = new CartaPorte();
        $cartaPorte->tipo = $request->tipo;
        $cartaPorte->fecha = $request->fecha;
        $cartaPorte->rutas = $request->rutas;
        $cartaPorte->unidades = $request->unidad;
        $cartaPorte->remolques = $request->remolque;
        $cartaPorte->operadores = $request->operador;
        $cartaPorte->referencia = $request->referencia;
        $cartaPorte->fechaDeEmbarque = $request->fechaDeEmbarque;
        $cartaPorte->fechaDeEntrega = $request->fechaDeEntrega;
        $cartaPorte->save();

        if ($request->tipo == "n"){
            $nacional = new Nacional();
            $nacional->cartaPorte = $request->id;
            $nacional->save();
        }
        elseif ($request->tipo == "i") {
            $internacional = new Internacional();
            $internacional->cartaPorte = $request->id;
            $internacional->save();
        }

        elseif ($request->tipo == "e") {
            $exportacion = new Exportacion();
            $exportacion->cartaPorte = $request->id;
            $exportacion->save();
        }

        elseif ($request->tipo == "c") {
            $cruce = new Cruce();
            $cruce->cartaPorte = $request->id;
            $cruce->save();
        }

        $status = 'guardado';
        $actividad = new Actividad();
        $actividad->tabla = CartaPorte::class;
        $actividad->ref = $request->id;
        $actividad->fecha = new DateTime();
        $actividad->status = $status;
        $actividad->descripcion = $status;
        $actividad->usuario = auth()->user()->name;
        $actividad->save();

        return redirect()->route('cartaPorte.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CartaPorte  $cartaPorte
     * @return \Illuminate\Http\Response
     */
    public function show(CartaPorte $cartaPorte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CartaPorte  $cartaPorte
     * @return \Illuminate\Http\Response
     */
    public function edit(CartaPorte $cartaPorte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CartaPorte  $cartaPorte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartaPorte $cartaPorte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CartaPorte  $cartaPorte
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartaPorte $cartaPorte)
    {
        //
    }
}
