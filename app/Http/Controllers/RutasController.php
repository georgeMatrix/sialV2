<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\CartaPorte;
use App\Clientes;
use App\DatosCporPagar;
use App\DatosFacturacion;
use App\Provedores;
use App\Rutas;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RutasController extends Controller
{
    public function rutasClientes(Request $request, $id){
        if ($request->ajax()){
            $rutas = CartaPorte::rutas($id);
            return response()->json($rutas);
        }
        //return Rutas::where("clientes", "=", $id)->get(); <====TAMBIEN DE ESTA MANERA FUNCIONA
    }

    public function datosSelect(){
        return Rutas::all();
    }

    public function datosCporPagar(){
        return DatosCporPagar::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosCxP = DatosCporPagar::all();
        $datosCxPListado = DatosCporPagar::all();
        $clientes = Clientes::all();
        $provedores = Provedores::all();
        $rutasAll = Rutas::all();
        $datosF = DatosFacturacion::orderBy('id', 'DESC')->paginate(10);
        $rutas = Rutas::orderBy('id', 'DESC')->paginate(10);
        //Se mandan dos rutas, ya que una de ellas no manda todos los datos ya que como esta paginada solo manda un pedazo

        return view('ruta/rutas')
            ->with('rutas' , $rutas)
            ->with('datosF' , $datosF)
            ->with('provedores', $provedores)
            ->with('clientes', $clientes)
            ->with('rutasAll', $rutasAll)
            ->with('datosCxP', $datosCxP)
            ->with('datosCxPListado', $datosCxPListado);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datosF = DatosFacturacion::all();
        $provedores = Provedores::all();
        $rutas = Rutas::all();
        $clientes = Clientes::all();
        $datosCxP = DatosCporPagar::all(); //Este solo se usa para el ajax de actividad

        //======DATOS PARA ACTIVIDAD======//
        $id = $rutas->last();

        $status = 'guardado';
        $actividad = new Actividad();

        $actividad->tabla = Rutas::class;
            /*$rutasAll = Rutas::all();
            $last = $rutasAll->last();*/
            $actividad->ref = $id;
        $actividad->status = $status;
        $actividad->descripcion = $status;
        $actividad->usuario = auth()->user()->name;

        $idDatosFacturacion = $datosF->last();
        $actividadDatosFacturacion = new Actividad();
        $actividadDatosFacturacion->tabla = DatosFacturacion::class;
        $actividadDatosFacturacion->ref = $idDatosFacturacion;
        $actividadDatosFacturacion->status = $status;
        $actividadDatosFacturacion->descripcion = $status;
        $actividadDatosFacturacion->usuario = auth()->user()->name;

        $idDatosCxP = $datosCxP->last();
        $actividadDCxP = new Actividad();
        $actividadDCxP->tabla = DatosCporPagar::class;
        $actividadDCxP->ref = $idDatosCxP;
        $actividadDCxP->status = $status;
        $actividadDCxP->descripcion = $status;
        $actividadDCxP->usuario = auth()->user()->name;
        //======DATOS PARA ACTIVIDAD======//

        return view('ruta/rutaCreate')
            ->with('clientes',$clientes)
            ->with('rutas' ,$rutas)
            ->with('provedores', $provedores)
            ->with('datosF', $datosF)
            ->with('actividad', $actividad)
            ->with('actividadDatosFacturacion', $actividadDatosFacturacion)
            ->with('actividadDCxP', $actividadDCxP);
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
            Rutas::create($request->all());
            return response()->json([
                "mensaje" =>"creado"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rutas  $rutas
     * @return \Illuminate\Http\Response
     */
    public function show(Rutas $rutas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rutas  $rutas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provedores = Provedores::all();
        $clientes = Clientes::all();
        $ruta = Rutas::findOrFail($id);
        return view('ruta/rutaEdit')->with('ruta', $ruta)->with('clientes', $clientes)->with('provedores', $provedores);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rutas  $rutas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rutas = $request->except(['_token', '_method']);
        Rutas::where('id', '=', $id)->update($rutas);

        $status = 'actualizado';
        $actividad = new Actividad();
        $actividad->tabla = Rutas::class;
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
     * @param  \App\Rutas  $rutas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rutas::destroy($id);
        $status = 'eliminado';
        $actividad = new Actividad();
        $actividad->tabla = Rutas::class;
        $actividad->ref = $id;
        $actividad->fecha = new DateTime();
        $actividad->status = $status;
        $actividad->descripcion = $status;
        $actividad->usuario = auth()->user()->name;
        $actividad->save();
        return redirect()->route('rutas.index');
    }
}
