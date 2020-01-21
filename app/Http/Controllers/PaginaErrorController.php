<?php

namespace App\Http\Controllers;

use App\PaginaError;
use Illuminate\Http\Request;

class PaginaErrorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("paginaError/paginaNoAutorizada");
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
     * @param  \App\PaginaError  $paginaError
     * @return \Illuminate\Http\Response
     */
    public function show(PaginaError $paginaError)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaginaError  $paginaError
     * @return \Illuminate\Http\Response
     */
    public function edit(PaginaError $paginaError)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaginaError  $paginaError
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaginaError $paginaError)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaginaError  $paginaError
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaginaError $paginaError)
    {
        //
    }
}
