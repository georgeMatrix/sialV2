@extends('layouts.app')
@section('content')
    <div class="container">
        @include('include.menu')
        <div class=" card bg-dark">
            <div class="row">
                <div class="col-md-9 card-title">
                    <h3 style="font-size: 20pt;" class="mt-3 text-center text-white"><i class="text-danger fas fa-user"></i> ACTUALIZACION CLIENTES</h3>
                </div>
                <div class="col-md-3">
                    <a href="{{route('clientes.index')}}" class="mt-3 mr-3 btn btn-info float-right"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>
            </div>
        </div>

    <div class="row">
        <div class="col-md-12">
            <form action="{{url('/clientes/'.$cliente->id)}}" method="post">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <h5 for="">Nombre cliente</h5>
                <input maxlength="70" required type="text" name="nombre" id="nombre" class="form-control" value="{{$cliente->nombre}}">
                <h5 for="">Calle</h5>
                <input maxlength="70" required type="text" name="calle" id="calle" class="form-control"  value="{{$cliente->calle}}">
                <h5 for="">Numero</h5>
                <input maxlength="10" required type="text" name="numero" id="numero" class="form-control"  value="{{$cliente->numero}}">
                <h5 for="">Numero interior</h5>
                <input maxlength="10" required type="text" name="interior" id="interior" class="form-control"  value="{{$cliente->interior}}">
                <h5 for="">Colonia</h5>
                <input maxlength="70" required type="text" name="colonia" id="colonia" class="form-control"  value="{{$cliente->colonia}}">
                <h5 for="">Ciudad o municipio</h5>
                <input maxlength="70" required type="text" name="ciudad" id="ciudad" class="form-control"  value="{{$cliente->ciudad}}">
                <h5 for="">Codigo postal</h5>
                <input maxlength="10" required type="text" name="cp" id="cp" class="form-control"  value="{{$cliente->cp}}">
                <h5 for="">Estado</h5>
                <input maxlength="20" required type="text" name="estado" id="estado" class="form-control"  value="{{$cliente->estado}}">
                <h5 for="">Primer contacto</h5>
                <input maxlength="50" required type="text" name="contacto1" id="contacto1" class="form-control"  value="{{$cliente->contacto1}}">
                <h5 for="">Telefono</h5>
                <input maxlength="20" required type="text" name="tel1" id="tel1" class="form-control"  value="{{$cliente->tel1}}">
                <h5 for="">Mail</h5>
                <input maxlength="50" required type="text" name="mail1" id="mail1" class="form-control"  value="{{$cliente->mail1}}">
                <h5 for="">Segundo contacto</h5>
                <input maxlength="50" required type="text" name="contacto2" id="contacto2" class="form-control" value="{{$cliente->contacto2}}">
                <h5 for="">Telefono</h5>
                <input maxlength="20" required type="text" name="tel2" id="tel2" class="form-control" value="{{$cliente->tel2}}">
                <h5 for="">Mail</h5>
                <input maxlength="50" required type="text" name="mail2" id="mail2" class="form-control" value="{{$cliente->mail2}}">
                <h5 for="">Dia Revision</h5>
                <select name="dia_revision" required id="dia_revision" class="form-control">
                    @for($j=1; $j<6; $j++)
                        @if($cliente->dia_revision == $j)
                            <option value="{{$j}}" selected>{{$dias[$j]}}</option>
                        @else
                            <option value="{{$j}}">{{$dias[$j]}}</option>
                        @endif
                    @endfor
                </select>
                <h5 for="">Dia Credito</h5>
                <select required required name="dia_credito" id="dia_credito" class="form-control">
                    @for($i=1; $i<100; $i++)
                        @if($cliente->dia_credito == $i)
                            <option value="{{$i}}" selected>{{$i}}</option>
                        @else
                            <option value="{{$i}}">{{$i}}</option>
                        @endif
                    @endfor
                </select>
                <br>
                <button type="submit" class="btn btn-info">Actualizar</button>
            </form>
        </div>
    </div>
    </div>
@endsection