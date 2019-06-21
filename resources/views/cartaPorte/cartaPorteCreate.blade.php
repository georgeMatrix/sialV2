@extends('layouts.app')
@section('content')
    <div class="container">
        @include('include.menu')
        <div class="card bg-dark">
            <div class="row">
                <div class="col-md-9 card-title">
                    <h3 style="font-size: 20pt;" class="mt-3 text-center text-white"><i class="fa fa-file-alt fa-lg text-danger"></i> LISTADO CARTA PORTE</h3>
                </div>
                <div class="col-md-3">
                    <a href="{{route('cartaPorte.index')}}" class="mt-3 mr-3 btn btn-info float-right"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('cartaPorte.store')}}" method="post" id="formularioCartaPorte">
                    {{csrf_field()}}
                    @if(empty($id->id))
                        <input type="hidden" value="1" name="id">
                    @else
                        <input type="hidden" value="{{$id->id+1}}" name="id">
                    @endif
                    <div class="form-group">
                    <h5>Tipo</h5>
                    <select required name="tipo" id="tipo" class="form-control">
                        <option value="n">Nacional</option>
                        <option value="i">Internacional</option>
                        <option value="e">Exportacion</option>
                        <option value="c">Cruce</option>
                    </select>
                    </div>

                    <div class="form-group">
                        <h5 for="">Fecha</h5>
                        <input required type="text" required readonly name="fecha" id="fecha" class="form-control">
                    </div>

                    <div class="form-group">
                        <h5 for="">Cliente</h5>
                            <select name="clientes" id="clientes" class="form-control">
                                @foreach($clientes as $cliente)
                                <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                                @endforeach
                            </select>
                    </div>

                    <div class="form-group">
                        <h5 for="">Ruta</h5>
                        <select required name="rutas" id="rutas" class="form-control">
                        @foreach($rutas as $ruta)
                            <option value="{{$ruta->id}}">{{$ruta->nombre}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <h5 for="">Unidad</h5>
                        <select required name="unidad" id="unidad" class="form-control">
                            @foreach($unidades as $unidad)
                                <option value="{{$unidad->id}}">{{$unidad->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <h5 for="">Remolque</h5>
                        <select required name="remolque" id="remolque" class="form-control">
                            @foreach($remolques as $remolque)
                                <option value="{{$remolque->id}}">{{$remolque->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <h5 for="">Operador</h5>
                        <select required name="operador" id="operador" class="form-control">
                            @foreach($operadores as $operador)
                                <option value="{{$operador->id}}">{{$operador->nombre_corto}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <h5>Referencia</h5>
                        <input required maxlength="20" type="text" class="form-control" name="referencia" id="referencia">
                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            <h5 for="">Fecha de Embarque</h5>
                            <input type="text" required readonly name="fechaDeEmbarque" id="fechaDeEmbarque" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            <h5 for="">Fecha de Entrega</h5>
                            <input type="text" required readonly name="fechaDeEntrega" id="fechaDeEntrega" class="form-control">
                        </div>
                    </div>

                    <button id="guardarCartaPorte" type="submit" class="btn btn-info"><i class="far fa-save"></i> Guardar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{asset('js/cartaPorte/cartaPorte.js')}}"></script>
@endsection