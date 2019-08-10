@extends('layouts.app')
@section('content')
    <div class="container">
        @include('include.menu')
        <div class="card bg-dark">
            <div class="row">
                <div class="col-md-6 card-title">
                    <h3 class="text-center text-white"><i class="text-danger mt-3 fa fa-id-card fa-md"></i> LISTADO OPERADORES</h3>
                </div>
                <div class="col-md-3">
                    <a href="{{route('operadores.create')}}" class="mt-3 btn btn-info float-right"><i class="fa fa-id-card fa-lg"></i> Nuevo Operador</a>
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
                        <th>NOMBRES</th>
                        <th>NOMBRE_CORTO</th>
                        <th>NUMERO_DE_LICENCIA</th>
                        <th>VIGENCIA_LICENCIA</th>
                        <th>VIGENCIA_DE_EXAMEN_MEDICO</th>
                        <th>TELEFONO_DE_CASA</th>
                        <th>PERSONA_DE_CONTACTO</th>
                        <th>CELULAR</th>
                        <th>IMSS</th>
                        <th>RFC</th>
                        <th>OBSERVACIONES</th>
                        <th>EDITAR_REGISTRO</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($operadores as $operador)
                        <tr>
                            <td>{{$operador->id}}</td>
                            <td>{{$operador->apellido_paterno}}</td>
                            <td>{{$operador->apellido_materno}}</td>
                            <td>{{$operador->nombres}}</td>
                            <td>{{$operador->nombre_corto}}</td>
                            <td>{{$operador->licencia}}</td>
                            <td>{{$operador->vigencia_licencia}}</td>
                            <td>{{$operador->vigencia_medico}}</td>
                            <td>{{$operador->telefonoCasa}}</td>
                            <td>{{$operador->personaContacto}}</td>
                            <td>{{$operador->celular}}</td>
                            <td>{{$operador->imss}}</td>
                            <td>{{$operador->rfc}}</td>
                            <td>{{$operador->obs}}</td>
                            <!--<td>
                                <form method="post" action="{{url('/operadores/'.$operador->id)}}">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button type="submit" onclick="return confirm('Eliminar');" class="btn btn-danger"><i class="far fa-trash-alt"></i> Eliminar</button>
                                </form>
                            </td>-->
                            <td>
                                <a href="{{url('/operadores/'.$operador->id.'/edit')}}" class="btn btn-primary"><i class="far fa-edit"></i> Editar</a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                </div>
                {{$operadores->render()}}
            </div>
        </div>
    </div>
@endsection