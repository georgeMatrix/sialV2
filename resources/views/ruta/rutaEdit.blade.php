@extends('layouts.app')
@section('content')
    <div class="container">
        @include('include.menu')
        <div class="card bg-dark">
            <div class="row">
                <div class="col-md-9 card-title">
                    <h3 style="font-size: 20pt;" class="mt-3 text-center text-white"><i class="fa fa-map-marked fa-md text-danger"></i> ACTUALIZACION RUTA</h3>
                </div>
                <div class="col-md-3">
                    <a href="{{route('rutas.index')}}" class="mt-3 mr-3 btn btn-info float-right"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{url('/rutas/'.$ruta->id)}}" method="post">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <h5 for="">Nombre de ruta</h5>
                    <input maxlength="50" required type="text" name="nombre" id="nombre" class="form-control"  value="{{$ruta->nombre}}">
                    <h5 for="">Clientes</h5>
                    <select name="clientes" id="clientes" class="form-control">
                        @foreach($clientes as $cliente)
                            @if($ruta->clientes == $cliente->id)
                                <option value="{{$cliente->id}}" selected>{{$cliente->nombre}}</option>
                            @else
                                <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                            @endif
                        @endforeach
                    </select>
                    <h5 for="">Lugar de expedicion</h5>
                    <input maxlength="50" required type="text" name="lugar_exp" id="lugar_exp" class="form-control"  value="{{$ruta->lugar_exp}}">
                    <h5 for="">Origen</h5>
                    <input maxlength="50" required type="text" name="origen" id="origen" class="form-control"  value="{{$ruta->origen}}">
                    <h5 for="">Remitente</h5>
                    <input maxlength="50" required type="text" name="remitente" id="remitente" class="form-control"  value="{{$ruta->remitente}}">
                    <h5 for="">Domicilio del remitente</h5>
                    <input maxlength="50" required type="text" name="dom_remitente" id="dom_remitente" class="form-control"  value="{{$ruta->dom_remitente}}">
                    <h5 for="">Se recoge en</h5>
                    <input maxlength="50" required type="text" name="recoge" id="recoge" class="form-control"  value="{{$ruta->recoge}}">
                    <h5 for="">Valor declarado</h5>
                    <input maxlength="50" required type="text" name="valor_declarado" id="valor_declarado" class="form-control"  value="{{$ruta->valor_declarado}}">
                    <h5 for="">Destino</h5>
                    <input maxlength="50" required type="text" name="destino" id="destino" class="form-control"  value="{{$ruta->destino}}">
                    <h5 for="">Destinatario</h5>
                    <input maxlength="50" required type="text" name="destinatario" id="destinatario" class="form-control"  value="{{$ruta->destinatario}}">
                    <h5 for="">Domicilio del destinatario</h5>
                    <input maxlength="50" required type="text" name="dom_destinatario" id="dom_destinatario" class="form-control"  value="{{$ruta->dom_destinatario}}">
                    <h5 for="">Se entrega en</h5>
                    <input maxlength="50" required type="text" name="entrega" id="entrega" class="form-control"  value="{{$ruta->entrega}}">
                    <h5 for="">Fecha estimada de entrega</h5>
                    <input maxlength="50" required type="text" name="fecha_entrega" id="fecha_entrega" class="form-control"  value="{{$ruta->fecha_entrega}}">
                    <h5 for="">Cantidad</h5>
                    <input maxlength="50" required type="text" name="cantidad" id="cantidad" class="form-control"  value="{{$ruta->cantidad}}">
                    <h5 for="">Embalaje</h5>
                    <input maxlength="50" required type="text" name="embalaje" id="embalaje" class="form-control"  value="{{$ruta->embalaje}}">
                    <h5 for="">Concepto</h5>
                    <input maxlength="50" required type="text" name="concepto" id="concepto" class="form-control"  value="{{$ruta->concepto}}">
                    <h5 for="">Material peligroso</h5>
                    <input maxlength="50" required type="text" name="material_peligroso" id="material_peligroso" class="form-control"  value="{{$ruta->material_peligroso}}">
                    <h5 for="">Indemnizacion</h5>
                    <input maxlength="50" required type="text" name="indemnizacion" id="indemnizacion" class="form-control"  value="{{$ruta->indemnizacion}}">
                    <h5 for="">Importe</h5>
                    <input min="0" type="number" required name="importe" id="importe" class="form-control"  value="{{$ruta->importe}}">
                    <h5 for="">Asignacion de precio</h5>
                    <select name="asignacion_precio" id="asignacion_precio" class="form-control">
                        @foreach($provedores as $provedor)
                            @if($ruta->asignacion_precio == $provedor->id)
                                <option value="{{$provedor->id}}" selected>{{$provedor->nombre}}</option>
                            @else
                                <option value="{{$provedor->id}}">{{$provedor->nombre}}</option>
                            @endif
                        @endforeach
                    </select>
                    <h5 for="">Observaciones</h5>
                    <input maxlength="50" required type="text" name="obs" id="obs" class="form-control"  value="{{$ruta->obs}}">
                    <h5 for="">Dias para recuperacion de evidencias</h5>
                    <select name="dias_re" id="dias_re" class="form-control">
                        @for($j=1; $j<11; $j++)
                            <option value="{{$j}}">{{$j}}</option>
                        @endfor
                    </select>
                    <br>
                    <button type="submit" class="btn btn-info">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
@endsection