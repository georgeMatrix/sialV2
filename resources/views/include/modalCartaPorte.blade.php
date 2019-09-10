<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Generacion de Release</h5>

            </div>
            <div class="modal-body">
                <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
                <table class="table table-responsive">
                    <thead>
                        <th>RELEASE</th>
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
                        <th>STATUS</th>
                        <th>ULTIMO_STATUS</th>
                        <th>FECHA_STATUS</th>
                    </thead>
                    @foreach ($release as $rel)
                    <tr id="rows">
                        <td><input type="checkbox" class="form-control" id="release"></td>
                        @foreach($nacional as $n)
                            @if($rel->id == $n->cartaPorte)
                                <td>{{$n->id}}</td>
                            @endif
                        @endforeach
                        @foreach($importacion as $i)
                            @if($rel->id == $i->cartaPorte)
                                <td>{{$i->id}}</td>
                            @endif
                        @endforeach
                        @foreach($exportacion as $e)
                            @if($rel->id == $e->cartaPorte)
                                <td>{{$e->id}}</td>
                            @endif
                        @endforeach
                        @foreach($cruce as $c)
                            @if($rel->id == $c->cartaPorte)
                                <td>{{$c->id}}</td>
                            @endif
                        @endforeach
                        <input id="idValorRelease" type="hidden" value="{{$rel->id}}"> <!-- Con este es el que esta trabajando el archivo js de cartasPorte.js -->
                        <td>{{$rel->tipo}}</td>
                        <td>{{$rel->fecha}}</td>
                        <td>{{$rel->rutaCartaP->nombre}}</td>
                        <td>{{$rel->unidadesF->economico}}</td>
                        <td>{{$rel->remolquesF->economico}}</td>
                        <td>{{$rel->operadorF->nombre_corto}}</td>
                        <td>{{$rel->referencia}}</td>
                        <td>{{$rel->fechaDeEmbarque}}</td>
                        <td>{{$rel->fechaDeEntrega}}</td>
                        <td>{{$rel->status}}</td>
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
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="window.location.reload()">Cerrar</button>
                <button type="button" class="btn btn-primary" id="cambioRelease" onclick="cambioAbiertaToRelease()">Generar</button>
            </div>
        </div>
    </div>
</div>