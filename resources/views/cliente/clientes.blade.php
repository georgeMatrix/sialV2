@extends('layouts.app')
@section('content')
    <div class="container">
        @include('include.menu')
        <div class="card bg-dark">
            <div class="row">
                <div class="col-md-6 card-title">
                    <h3 style="font-size: 20pt;" class="mt-3 text-center text-white"><i class="fa fa-map-marked fa-lg text-danger"></i> LISTADO CLIENTES</h3>
                </div>
                <div class="col-md-3">
                    <a href="{{route('clientes.create')}}" class="mt-3 btn btn-info float-right"><i class="fas fa-user"></i> Nuevo Cliente</a>
                </div>
                <div class="col-md-3">
                    <a href="{{url('/home')}}" class="mt-3 mr-3 btn btn-info float-right"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive content-loader">
                    <table class="table table-hover table-sm table-striped">
                    <thead class="table-info">
                    <tr>
                        <th>ID</th>
                        <th width="100%">NOMBRE_CLIENTE</th>
                        <th>RAZON_SOCIAL</th>
                        <th>RFC</th>
                        <th>REGIMEN</th>
                        <th>CALLE</th>
                        <th>NUMERO</th>
                        <th>NUMERO_INTERIOR</th>
                        <th>COLONIA</th>
                        <th>CIUDAD_O_MUNICIPIO</th>
                        <th>CODIGO_POSTAL</th>
                        <th>ESTADO</th>
                        <th>PRIMER_CONTACTO</th>
                        <th>TELEFONO</th>
                        <th>MAIL</th>
                        <th>SEGUNDO_CONTACTO</th>
                        <th>TELEFONO</th>
                        <th>MAIL</th>
                        <th>DIA_DE_REVISION</th>
                        <th>DIA_DE_CREDITO</th>
                        <th>EDITAR_REGISTRO</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{$cliente->id}}</td>
                            <td>{{$cliente->nombre}}</td>
                            <td>{{$cliente->razonSocial}}</td>
                            <td>{{$cliente->rfc}}</td>
                            <td>{{$cliente->regimen}}</td>
                            <td>{{$cliente->calle}}</td>
                            <td>{{$cliente->numero}}</td>
                            <td>{{$cliente->interior}}</td>
                            <td>{{$cliente->colonia}}</td>
                            <td>{{$cliente->ciudad}}</td>
                            <td>{{$cliente->cp}}</td>
                            <td>{{$cliente->estado}}</td>
                            <td>{{$cliente->contacto1}}</td>
                            <td>{{$cliente->tel1}}</td>
                            <td>{{$cliente->mail1}}</td>
                            <td>{{$cliente->contacto2}}</td>
                            <td>{{$cliente->tel2}}</td>
                            <td>{{$cliente->mail2}}</td>
                            @for($j=1; $j<6; $j++)
                                @if($cliente->dia_revision == $j)
                                    <td>{{$dias[$j]}}</td>
                                @endif
                            @endfor
                            <td>{{$cliente->dia_credito}}</td>
                            <!--<td>
                                <form method="post" action="{{url('/clientes/'.$cliente->id)}}">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button type="submit" onclick="return confirm('Eliminar');" class="btn btn-danger"><i class="far fa-trash-alt"></i> Eliminar</button>
                                </form>
                            </td>-->
                            <td>
                                <a href="{{url('/clientes/'.$cliente->id.'/edit')}}" class="btn btn-primary"><i class="far fa-edit"></i> Editar</a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                </div>
                {{$clientes->render()}}
            </div>
        </div>
    </div>
@endsection