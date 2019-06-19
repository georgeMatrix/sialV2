@extends('layouts.app')
@section('content')
    <div class="container">
        @include('include.menu')
        <div class="card bg-dark">
            <div class="row">
                <div class="col-md-9 card-title">
                    <h3 style="font-size: 20pt;" class="mt-3 text-center text-white"><i class="fa fa-map-marked fa-md text-danger"></i> NUEVA RUTA</h3>
                </div>
                <div class="col-md-3">
                    <a href="{{route('rutas.index')}}" class="mt-3 mr-3 btn btn-info float-right"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#tab1" class="nav-link active" aria-controls="tab1" role="tab" data-toggle="tab">Rutas</a>
                        </li>
                        <li class="nav-item">
                            <a href="#tab2" class="nav-link" aria-controls="tab2" role="tab" data-toggle="tab">Datos Facturacion</a>
                        </li>
                        <li class="nav-item">
                            <a href="#tab3" class="nav-link" aria-controls="tab3" role="tab" data-toggle="tab">Datos Cuenta Por Pagar</a>
                        </li>

                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="tab1">
                            <form action="{{route('rutas.store')}}" method="post" id="rutasForm">

                                <!-- ======DATOS PARA ACTIVIDAD====== -->
                                <input type="hidden" value="{{now()}}" name="fecha" id="fecha">
                                @if(empty($actividad->ref->id))
                                    <input type="hidden" value="1" name="ref" id="ref">
                                @else
                                    <input type="hidden" value="{{$actividad->ref->id+1}}" name="ref" id="ref">
                                @endif
                                <input type="hidden" name="token" id="tokenFormRutas" value="{{csrf_token()}}">
                                <input type="hidden" name="token" id="tokenActividad" value="{{csrf_token()}}">

                                <input type="hidden" name="tabla" id="tabla" value="{{$actividad->tabla}}">

                                <input type="hidden" name="status" id="status" value="{{$actividad->status}}">

                                <input type="hidden" name="descripcion" id="descripcion" value="{{$actividad->descripcion}}">

                                <input type="hidden" name="usuario" id="usuario" value="{{$actividad->usuario}}">
                                <!-- ======DATOS PARA ACTIVIDAD====== -->

                                <div class="form-group">
                                    <h5 for="">Nombre de ruta</h5>
                                    <input maxlength="20" required type="text" name="nombre" id="nombre" class="form-control">
                                </div>

                                <div class="form-group">
                                    <h5 for="">Clientes</h5>
                                    <select name="clientes" required id="clientes" class="form-control">
                                        @foreach($clientes as $cliente)
                                            <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <h5 for="">Lugar de expedicion</h5>
                                    <input maxlength="50" required type="text" name="lugar_exp" id="lugar_exp" class="form-control">
                                </div>

                                <div class="form-group">
                                    <h5 for="">Origen</h5>
                                    <input maxlength="50" required type="text" name="origen" id="origen" class="form-control">
                                </div>

                                <div class="form-group">
                                    <h5 for="">Remitente</h5>
                                    <input maxlength="50" required type="text" name="remitente" id="remitente" class="form-control">
                                </div>

                                <div class="form-group">
                                    <h5 for="">Domicilio del remitente</h5>
                                    <input maxlength="50" required type="text" name="dom_remitente" id="dom_remitente" class="form-control">
                                </div>

                                <div class="form-group">
                                    <h5 for="">Se recoge en</h5>
                                    <input maxlength="50" required type="text" name="recoge" id="recoge" class="form-control">
                                </div>

                                <div class="form-group">
                                    <h5 for="">Valor declarado</h5>
                                    <input maxlength="50" required type="text" name="valor_declarado" id="valor_declarado" class="form-control">
                                </div>

                                <div class="form-group">
                                    <h5 for="">Destino</h5>
                                    <input maxlength="50" required type="text" name="destino" id="destino" class="form-control">
                                </div>

                                <div class="form-group">
                                    <h5 for="">Destinatario</h5>
                                    <input maxlength="50" required type="text" name="destinatario" id="destinatario" class="form-control">
                                </div>

                                <div class="form-group">
                                    <h5 for="">Domicilio del destinatario</h5>
                                    <input maxlength="50" required type="text" name="dom_destinatario" id="dom_destinatario" class="form-control">
                                </div>

                                <div class="form-group">
                                    <h5 for="">Se entrega en</h5>
                                    <input maxlength="50" required type="text" name="entrega" id="entrega" class="form-control">
                                </div>

                                <div class="form-group">
                                    <h5 for="">Fecha estimada de entrega</h5>
                                    <input maxlength="50" required type="text" name="fecha_entrega" id="fecha_entrega" class="form-control">
                                </div>

                                <div class="form-group">
                                    <h5 for="">Cantidad</h5>
                                    <input maxlength="50" required type="text" name="cantidad" id="cantidad" class="form-control">
                                </div>

                                <div class="form-group">
                                    <h5 for="">Embalaje</h5>
                                    <input maxlength="50" required type="text" name="embalaje" id="embalaje" class="form-control">
                                </div>

                                <div class="form-group">
                                    <h5 for="">Concepto</h5>
                                    <input maxlength="50" required type="text" name="concepto" id="concepto" class="form-control">
                                </div>

                                <div class="form-group">
                                    <h5 for="">Material peligroso</h5>
                                    <input maxlength="50" required type="text" name="material_peligroso" id="material_peligroso" class="form-control">
                                </div>

                                <div class="form-group">
                                    <h5 for="">Indemnizacion</h5>
                                    <input maxlength="50" required type="text" name="indemnizacion" id="indemnizacion" class="form-control">
                                </div>

                                <div class="form-group">
                                    <h5 for="">Importe</h5>
                                    <input required type="number" min="0" name="importe" id="importe" class="form-control">
                                </div>

                                <div class="form-group">
                                <h5 for="">Asignacion de precio</h5>
                                <select name="asignacion_precio" required id="asignacion_precio" class="form-control">
                                    @foreach($provedores as $provedor)
                                        <option value="{{$provedor->id}}" selected>{{$provedor->nombre}}</option>
                                    @endforeach
                                </select>
                                </div>

                                <div class="form-group">
                                    <h5 for="">Observaciones</h5>
                                    <input maxlength="50" required type="text" name="obs" id="obs" class="form-control">
                                </div>

                                <div class="form-group">
                                    <h5 for="">dias para recuperacion de evidencias</h5>
                                    <select name="dias_re" required id="dias_re" class="form-control">
                                        @for($j=1; $j<11; $j++)
                                            <option value="{{$j}}">{{$j}}</option>
                                        @endfor
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-info" id="guardarRutasBtn">Guardar</button>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tab2">
                            <form action="{{route('datosFacturacions.store')}}" method="post" id="dFacturacionForm">
                                <!-- ======DATOS PARA ACTIVIDAD====== -->
                                <input type="hidden" value="{{now()}}" name="fecha" id="fechaDfacturacion">
                                @if(empty($actividadDatosFacturacion->ref->id))
                                    <input type="hidden" value="1" name="ref" id="refDfacturacion">
                                @else
                                    <input type="hidden" value="{{$actividadDatosFacturacion->ref->id+1}}" name="ref" id="refDfacturacion">
                                @endif
                                <input type="hidden" name="token" id="tokenDfacturacionActividad" value="{{csrf_token()}}">

                                <input type="hidden" name="tabla" id="tablaDfacturacion" value="{{$actividadDatosFacturacion->tabla}}">

                                <input type="hidden" name="status" id="statusDfacturacion" value="{{$actividadDatosFacturacion->status}}">

                                <input type="hidden" name="descripcion" id="descripcionDfacturacion" value="{{$actividadDatosFacturacion->descripcion}}">

                                <input type="hidden" name="usuario" id="usuarioDfacturacion" value="{{$actividadDatosFacturacion->usuario}}">
                                <!-- ======DATOS PARA ACTIVIDAD====== -->
                                <input type="hidden" name="token" id="tokenFormDfacturacion" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <h5 for="">Rutas</h5>
                                    <select name="rutas" required id="rutasSelect" class="form-control">
                                        @foreach($rutas as $ruta)
                                            <option value="{{$ruta->id}}">{{$ruta->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <h5 for="">Razon social que factura</h5>
                                    <input required type="number" min="0" name="facturador" id="facturador" class="form-control {{$errors->has('facturador')?'is-invalid':''}}"
                                           value="{{old('facturador')}}">
                                    <div class="invalid-feedback">
                                        El campo lugar_exp es requerido
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5 for="">Asignacion de precio</h5>
                                    <select name="asignacionPrecio" required id="asignacionPrecio" class="form-control">
                                        @foreach($provedores as $provedor)
                                            <option value="{{$provedor->id}}">{{$provedor->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <h5 for="">Clave de Prod o Servicio</h5>
                                    <input maxlength="20" type="text" required name="claveProdServ" id="claveProdServ" class="form-control {{$errors->has('claveProdServ')?'is-invalid':''}}"
                                           value="{{old('claveProdServ')}}">
                                    <div class="invalid-feedback">
                                        El campo claveProdServ es requerido
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5 for="">Numero de Identificacion</h5>
                                    <input maxlength="20" type="text" required name="noIdentificacion" id="noIdentificacion" class="form-control {{$errors->has('noIdentificacion')?'is-invalid':''}}"
                                           value="{{old('noIdentificacion')}}">
                                    <div class="invalid-feedback">
                                        El campo noIdentificacion es requerido
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5 for="">Cantidad</h5>
                                    <input type="number" min="0" required name="cantidad" id="cantidadDfacturacion" class="form-control {{$errors->has('cantidadDatosFacturacion')?'is-invalid':''}}"
                                           value="{{old('cantidadDatosFacturacion')}}">
                                    <div class="invalid-feedback">
                                        El campo cantidad es requerido y debe de ser numerico
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5 for="">Clave Unidad</h5>
                                    <input maxlength="20" type="text" required name="claveUnidad" id="claveUnidad" class="form-control {{$errors->has('claveUnidad')?'is-invalid':''}}"
                                           value="{{old('claveUnidad')}}">
                                    <div class="invalid-feedback">
                                        La campo claveUnidad es requerido
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5 for="">Unidad</h5>
                                    <input maxlength="20" type="text" required name="unidad" id="unidad" class="form-control {{$errors->has('unidad')?'is-invalid':''}}"
                                           value="{{old('unidad')}}">
                                    <div class="invalid-feedback">
                                        La campo unidad es requerido
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5 for="">Descripcion</h5>
                                    <input maxlength="50" type="text" required name="descripcion" id="descripcion" class="form-control {{$errors->has('descripcion')?'is-invalid':''}}"
                                           value="{{old('descripcion')}}">
                                    <div class="invalid-feedback">
                                        El campo descripcion es requerido
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5 for="">Valor Unitario</h5>
                                    <input type="number" min="0" required name="valorUnitario" id="valorUnitario" class="form-control {{$errors->has('valorUnitario')?'is-invalid':''}}"
                                           value="{{old('valorUnitario')}}">
                                    <div class="invalid-feedback">
                                        El campo valorUnitario es requerido
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5 for="">Importe</h5>
                                    <input type="number" min="0" required name="importeF" id="importeF" class="form-control {{$errors->has('importe')?'is-invalid':''}}"
                                           value="{{old('importe')}}">
                                    <div class="invalid-feedback">
                                        El campo importe es requerido y debe de ser numerico
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5 for="">Traslado de Iva (Porcentaje)</h5>
                                    <input type="number" min="0" required name="tIva" id="tIva" class="form-control {{$errors->has('tIva')?'is-invalid':''}}"
                                           value="{{old('tIva')}}">
                                    <div class="invalid-feedback">
                                        El campo tIva es requerido y debe de ser numerico
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5 for="">Traslado de Isr (Porcentaje)</h5>
                                    <input type="number" min="0" required name="tIsr" id="tIsr" class="form-control {{$errors->has('tIsr')?'is-invalid':''}}"
                                           value="{{old('tIsr')}}">
                                    <div class="invalid-feedback">
                                        El campo tIsr es requerido y debe de ser numerico
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5 for="">Retencion de Iva (Porcentaje)</h5>
                                    <input type="number" min="0" required name="rIva" id="rIva" class="form-control {{$errors->has('rIva')?'is-invalid':''}}"
                                           value="{{old('rIva')}}">
                                    <div class="invalid-feedback">
                                        El campo rIva es requerido y debe de ser numerico
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5 for="">Retencion de Isr (Porcentaje)</h5>
                                    <input type="number" min="0" required name="rIsr" id="rIsr" class="form-control {{$errors->has('rIsr')?'is-invalid':''}}"
                                           value="{{old('rIsr')}}">
                                    <div class="invalid-feedback">
                                        El campo rIsr es requerido y debe de ser numerico
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary" id="guardarDfacturacionBtn">Guardar</button>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tab3">
                            <form action="{{route('datosCporPagar.store')}}" id="datosCxP">
                                <!-- ======DATOS PARA ACTIVIDAD====== -->
                                <input type="hidden" value="{{now()}}" name="fecha" id="fechaDCxP">
                                @if(empty($actividadDCxP->ref->id))
                                    <input type="hidden" value="1" name="ref" id="refDCxP">
                                @else
                                    <input type="hidden" value="{{$actividadDCxP->ref->id+1}}" name="ref" id="refDCxP">
                                @endif
                                <input type="hidden" name="token" id="tokenDCxP" value="{{csrf_token()}}">

                                <input type="hidden" name="tabla" id="tablaDCxP" value="{{$actividadDCxP->tabla}}">

                                <input type="hidden" name="status" id="statusDCxP" value="{{$actividadDCxP->status}}">

                                <input type="hidden" name="descripcion" id="descripcionDCxP" value="{{$actividadDCxP->descripcion}}">

                                <input type="hidden" name="usuario" id="usuarioDCxP" value="{{$actividadDCxP->usuario}}">
                                <!-- ======DATOS PARA ACTIVIDAD====== -->
                                <input type="hidden" name="token" id="tokenFormDatosCxP" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <h5 for="">Rutas</h5>
                                    <select name="rutas" required id="rutasCxP" class="form-control">
                                        @foreach($rutas as $ruta)
                                            <option value="{{$ruta->id}}">{{$ruta->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <h5 for="">Concepto</h5>
                                    <select required name="concepto" id="conceptoCxP" class="form-control">
                                        <option value="1">Flete</option>
                                        <option value="2">Maniobras</option>
                                        <option value="3">Estadias</option>
                                        <option value="4">Cruce</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <h5 for="">Asignacion de precio</h5>
                                    <select name="asignacionPrecio" required id="asignacionPrecioCxP" class="form-control">
                                        @foreach($provedores as $provedor)
                                            <option value="{{$provedor->id}}">{{$provedor->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <h5 for="">Clave de Prod o Servicio</h5>
                                    <input maxlength="20" type="text" required name="claveProdServ" id="claveProdServCxP" class="form-control {{$errors->has('claveProdServ')?'is-invalid':''}}"
                                           value="{{old('claveProdServ')}}">
                                    <div class="invalid-feedback">
                                        El campo claveProdServ es requerido
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5 for="">Numero de identificacion</h5>
                                    <input maxlength="20" type="text" required name="noIdentificacion" id="noIdentificacionCxP" class="form-control {{$errors->has('noIdentificacion')?'is-invalid':''}}"
                                           value="{{old('noIdentificacion')}}">
                                    <div class="invalid-feedback">
                                        El campo noIdentificacion es requerido
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5 for="">Cantidad</h5>
                                    <input type="number" required name="cantidad" id="cantidadCxP" class="form-control {{$errors->has('cantidad')?'is-invalid':''}}"
                                           value="{{old('cantidad')}}">
                                    <div class="invalid-feedback">
                                        El campo cantidad es requerido
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5 for="">Clave unidad</h5>
                                    <input maxlength="20" type="text" required name="claveUnidad" id="claveUnidadCxP" class="form-control {{$errors->has('claveUnidad')?'is-invalid':''}}"
                                           value="{{old('claveUnidad')}}">
                                    <div class="invalid-feedback">
                                        El campo claveUnidad es requerido
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5 for="">Unidad</h5>
                                    <input maxlength="20" type="text" required name="unidad" id="unidadCxP" class="form-control {{$errors->has('unidad')?'is-invalid':''}}"
                                           value="{{old('unidad')}}">
                                    <div class="invalid-feedback">
                                        El campo unidad es requerido
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5 for="">Descripcion</h5>
                                    <input maxlength="50" type="string" required name="descripcion" id="descripcionCxP" class="form-control {{$errors->has('descripcion')?'is-invalid':''}}"
                                           value="{{old('descripcion')}}">
                                    <div class="invalid-feedback">
                                        El campo descripcion es requerido
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5 for="">Valor Unitario</h5>
                                    <input type="number" required name="valorUnitario" id="valorUnitarioCxP" class="form-control {{$errors->has('valorUnitario')?'is-invalid':''}}"
                                           value="{{old('valorUnitario')}}">
                                    <div class="invalid-feedback">
                                        El campo valorUnitario es requerido
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5 for="">Importe</h5>
                                    <input type="number" required name="importe" id="importeCxP" class="form-control {{$errors->has('importe')?'is-invalid':''}}"
                                           value="{{old('importe')}}">
                                    <div class="invalid-feedback">
                                        El campo importe es requerido
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5 for="">tiva</h5>
                                    <input type="number" required name="tiva" id="tivaCxP" class="form-control {{$errors->has('tiva')?'is-invalid':''}}"
                                           value="{{old('tiva')}}">
                                    <div class="invalid-feedback">
                                        El campo tiva es requerido
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5 for="">tisr</h5>
                                    <input type="number" required name="tisr" id="tisrCxP" class="form-control {{$errors->has('tisr')?'is-invalid':''}}"
                                           value="{{old('tisr')}}">
                                    <div class="invalid-feedback">
                                        El campo tisr es requerido
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5 for="">riva</h5>
                                    <input type="number" required name="riva" id="rivaCxP" class="form-control {{$errors->has('riva')?'is-invalid':''}}"
                                           value="{{old('riva')}}">
                                    <div class="invalid-feedback">
                                        El campo riva es requerido
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5 for="">risr</h5>
                                    <input type="number" required name="risr" id="risrCxP" class="form-control {{$errors->has('risr')?'is-invalid':''}}"
                                           value="{{old('risr')}}">
                                    <div class="invalid-feedback">
                                        El campo risr es requerido
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary" id="guardarDxP">Guardar</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        $("#rutasForm").submit(function(e){
            e.preventDefault();
            var clientes = $('#clientes').val();
            var nombre = $('#nombre').val();
            var lugar_exp = $('#lugar_exp').val();
            var origen = $('#origen').val();
            var remitente = $('#remitente').val();
            var dom_remitente = $('#dom_remitente').val();
            var recoge = $('#recoge').val();
            var valor_declarado = $('#valor_declarado').val();
            var destino = $('#destino').val();
            var destinatario = $('#destinatario').val();
            var dom_destinatario = $('#dom_destinatario').val();
            var entrega = $('#entrega').val();
            var fecha_entrega = $('#fecha_entrega').val();
            var cantidad = $('#cantidad').val();
            var embalaje = $('#embalaje').val();
            var concepto = $('#concepto').val();
            var material_peligroso = $('#material_peligroso').val();
            var indemnizacion = $('#indemnizacion').val();
            var importe = $('#importe').val();
            var asignacion_precio = $('#asignacion_precio').val();
            var obs = $('#obs').val();
            var dias_re = $('#dias_re').val();

            /*=====DATOS DE ACTIVIDAD======*/
            var fecha = $('#fecha').val();
            var ref = $('#ref').val();
            var tabla = $('#tabla').val();
            var status = $('#status').val();
            var descripcion = $('#descripcion').val();
            var usuario = $('#usuario').val();
            /*=====DATOS DE ACTIVIDAD======*/

            var token = $('#tokenFormRutas').val();
            var tokenActividad = $('#tokenActividad').val();
            var request = {
                clientes:clientes,
                nombre:nombre,
                lugar_exp:lugar_exp,
                origen:origen,
                remitente:remitente,
                dom_remitente:dom_remitente,
                recoge:recoge,
                valor_declarado:valor_declarado,
                destino:destino,
                destinatario:destinatario,
                dom_destinatario:dom_destinatario,
                entrega:entrega,
                fecha_entrega:fecha_entrega,
                cantidad:cantidad,
                embalaje:embalaje,
                concepto:concepto,
                material_peligroso:material_peligroso,
                indemnizacion:indemnizacion,
                importe:importe,
                asignacion_precio:asignacion_precio,
                obs:obs,
                dias_re:dias_re,
            };

            var requestActividad = {
                fecha:fecha,
                ref:ref,
                tabla:tabla,
                status:status,
                descripcion:descripcion,
                usuario:usuario
            };

            $.ajax({
                url: "{{URL::route('actividad.store')}}",
                type: 'POST',
                headers: {'X-CSRF-TOKEN':tokenActividad},
                contentType: 'application/json',
                data: JSON.stringify(requestActividad),
            })
                .done(function() {
                    console.log("success");
                })
                .fail(function() {
                    console.log("error");
                })

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                headers: {'X-CSRF-TOKEN':token},
                contentType: 'application/json',
                data: JSON.stringify(request),
            })
                .done(function() {
                    console.log("success");
                    alert("Dato Guardado")

                    $.get('/api/uno', function (data) {
                        var html_select = '';
                        for (var i=0; i<data.length; i++){
                            html_select += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
                        }
                        $("#rutasSelect").html(html_select)

                    });

                    $.get('/api/uno', function (data) {
                        var html_select = '';
                        for (var i=0; i<data.length; i++){
                            html_select += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
                        }
                        $("#rutasCxP").html(html_select)
                    })

                    $("#nombre").val("");
                    $('#clientes').prop('selectedIndex',0);
                    $('#asignacion_precio').prop('selectedIndex',0);
                    $('#dias_re').prop('selectedIndex',0);
                    $("#facturador").val("");
                    $("#lugar_exp").val("");
                    $("#origen").val("");
                    $("#remitente").val("");
                    $("#dom_remitente").val("");
                    $("#recoge").val("");
                    $("#valor_declarado").val("");
                    $("#destino").val("");
                    $("#destinatario").val("");
                    $("#dom_destinatario").val("");
                    $("#entrega").val("");
                    $("#fecha_entrega").val("");
                    $("#cantidad").val("");
                    $("#embalaje").val("");
                    $("#concepto").val("");
                    $("#material_peligroso").val("");
                    $("#indemnizacion").val("");
                    $("#importe").val("");
                    $("#obs").val("");

                })
                .fail( function( jqXHR, textStatus, errorThrown ) {

                    if (jqXHR.status === 0) {

                        console.log('Not connect: Verify Network.');

                    } else if (jqXHR.status == 404) {

                        console.log('Requested page not found [404]');

                    } else if (jqXHR.status == 500) {

                        console.log('Internal Server Error [500].');

                    } else if (textStatus === 'parsererror') {

                        console.log('Requested JSON parse failed.');

                    } else if (textStatus === 'timeout') {

                        console.log('Time out error.');

                    } else if (textStatus === 'abort') {

                        console.log('Ajax request aborted.');

                    } else {

                        console.log('Uncaught Error: ' + jqXHR.responseText);

                    }

                });

        });

        $("#dFacturacionForm").submit(function(e){
            e.preventDefault();
            var rutas = $("#rutasSelect").val();
            var facturador = $('#facturador').val();
            var asignacionPrecio = $("#asignacionPrecio").val();
            var claveProdServ = $("#claveProdServ").val();
            var noIdentificacion = $("#noIdentificacion").val();
            var cantidad = $("#cantidadDfacturacion").val();
            var claveUnidad = $("#claveUnidad").val();
            var unidad = $("#unidad").val();
            var descripcion = $("#descripcion").val();
            var valorUnitario = $("#valorUnitario").val();
            var importe = $("#importeF").val();
            var tIva = $("#tIva").val();
            var tIsr = $("#tIsr").val();
            var rIva = $("#rIva").val();
            var rIsr = $("#rIsr").val();
            var token = $('#tokenFormDfacturacion').val();

            var tokenActividadDfacturacion = $('#tokenDfacturacionActividad').val();

            /*=====DATOS DE ACTIVIDAD======*/
            var fechaDfacturacion = $("#fechaDfacturacion").val();
            var refDfacturacion = $("#refDfacturacion").val();
            var tablaDfacturacion = $("#tablaDfacturacion").val();
            var statusDfacturacion = $("#statusDfacturacion").val();
            var descripcionDfacturacion = $("#descripcionDfacturacion").val();
            var usuarioDfacturacion = $("#usuarioDfacturacion").val();
            /*=====DATOS DE ACTIVIDAD======*/

            var request = {
                rutas:rutas,
                facturador:facturador,
                asignacionPrecio:asignacionPrecio,
                claveProdServ:claveProdServ,
                noIdentificacion:noIdentificacion,
                cantidad:cantidad,
                claveUnidad:claveUnidad,
                unidad:unidad,
                descripcion:descripcion,
                valorUnitario:valorUnitario,
                importe:importe,
                tIva:tIva,
                tIsr:tIsr,
                rIva:rIva,
                rIsr:rIsr
            };

            var requestDfacturacion = {
                fecha:fechaDfacturacion,
                ref:refDfacturacion,
                tabla:tablaDfacturacion,
                status:statusDfacturacion,
                descripcion:descripcionDfacturacion,
                usuario:usuarioDfacturacion
            };

            $.ajax({
                url: "{{URL::route('actividad.store')}}",
                type: 'POST',
                headers: {'X-CSRF-TOKEN':tokenActividadDfacturacion},
                contentType: 'application/json',
                data: JSON.stringify(requestDfacturacion),
            })
                .done(function() {
                    console.log("success");
                })
                .fail(function() {
                    console.log("error");
                })

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                headers: {'X-CSRF-TOKEN':token},
                contentType: 'application/json',
                data: JSON.stringify(request),
            })
                .done(function() {
                    console.log("success");
                    alert("Dato Guardado")

                    $('#rutasSelect').prop('selectedIndex',0);
                    $('#facturador').val("");
                    $('#asignacionPrecio').prop('selectedIndex',0);
                    $("#claveProdServ").val("");
                    $("#noIdentificacion").val("");
                    $("#cantidadDfacturacion").val("");
                    $("#claveUnidad").val("");
                    $("#unidad").val("");
                    $("#descripcion").val("");
                    $("#valorUnitario").val("");
                    $("#importeF").val("");
                    $("#tIva").val("");
                    $("#tIsr").val("");
                    $("#rIva").val("");
                    $("#rIsr").val("");


                })
                .fail( function( jqXHR, textStatus, errorThrown ) {

                    if (jqXHR.status === 0) {

                        console.log('Not connect: Verify Network.');

                    } else if (jqXHR.status == 404) {

                        console.log('Requested page not found [404]');

                    } else if (jqXHR.status == 500) {

                        console.log('Internal Server Error [500].');

                    } else if (textStatus === 'parsererror') {

                        console.log('Requested JSON parse failed.');

                    } else if (textStatus === 'timeout') {

                        console.log('Time out error.');

                    } else if (textStatus === 'abort') {

                        console.log('Ajax request aborted.');

                    } else {

                        console.log('Uncaught Error: ' + jqXHR.responseText);

                    }

                });
        });
        $("#datosCxP").submit(function(e){
            e.preventDefault();
                var ruta = $('#rutasCxP').val();
                var concepto = $('#conceptoCxP').val();
                var asignacionPrecio = $('#asignacionPrecioCxP').val();
                var claveProdServ = $('#claveProdServCxP').val();
                var noIdentificacion = $('#noIdentificacionCxP').val();
                var cantidadCxP = $('#cantidadCxP').val();
                var claveUnidad = $('#claveUnidadCxP').val();
                var unidad = $('#unidadCxP').val();
                var descripcion = $('#descripcionCxP').val();
                var valorUnitario = $('#valorUnitarioCxP').val();
                var importeCxP = $('#importeCxP').val();
                var tivaCxP = $('#tivaCxP').val();
                var tisrCxP = $('#tisrCxP').val();
                var rivaCxP = $('#tisrCxP').val();
                var risrCxP = $('#risrCxP').val();
                var token = $('#tokenFormDatosCxP').val();

                var tokenActividadDCxP = $('#tokenDCxP').val();

                /*=====DATOS DE ACTIVIDAD======*/
                var fechaDCxP = $("#fechaDCxP").val();
                var refDCxP = $("#refDCxP").val();
                var tablaDCxP = $("#tablaDCxP").val();
                var statusDCxP = $("#statusDCxP").val();
                var descripcionDCxP = $("#descripcionDCxP").val();
                var usuarioDCxP = $("#usuarioDCxP").val();
                /*=====DATOS DE ACTIVIDAD======*/

            var request = {
                ruta:ruta,
                concepto:concepto,
                asignacionPrecio:asignacionPrecio,
                claveProdServ:claveProdServ,
                noIdentificacion:noIdentificacion,
                cantidad:cantidadCxP,
                claveUnidad:claveUnidad,
                unidad:unidad,
                descripcion:descripcion,
                valorUnitario:valorUnitario,
                importe:importeCxP,
                tivaCxP:tivaCxP,
                tisrCxP:tisrCxP,
                rivaCxP:rivaCxP,
                risrCxP:risrCxP
            }

            var requestDfacturacion = {
                fecha:fechaDCxP,
                ref:refDCxP,
                tabla:tablaDCxP,
                status:statusDCxP,
                descripcion:descripcionDCxP,
                usuario:usuarioDCxP
            };


//======SI PASAN LA PRUEBA HACER ESTAS PETICIONES========//
        //ACTIVIDAD
            $.ajax({
                url: "{{URL::route('actividad.store')}}",
                type: 'POST',
                headers: {'X-CSRF-TOKEN':tokenActividadDCxP},
                contentType: 'application/json',
                data: JSON.stringify(requestDfacturacion),
            })
                .done(function() {
                    console.log("success");
                })
                .fail(function() {
                    console.log("error");
                })
        //DATOS CUENTAS POR PAGAR
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                headers: {'X-CSRF-TOKEN':token},
                contentType: 'application/json',
                data: JSON.stringify(request),
            })
                .done(function() {
                    console.log("success");
                    alert("Dato Guardado")

                    $('#ruta').prop('selectedIndex',0);
                    $('#concepto').val("")
                    $('#asignacionPrecio').prop('selectedIndex',0);
                    $('#claveProdServCxP').val("")
                    $('#noIdentificacionCxP').val("")
                    $('#cantidadCxP').val("")
                    $('#claveUnidadCxP').val("")
                    $('#unidadCxP').val("")
                    $('#descripcionCxP').val("")
                    $('#valorUnitarioCxP').val("")
                    $('#importeCxP').val("")
                    $('#tivaCxP').val("")
                    $('#tisrCxP').val("")
                    $('#rivaCxP').val("")
                    $('#risrCxP').val("")
                })
                .fail( function( jqXHR, textStatus, errorThrown ) {

                    if (jqXHR.status === 0) {

                        console.log('Not connect: Verify Network.');

                    } else if (jqXHR.status == 404) {

                        console.log('Requested page not found [404]');

                    } else if (jqXHR.status == 500) {

                        console.log('Internal Server Error [500].');

                    } else if (textStatus === 'parsererror') {

                        console.log('Requested JSON parse failed.');

                    } else if (textStatus === 'timeout') {

                        console.log('Time out error.');

                    } else if (textStatus === 'abort') {

                        console.log('Ajax request aborted.');

                    } else {

                        console.log('Uncaught Error: ' + jqXHR.responseText);

                    }

                });
//======SI PASAN LA PRUEBA HACER ESTAS PETICIONES========//

        });

    </script>
@endsection