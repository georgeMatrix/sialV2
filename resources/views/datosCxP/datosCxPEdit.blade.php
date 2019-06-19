@extends('layouts.app')
@section('content')
    <div class="container">
        @include('include.menu')
        <div class="card bg-dark">
            <div class="row">
                <div class="col-md-9 card-title">
                    <h3 style="font-size: 20pt;" class="mt-3 text-center text-white"><i class="fa fa-map-marked fa-md text-danger"></i> ACTUALIZACION FACTURACION DATOS CUENTAS POR PAGAR</h3>
                </div>
                <div class="col-md-3">
                    <a href="{{route('rutas.index')}}" class="mt-3 mr-3 btn btn-info float-right"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{url('/datosCporPagar/'.$datosCxP->id)}}" method="post">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <h5 for="">Rutas</h5>
                    <select name="ruta" id="ruta" class="form-control">
                        @foreach($rutas as $ruta)
                            @if($datosCxP->rutas == $ruta->id)
                                <option value="{{$ruta->id}}" selected>{{$ruta->nombre}}</option>
                            @else
                                <option value="{{$ruta->id}}">{{$ruta->nombre}}</option>
                            @endif
                        @endforeach
                    </select>

                    <h5 for="">Concepto</h5>
                    <select required name="concepto" id="conceptoCxP" class="form-control">
                        <option value="1">Flete</option>
                        <option value="2">Maniobras</option>
                        <option value="3">Estadias</option>
                        <option value="4">Cruce</option>
                    </select>

                    <h5 for="">Asignacion de Precio</h5>
                    <select name="asignacionPrecio" id="asignacionPrecio" class="form-control">
                        @foreach($provedores as $provedor)
                            @if($provedor->id == $datosCxP->asignacionPrecio)
                                <option value="{{$provedor->id}}" selected>{{$provedor->nombre}}</option>
                            @else
                                <option value="{{$provedor->id}}">{{$provedor->nombre}}</option>
                            @endif
                        @endforeach
                    </select>
                    <h5 for="">Clave de Producto o Servicio</h5>
                    <input type="text" required name="claveprodserv" id="claveprodserv" class="form-control"  value="{{$datosCxP->claveProdServ}}">
                    <h5 for="">Numero de Identificacion</h5>
                    <input type="text" required name="noIdentificacion" id="noIdentificacion" class="form-control"  value="{{$datosCxP->noIdentificacion}}">
                    <h5 for="">Cantidad</h5>
                    <input type="text" required name="cantidad" id="cantidad" class="form-control"  value="{{$datosCxP->cantidad}}">
                    <h5 for="">Clave Unidad</h5>
                    <input type="text" required name="claveUnidad" id="claveUnidad" class="form-control"  value="{{$datosCxP->claveUnidad}}">
                    <h5 for="">Unidad</h5>
                    <input type="text" required name="unidad" id="unidad" class="form-control"  value="{{$datosCxP->unidad}}">
                    <h5 for="">Descripcion</h5>
                    <input type="text" required name="descripcion" id="descripcion" class="form-control"  value="{{$datosCxP->descripcion}}">
                    <h5 for="">Valor unitario</h5>
                    <input type="text" required name="valorUnitario" id="valorUnitario" class="form-control"  value="{{$datosCxP->valorUnitario}}">
                    <h5 for="">Importe</h5>
                    <input type="text" required name="importe" id="importe" class="form-control"  value="{{$datosCxP->importe}}">
                    <h5 for="">Traslado de Iva (Porsentaje)</h5>
                    <input type="text" required name="tivaCxP" id="tivaCxP" class="form-control"  value="{{$datosCxP->tivaCxP}}">
                    <h5 for="">Traslado de Irs (Porcentaje)</h5>
                    <input type="text" required name="tisrCxP" id="tisrCxP" class="form-control"  value="{{$datosCxP->tisrCxP}}">
                    <h5 for="">Retencion de Iva (Porcentaje)</h5>
                    <input type="text" required name="rivaCxP" id="rivaCxP" class="form-control" value="{{$datosCxP->rivaCxP}}">
                    <h5 for="">Retencion de Isr (Porcentaje)</h5>
                    <input type="text" required name="risrCxP" id="risrCxP" class="form-control" value="{{$datosCxP->risrCxP}}">
                    <br>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
@endsection