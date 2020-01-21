@extends('layouts.app')
@section('content')
    <div class="container">
        @include('include.menu')
        <div class="card bg-dark">
            <div class="row">
                <div class="col-md-6 card-title">
                    <h3 style="font-size: 20pt;" class="mt-3 text-center text-white"><i class="fa fa-user-circle fa-md text-danger"></i> LISTADO USUARIOS</h3>
                </div>
                <div class="col-md-3">
                    <a href="{{route('usuarios.create')}}" class="mt-3 btn btn-info float-right"><i class="fas fa-user"></i> Nuevo Usuario</a>
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
                        <th>APELLIDO_PATERNO</th>
                        <th>APELLIDO_MATERNO</th>
                        <th>NOMBRE</th>
                        {{--<th>PASSWORD</th>--}}
                        <th>NOMBRE_CORTO</th>
                        <th>CARGO_DEL_USUARIO</th>
                        <th>AREA</th>
                        <th>CATALOGOS</th>
                        <th>RUTAS</th>
                        <th>CARTA_PORTE</th>
                        <th>FACTURACION</th>
                        <th>USUARIOS</th>
                        <th>MODULO_06</th>
                        <th>MODULO_07</th>
                        <th>MODULO_08</th>
                        <th>MODULO_09</th>
                        <th>ADMINISTRADOR</th>
                        {{--<th>ELIMINAR_REGISTRO</th>--}}
                        <th>ACTUALIZAR_REGISTRO</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{$usuario->id}}</td>
                            <td>{{$usuario->apellidoPaterno}}</td>
                            <td>{{$usuario->apellidoMaterno}}</td>
                            <td>{{$usuario->nombre}}</td>
                            <td>{{$usuario->nombreCorto}}</td>
                            <td>{{$usuario->cargo}}</td>
                            <td>{{$usuario->area}}</td>
                            <td>{{$usuario->modulo01}}</td>
                            <td>{{$usuario->modulo02}}</td>
                            <td>{{$usuario->modulo03}}</td>
                            <td>{{$usuario->modulo04}}</td>
                            <td>{{$usuario->modulo05}}</td>
                            <td>{{$usuario->modulo06}}</td>
                            <td>{{$usuario->modulo07}}</td>
                            <td>{{$usuario->modulo08}}</td>
                            <td>{{$usuario->modulo09}}</td>
                            <td>{{$usuario->modulo10}}</td>
                            {{--<td>--}}
                                {{--<form method="post" action="{{url('/usuarios/'.$usuario->id)}}">--}}
                                    {{--{{csrf_field()}}--}}
                                    {{--{{method_field('DELETE')}}--}}
                                    {{--<button type="submit" onclick="return confirm('Eliminar');" class="btn btn-danger"><i class="far fa-trash-alt"></i> Eliminar</button>--}}
                                {{--</form>--}}
                            {{--</td>--}}
                            <td>
                                <a href="{{url('/usuarios/'.$usuario->id.'/edit')}}" class="btn btn-primary"><i class="far fa-edit"></i> Editar</a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                </div>
                {{$usuarios->render()}}
            </div>
        </div>
    </div>
@endsection