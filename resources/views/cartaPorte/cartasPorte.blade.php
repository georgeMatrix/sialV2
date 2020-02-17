@extends('layouts.app')
@section('content')
    <div class="container">
        @include('include.menu')
        <div class="card bg-dark">
            <div class="row">
                <div class="col-md-4 card-title">
                    <h3 style="font-size: 20pt;" class="mt-3 text-center text-white"><i class="fa fa-file-alt fa-lg text-danger"></i> LISTADO CARTA PORTE</h3>
                </div>
                <div class="col-md-2">
                    <a href="#" class="mt-3 btn btn-info float-right"><i class="fas fa-folder-open"></i> Evidencias</a>
                </div>
                <div class="col-md-2">
                <button type="button" class="mt-3 btn btn-info float-right" @if(count($release) == 0) disabled @endIf data-toggle="modal" data-target="#exampleModal"><i class="fas fa-file-signature"></i>
                    Release
                </button>
                </div>
                <div class="col-md-2">
                    <a href="{{route('cartaPorte.create')}}" class="mt-3 btn btn-info float-right"><i class="fa fa-file-alt"></i> Nueva</a>
                </div>
                <div class="col-md-2">
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
                            <th>CARTA_PORTE</th>
                            <th>TIPO</th>
                            <th>FECHA</th>
                            <th>RUTA</th>
                            <th>UNIDAD</th>
                            <th>REMOLQUE</th>
                            <th>OPERADOR</th>
                            <th>REFERENCIA</th>
                            <th>FECHA_EMBARQUE</th>
                            <th>FECHA_ENTREGA</th>
                            <th>STATUS</th>
                            <th>ULTIMO_STATUS</th>
                            <th>FECHA_STATUS</th>
                            <th>EDITAR_REGISTRO</th>
                            <th>CARTA_PORTE</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($cartaPorte as $cP)
                            <tr>
                                @foreach($nacional as $n)
                                    @if($cP->id == $n->cartaPorte)
                                        <td>{{$n->id}}</td>
                                    @endif
                                @endforeach
                                @foreach($importacion as $i)
                                    @if($cP->id == $i->cartaPorte)
                                        <td>{{$i->id}}</td>
                                    @endif
                                @endforeach
                                @foreach($exportacion as $e)
                                    @if($cP->id == $e->cartaPorte)
                                        <td>{{$e->id}}</td>
                                    @endif
                                @endforeach
                                @foreach($cruce as $c)
                                    @if($cP->id == $c->cartaPorte)
                                        <td>{{$c->id}}</td>
                                    @endif
                                @endforeach


                                @if($cP->tipo == 'N')
                                    <td>{{$tipos[0]}}</td>
                                @elseif($cP->tipo == 'I')
                                    <td>{{$tipos[1]}}</td>
                                @elseif($cP->tipo == 'E')
                                    <td>{{$tipos[2]}}</td>
                                @elseif($cP->tipo == 'C')
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
                                <td>{{$cP->status}}</td>
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
                                    {{--<td><a href="{{url('pdf/'.$cP->id)}}" class="btn btn-secondary" >PDF</a></td>--}}
                                    <td><a href="{{url('excel/'.$cP->id)}}" class="btn btn-secondary" >Carta Porte</a></td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
                {{$cartaPorte->render()}}
                @include('include.modalCartaPorte')
            </div>
        </div>
    </div>
    <script src="{{asset('js/cartaPorte/cartasPorte.js')}}"></script>
@endsection
