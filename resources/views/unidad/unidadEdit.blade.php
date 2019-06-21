@extends('layouts.app')
@section('content')
    <div class="container">
        @include('include.menu')
        <div class="card bg-dark">
            <div class="row">
                <div class="col-md-9 card-title">
                    <h3 style="font-size: 20pt;" class="mt-3 text-center text-white"><i class="fa fa-truck fa-md text-danger"></i> ACTUALIZACION UNIDADES</h3>
                </div>
                <div class="col-md-3">
                    <a href="{{route('unidades.index')}}" class="mt-3 mr-3 btn btn-info float-right"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{url('/unidades/'.$unidad->id)}}" method="post">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}

                    <h5 for="">Provedor</h5>
                    <select name="provedor" required id="provedor" class="form-control">
                        @foreach($provedores as $provedor)
                            @if($provedor->id == $unidad->provedor)
                                <option value="{{$provedor->id}}" selected>{{$provedor->nombre}}</option>
                            @else
                                <option value="{{$provedor->id}}">{{$provedor->nombre}}</option>
                            @endif
                        @endforeach
                    </select>
                    <h5 for="">Nombre de la unidad</h5>
                    <input maxlength="70" required type="text" name="nombre" id="nombre" class="form-control"  value="{{$unidad->nombre}}">
                    <h5 for="">Economico</h5>
                    <input maxlength="10" required type="text" name="economico" id="economico" class="form-control"  value="{{$unidad->economico}}">
                    <h5 for="">Tipo de unidad</h5>
                    <select name="tipo" id="tipo" class="form-control">
                        @for($j=1; $j<3; $j++)
                            @if($unidad->tipo == $j)
                                <option value="{{$j}}" selected>{{$camiones[$j]}}</option>
                            @else
                                <option value="{{$j}}">{{$camiones[$j]}}</option>
                            @endif
                        @endfor
                    </select>

                    <h5 for="">Marca</h5>
                    <input maxlength="20" required type="text" name="marca" id="marca" class="form-control"  value="{{$unidad->marca}}">
                    <h5 for="">Modelo</h5>
                    <input maxlength="20" required type="text" name="modelo" id="modelo" class="form-control"  value="{{$unidad->modelo}}">
                    <h5 for="">Placas</h5>
                    <input maxlength="20" required type="text" name="placas" id="placas" class="form-control"  value="{{$unidad->placas}}">
                    <h5 for="">Numero de serie de chasis</h5>
                    <input maxlength="30" required type="text" name="serie" id="serie" class="form-control"  value="{{$unidad->serie}}">
                    <h5 for="">Numero de serie de motor</h5>
                    <input maxlength="30" required type="text" name="motor" id="motor" class="form-control"  value="{{$unidad->motor}}">
                    <h5 for="">Vencimiento de poliza de seguro</h5>
                    <input type="text" readonly required name="seguro" id="seguro" class="form-control"  value="{{$unidad->seguro}}">
                    <h5 for="">Vencimiento de verificacion</h5>
                    <input type="text" readonly required name="verificacion" id="verificacion" class="form-control"  value="{{$unidad->verificacion}}">
                    <h5 for="">Vencimiento de fisico mecanico</h5>
                    <input type="text" readonly required name="fm" id="fm" class="form-control"  value="{{$unidad->fm}}">
                    <h5 for="">Observaciones</h5>
                    <input maxlength="100" type="text" name="obs" id="obs" class="form-control"  value="{{$unidad->obs}}">
                    <br>
                    <button type="submit" class="btn btn-info">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{asset('js/unidad/unidadEdit.js')}}">
    </script>
@endsection