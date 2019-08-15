<?php

namespace App\Http\Controllers;

use App\Pruebas;
use Illuminate\Http\Request;

class PruebasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "llegando";
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
     * @param  \App\Pruebas  $pruebas
     * @return \Illuminate\Http\Response
     */
    public function show(Pruebas $pruebas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pruebas  $pruebas
     * @return \Illuminate\Http\Response
     */
    public function edit(Pruebas $pruebas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pruebas  $pruebas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pruebas $pruebas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pruebas  $pruebas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pruebas $pruebas)
    {
        //
    }
}
