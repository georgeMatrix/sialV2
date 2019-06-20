@extends('layouts.app')
@section('content')
    <div class="container">
        @include('include.menu')
        <div class="card bg-dark">
            <div class="row">
                <div class="col-md-6 card-title">
                    <h3 style="font-size: 20pt;" class="mt-3 text-center text-white"><i class="fa fa-file-alt fa-lg text-danger"></i> LISTADO CARTA PORTE</h3>
                </div>
                <div class="col-md-3">
                    <a href="{{route('cartaPorte.create')}}" class="mt-3 btn btn-info float-right"><i class="fa fa-file-alt fa-lg"></i> Nueva Carta Porte</a>
                </div>
                <div class="col-md-3">
                    <a href="{{url('/home')}}" class="mt-3 mr-3 btn btn-info float-right"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover table-sm table-striped">
                        <thead class="table-info">
                        <tr>
                            <th>ID</th>
                            <th>TIPO</th>
                            <th>FECHA</th>
                            <th>RUTA</th>
                            <th>UNIDAD</th>
                            <th>REMOLQUE</th>
                            <th>OPERADOR</th>
                            <th>REFERENCIA</th>
                            <th>FECHA_EMBARQUE</th>
                            <th>FECHA_ENTREGA</th>
                            <th>ULTIMO_STATUS</th>
                            <th>FECHA_STATUS</th>
                            <th>ELIMINAR_REGISTRO</th>
                            <th>EDITAR_REGISTRO</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cartaPorte as $cP)
                            <tr>
                                <td>{{$cP->id}}</td>
                                @foreach($tipos as $tipo)
                                    @for($i=0; $i<5; $i++)
                                        @if($cP->tipo == $tipo[$i])
                                            <td>{{$tipo}}</td>
                                        @endif
                                    @endfor
                                @endforeach
                                <td>{{$cP->fecha}}</td>
                                <td>{{$cP->rutaCartaP->nombre}}</td>
                                <td>{{$cP->unidadesF->nombre}}</td>
                                <td>{{$cP->remolques}}</td>
                                <td>{{$cP->operadorF->nombre_corto}}</td>
                                <td>{{$cP->referencia}}</td>
                                <td>{{$cP->fechaDeEmbarque}}</td>
                                <td>{{$cP->fechaDeEntrega}}</td>
                                <td>{{$cP->ultimoStatus}}</td>
                                <td>{{$cP->fechaStatus}}</td>

                                <td>
                                    <form method="post" action="{{url('/cartaPorte/'.$cP->id)}}">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" onclick="return confirm('Eliminar');" class="btn btn-danger"><i class="far fa-trash-alt"></i> Eliminar</button>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{url('/cartaPorte/'.$cP->id.'/edit')}}" class="btn btn-primary"><i class="far fa-edit"></i> Editar</a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
                {{$cartaPorte->render()}}

            </div>
        </div>
    </div>
@endsection