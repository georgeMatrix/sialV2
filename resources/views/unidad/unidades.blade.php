@extends('layouts.app')
@section('content')
    <div class="container">
        @include('include.menu')
        <div class="card bg-dark">
            <div class="row">
                <div class="col-md-6 card-title">
                    <h3 style="font-size: 20pt;" class="mt-3 text-center text-white"><i class="fa fa-truck fa-md text-danger"></i> LISTADO UNIDADES</h3>
                </div>
                <div class="col-md-3">
                    <a href="{{route('unidades.create')}}" class="mt-3 btn btn-info float-right"><i class="fas fa-user"></i> Nueva Unidad</a>
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
                        <th>PROVEEDOR</th>
                        <th>NOMBRE_DE_LA_UNIDAD</th>
                        <th>ECONOMICO</th>
                        <th>TIPO_DE_UNIDAD</th>
                        <th>MARCA</th>
                        <th>MODELO</th>
                        <th>PLACAS</th>
                        <th>NUMERO_DE_SERIE_DE_CHASIS</th>
                        <th>NUMERO_DE_SERIE_DE_MOTOR</th>
                        <th>VENCIMIENTO_DE_POLIZA_DE_SEGURO</th>
                        <th>VENCIMIENTO_DE_VERIFICACION</th>
                        <th>VENCIMIENTO_DE_FISICO_MECANICA</th>
                        <th>OBSERVACIONES</th>
                        <th>ELIMINAR_REGISTRO</th>
                        <th>ACTUALIZAR_REGISTRO</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($unidades as $unidad)
                        <tr>
                            <td>{{$unidad->id}}</td>
                            @foreach($provedores as $provedor)
                                @if($provedor->id == $unidad->provedor)
                                    <td>{{$provedor->nombre}}</td>
                                @endif
                            @endforeach
                            <td>{{$unidad->nombre}}</td>
                            <td>{{$unidad->economico}}</td>
                            @for($j=1; $j<3; $j++)
                                @if($unidad->tipo == $j)
                                    <td value="{{$j}}" selected>{{$camiones[$j]}}</td>
                                @endif
                            @endfor
                            <td>{{$unidad->marca}}</td>
                            <td>{{$unidad->modelo}}</td>
                            <td>{{$unidad->placas}}</td>
                            <td>{{$unidad->serie}}</td>
                            <td>{{$unidad->motor}}</td>
                            <td>{{$unidad->seguro}}</td>
                            <td>{{$unidad->verificacion}}</td>
                            <td>{{$unidad->fm}}</td>
                            <td>{{$unidad->obs}}</td>
                            <td>
                                <form method="post" action="{{url('/unidades/'.$unidad->id)}}">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button type="submit" onclick="return confirm('Eliminar');" class="btn btn-danger"><i class="far fa-trash-alt"></i> Eliminar</button>
                                </form>
                            </td>
                            <td>
                                <a href="{{url('/unidades/'.$unidad->id.'/edit')}}" class="btn btn-primary"><i class="far fa-edit"></i>Editar</a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                </div>
                {{$unidades->render()}}
            </div>
        </div>
    </div>
@endsection