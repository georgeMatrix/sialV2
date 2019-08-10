@extends('layouts.app')
@section('content')
    <div class="container">
        @include('include.menu')
        <div class="card bg-dark">
            <div class="row">
                <div class="col-md-9 card-title">
                    <h3 style="font-size: 20pt;" class="mt-3 text-center text-white"><i class="fa fa-file-alt fa-lg"></i> ACTUALIZACION CARTA PORTE</h3>
                </div>
                <div class="col-md-3">
                    <a href="{{route('cartaPorte.index')}}" class="mt-3 mr-3 btn btn-info float-right"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{url('/cartaPorte/'.$cartaPorte->id)}}" method="post">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group">
                        <h5>Tipo</h5>
                        <select required disabled name="tipo" id="tipo" class="form-control">
                            <option value="N" @if($cartaPorte->tipo == 'N') selected @endif>Nacional</option>
                            <option value="I" @if($cartaPorte->tipo == 'I') selected @endif>Internacional</option>
                            <option value="E" @if($cartaPorte->tipo == 'E') selected @endif>Exportacion</option>
                            <option value="C" @if($cartaPorte->tipo == 'C') selected @endif>Cruce</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <h5 for="">Fecha</h5>
                        <input required disabled type="text" required readonly name="fecha" id="fecha" value="{{$cartaPorte->fecha}}" class="form-control">
                        {!! $errors->first('fecha','<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    @foreach($rutas as $ruta)
                        @if($cartaPorte->rutas == $ruta->id)
                            <div class="form-group">
                                <h5 for="">Cliente</h5>
                                <select id="clientes" disabled class="form-control">
                                    @foreach($clientes as $cliente)
                                        @if($ruta->clientes == $cliente->id)
                                            <option value="{{$cliente->id}}" selected>{{$cliente->nombre}}</option>
                                        @else
                                            <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    @endforeach

                    <div class="form-group">
                        <h5 for="">Ruta</h5>
                        <select required name="rutas" disabled id="rutas" class="form-control">
                            @foreach($rutas as $ruta)
                                @if($cartaPorte->rutas == $ruta->id)
                                    <option value="{{$ruta->id}}" selected>{{$ruta->nombre}}</option>
                                @else
                                    <option value="{{$ruta->id}}">{{$ruta->nombre}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <h5 for="">Unidad</h5>
                        <select required name="unidades" id="unidades" class="form-control">
                            @foreach($unidades as $unidad)
                                @if($cartaPorte->unidades == $unidad->id)
                                    <option value="{{$unidad->id}}" selected>{{$unidad->nombre}}</option>
                                @else
                                    <option value="{{$unidad->id}}">{{$unidad->nombre}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <h5 for="">Remolque</h5>
                        <select required name="remolques" id="remolques" class="form-control">
                            @foreach($remolques as $remolque)
                                @if($cartaPorte->remolques == $remolque->id)
                                    <option value="{{$remolque->id}}" selected>{{$remolque->nombre}}</option>
                                @else
                                    <option value="{{$remolque->id}}">{{$remolque->nombre}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <h5 for="">Operador</h5>
                        <select required name="operadores" id="operadores" class="form-control">
                            @foreach($operadores as $operador)
                                @if($cartaPorte->operadores == $operador->id)
                                    <option value="{{$operador->id}}" selected>{{$operador->nombre_corto}}</option>
                                @else
                                    <option value="{{$operador->id}}">{{$operador->nombre_corto}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <h5>Referencia</h5>
                        <input required maxlength="20" type="text" class="form-control" name="referencia" id="referencia" value="{{$cartaPorte->referencia}}">
                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            <h5 for="">Fecha de Embarque</h5>
                            <input type="text" required readonly disabled name="fechaDeEmbarque" id="fechaDeEmbarque" class="form-control {{$errors->has('fechaDeEmbarque')?'is-invalid':''}}" value="{{$cartaPorte->fechaDeEmbarque}}">
                            {!! $errors->first('fechaDeEmbarque','<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            <h5 for="">Fecha de Entrega</h5>
                            <input type="text" required readonly disabled name="fechaDeEntrega" id="fechaDeEntrega" class="form-control {{$errors->has('fechaDeEntrega')?'is-invalid':''}}" value="{{$cartaPorte->fechaDeEntrega}}">
                            {!! $errors->first('fechaDeEntrega','<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>

                    <button id="guardarCartaPorte" type="submit" class="btn btn-info"><i class="far fa-save"></i> Guardar</button>
                </form>
            </div>
        </div>
    </div>
    @section('scripts')
        <script src="{{asset('js/cartaPorte/cartaPorteEdit.js')}}"></script>
    @endsection
@endsection