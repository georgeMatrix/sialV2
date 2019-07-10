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
                            <th>EDITAR_REGISTRO</th>
                            <th>PDF</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cartaPorte as $cP)
                            <tr>
                                <td>{{$cP->id}}</td>
                                @if($cP->tipo == 'n')
                                    <td>{{$tipos[0]}}</td>
                                @elseif($cP->tipo == 'i')
                                    <td>{{$tipos[1]}}</td>
                                @elseif($cP->tipo == 'e')
                                    <td>{{$tipos[2]}}</td>
                                @elseif($cP->tipo == 'c')
                                    <td>{{$tipos[3]}}</td>
                                @endif
                                <td>{{$cP->fecha}}</td>
                                <td>{{$cP->rutaCartaP->nombre}}</td>
                                <td>{{$cP->unidadesF->economico}}</td>
                                <td>{{$cP->remolquesF->economico}}</td>
                                <td>{{$cP->operadorF->nombre_corto}}</td>
                                <td>{{$cP->referencia}}</td>
                                <td>{{$cP->fechaDeEmbarque}}</td>
                                <td>{{$cP->fechaDeEntrega}}</td>

                                @for($i=1; $i<=$cP->id; $i++)
                                    @if($ultimo[$i]->ref == $cP->id)
                                    <td>{{$ultimo[$i]->status}}</td>
                                    @endif
                                @endfor
                                @for($i=1; $i<=$cP->id; $i++)
                                    @if($ultimo[$i]->ref == $cP->id)
                                        <td>{{$ultimo[$i]->fecha}}</td>
                                    @endif
                                @endfor

                                <!--<td>
                                    <form method="post" action="{{url('/cartaPorte/'.$cP->id)}}">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" onclick="return confirm('Eliminar');" class="btn btn-danger"><i class="far fa-trash-alt"></i> Eliminar</button>
                                    </form>
                                </td>-->
                                <td>
                                    <a href="{{url('/cartaPorte/'.$cP->id.'/edit')}}" class="btn btn-primary"><i class="far fa-edit"></i> Editar</a>
                                </td>
                                <td><a href="{{url('pdf/'.$cP->id)}}" class="btn btn-secondary" >PDF</a></td>
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