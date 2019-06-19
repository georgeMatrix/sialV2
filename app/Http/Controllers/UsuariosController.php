<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\Usuarios;
use DateTime;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuarios::orderBy('id', 'DESC')->paginate(10);
        return view('usuario/usuarios')->with('usuarios' , $usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Usuarios::all();
        $id = $clientes->last();
        return view('usuario/usuarioCreate')->with('id', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuarios = new Usuarios();
        $usuarios->apellidoPaterno = $request->apellidoPaterno;
        $usuarios->apellidoMaterno = $request->apellidoMaterno;
        $usuarios->nombre = $request->nombre;
        $usuarios->password = $request->password;
        $usuarios->nombreCorto = $request->nombreCorto;
        $usuarios->cargo = $request->cargo;
        $usuarios->area = $request->area;
        if ($request->modulo01 != ""){
            $usuarios->modulo01 = $request->modulo01;
        }
        if ($request->modulo02 != ""){
            $usuarios->modulo02 = $request->modulo02;
        }
        if ($request->modulo03 != ""){
            $usuarios->modulo03 = $request->modulo03;
        }
        if ($request->modulo04 != ""){
            $usuarios->modulo04 = $request->modulo04;
        }
        if ($request->modulo05 != ""){
            $usuarios->modulo05 = $request->modulo05;
        }
        if ($request->modulo06 != ""){
            $usuarios->modulo06 = $request->modulo06;
        }
        if ($request->modulo07 != ""){
            $usuarios->modulo07 = $request->modulo07;
        }
        if ($request->modulo08 != ""){
            $usuarios->modulo08 = $request->modulo08;
        }
        if ($request->modulo09 != ""){
            $usuarios->modulo09 = $request->modulo09;
        }
        if ($request->modulo10 != ""){
            $usuarios->modulo10 = $request->modulo10;
        }
        $usuarios->save();

        $status = 'guardado';
        $actividad = new Actividad();
        $actividad->tabla = Usuarios::class;
        $actividad->ref = $request->id;
        $actividad->fecha = new DateTime();
        $actividad->status = $status;
        $actividad->descripcion = $status;
        $actividad->usuario = auth()->user()->name;
        $actividad->save();

        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(Usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuarios::findOrFail($id);
        return view('usuario/usuarioEdit')->with('usuario', $usuario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuarios = $request->except(['_token', '_method']);
        Usuarios::where('id', '=', $id)->update($usuarios);
        $status = 'actualizacion';
        $actividad = new Actividad();
        $actividad->tabla = Usuarios::class;
        $actividad->ref = $id;
        $actividad->fecha = new DateTime();
        $actividad->status = $status;
        $actividad->descripcion = $status;
        $actividad->usuario = auth()->user()->name;
        $actividad->save();
        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Usuarios::destroy($id);
        $status = 'eliminacion';
        $actividad = new Actividad();
        $actividad->tabla = Usuarios::class;
        $actividad->ref = $id;
        $actividad->fecha = new DateTime();
        $actividad->status = $status;
        $actividad->descripcion = $status;
        $actividad->usuario = auth()->user()->name;
        $actividad->save();
        return redirect()->route('usuarios.index');
    }
}
