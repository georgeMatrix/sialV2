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
                                        <option value="{{$provedor->id}}">{{$provedor->nombre}}</option>
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
                                    <h5 for="">Cliente</h5>
                                    <select name="clientesF" id="clientesF" class="form-control">
                                        @foreach($clientes as $cliente)
                                            <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <h5 for="">Razon social que factura</h5>
                                    <select name="facturador" id="facturador" class="form-control">
                                        <option value="1">RUBEN GUTIERREZ VELAZCO</option>
                                        <option value="2">TRANSPORTES LOGIEXPRESS SA DE CV</option>
                                    </select>
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
                                    <input maxlength="50" type="text" required name="descripcion" id="descripcionF" class="form-control {{$errors->has('descripcion')?'is-invalid':''}}"
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
                                    <input disabled type="number" min="0" name="importeF" id="importeF" class="form-control {{$errors->has('importe')?'is-invalid':''}}"
                                           value="{{old('importe')}}">
                                    <div class="invalid-feedback">
                                        El campo importe es requerido y debe de ser numerico
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5 for="">Traslado de Iva (Porcentaje)</h5>
                                    <input type="number" min="0" max="100" required name="tIva" id="tIva" class="form-control {{$errors->has('tIva')?'is-invalid':''}}"
                                           value="{{old('tIva')}}">
                                    <div class="invalid-feedback">
                                        El campo tIva es requerido y debe de ser numerico
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5 for="">Traslado de Isr (Porcentaje)</h5>
                                    <input type="number" min="0" max="100" required name="tIsr" id="tIsr" class="form-control {{$errors->has('tIsr')?'is-invalid':''}}"
                                           value="{{old('tIsr')}}">
                                    <div class="invalid-feedback">
                                        El campo tIsr es requerido y debe de ser numerico
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5 for="">Retencion de Iva (Porcentaje)</h5>
                                    <input type="number" min="0" max="100" required name="rIva" id="rIva" class="form-control {{$errors->has('rIva')?'is-invalid':''}}"
                                           value="{{old('rIva')}}">
                                    <div class="invalid-feedback">
                                        El campo rIva es requerido y debe de ser numerico
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5 for="">Retencion de Isr (Porcentaje)</h5>
                                    <input type="number" min="0" max="100" required name="rIsr" id="rIsr" class="form-control {{$errors->has('rIsr')?'is-invalid':''}}"
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
                                    <h5 for="">Clave de Producto o Servicio</h5>
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
                                    <h5 for="">Traslado de Iva (Porcentaje)</h5>
                                    <input type="number" required name="tiva" id="tivaCxP" class="form-control {{$errors->has('tiva')?'is-invalid':''}}"
                                           value="{{old('tiva')}}">
                                    <div class="invalid-feedback">
                                        El campo tiva es requerido
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5 for="">Traslado de Isr (Porcentaje)</h5>
                                    <input type="number" required name="tisr" id="tisrCxP" class="form-control {{$errors->has('tisr')?'is-invalid':''}}"
                                           value="{{old('tisr')}}">
                                    <div class="invalid-feedback">
                                        El campo tisr es requerido
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5 for="">Retencion de Iva (Porcentaje)</h5>
                                    <input type="number" required name="riva" id="rivaCxP" class="form-control {{$errors->has('riva')?'is-invalid':''}}"
                                           value="{{old('riva')}}">
                                    <div class="invalid-feedback">
                                        El campo riva es requerido
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5 for="">Retencion de Isr (Porcentaje)</h5>
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
    <script src="{{asset('js/ruta/rutaCreate.js')}}"></script>
@endsection