@extends('layouts.app')
@section('content')
    <div class="container">
        @include('include.menu')
        <div class="card bg-dark">
            <div class="row">
                <div class="col-md-6 card-title">
                    <h3 style="font-size: 20pt;" class="mt-3 text-center text-white"><i class="text-danger fa fa-box-open fa-md text-danger"></i> LISTADO PROVEEDORES</h3>
                </div>
                <div class="col-md-3">
                    <a href="{{route('provedores.create')}}" class="mt-3 btn btn-info float-right"><i class="fas fa-user"></i> Nuevo Proveedor</a>
                </div>
                <div class="col-md-3">
                    <a href="{{url('/home')}}" class="mt-3 mr-3 btn btn-info float-right"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 table-responsive content-loader" >
                <table class="table  table-hover table-sm">
                    <thead class="table-info">
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE_COMERCIAL_DEL_PROVEEDOR</th>
                        <th>RAZON_SOCIAL_DEL_PROVEEDOR</th>
                        <th>RFC</th>
                        <th>DIRECCION</th>
                        <th>CONTACTO</th>
                        <th>MAIL</th>
                        <th>DIAS_DE_CREDITO</th>
                        <th>EDITAR_REGISTRO</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($provedores as $provedor)
                        <tr>
                            <td>{{$provedor->id}}</td>
                            <td>{{$provedor->nombre}}</td>
                            <td>{{$provedor->razon_social}}</td>
                            <td>{{$provedor->rfc}}</td>
                            <td>{{$provedor->direccion}}</td>
                            <td>{{$provedor->contacto}}</td>
                            <td>{{$provedor->mail}}</td>
                            <td>{{$provedor->credito}}</td>
                            <!--<td>
                                <form method="post" action="{{url('/provedores/'.$provedor->id)}}">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button type="submit" onclick="return confirm('Eliminar');" class="btn btn-danger"><i class="far fa-trash-alt"></i> Eliminar</button>
                                </form>
                            </td>-->
                            <td>
                                <a href="{{url('/provedores/'.$provedor->id.'/edit')}}" class="btn btn-primary"><i class="far fa-edit"></i> Editar</a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                {{$provedores->render()}}
            </div>
        </div>
    </div>
@endsection