@extends('layouts.app')
@section('content')
    <div class="container">
    @include('include.menu')
        <div class="card bg-dark">
            <div class="row">
                <div class="col-md-6 card-title">
                    <h3 class="text-center text-white"><i class="text-danger mt-3 fa fa-id-card fa-md"></i> LISTADO DE FACTURAS</h3>
                </div>
                <div class="col-md-6">
                    <a href="{{url('/home')}}" class="mt-3 mr-3 btn btn-info float-right"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                    <button class="mt-3 mr-3 btn btn-info float-right" id="aplicarPago">Aplicar Pago</button> <!-- ¿Desea aplicar pago a las facturas seleccionadas?  SI NO-->
                    <!-- Esta accion no podra deshacerse, ¿desea continuar? SI NO--> <!-- cuando si se les cambia facturas seleccionadas a PAGADO -->
                    <button class="mt-3 mr-3 btn btn-info float-right" id="generarContrarecibo" data-toggle="modal" data-target="#modalFacturas">Generar Contrarecibo</button>
                    <!-- <a href="#" id="XMLFactura" download="XMLFactura" class="btn btn-info mt-3 mr-3 float-right">XML</a> -->
                    {{--<a href="{{url('api/excelFactura')}}" class="btn btn-danger">excel</a>--}}
                    {{--<button class="btn btn-danger" onclick="excelFacturaPrueba()">excel</button>--}}
                    {{--<a href="{{route('cuentasPorCobrarV2.create')}}" class="mt-3 mr-3 btn btn-info float-right">Nuevo</a>--}}
                </div>

            </div>
            <div class="row">

            </div>
        </div>
        <div class="col-md-12">
            <form action="#" method="post" id="formFacturas">
                <input type="hidden" name="tokenFacturas" id="tokenFacturas" value="{{csrf_token()}}">
                <div class="row">
                    <h5>FACTURAS</h5>
                    <select name="facturas" id="facturas" class="form-control">
                        <option value="ALL">TODAS LAS FACTURAS</option>
                        <option value="PAGADO">SOLO FACTURAS PAGADAS</option>
                        <option value="PENDIENTE">SOLO FACTURAS PENDIENTES</option>
                    </select>
                </div>
                <div class="row">
                    <h5>EMISOR</h5>
                    <select name="emisor" id="emisor" class="form-control">
                        <option value="" selected>SELECCIONE UNA OPCION</option>
                        @foreach($emisorRazonSocial as $emisor)
                            @if($emisor->emisor_razon_social == 2)
                                <option value="{{$emisor->emisor_razon_social}}">TRANSPORTES LOGIEXPRESS SA DE CV</option>
                            @endif
                            @if($emisor->emisor_razon_social == 1)
                                <option value="{{$emisor->emisor_razon_social}}">RUBEN GUTIERREZ VELAZCO</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <h5>CLIENTE</h5>
                    <select name="cliente" id="cliente" class="form-control">
                        <option value="" selected>SELECCIONE UNA OPCION</option>
                        @foreach($receptorRazonSocial as $receptor)
                            <option value="{{$receptor->receptor_razon_social}}">{{$receptor->receptor_razon_social}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <button class="btn btn-success mt-2" id="consultar" type="submit">Consultar</button>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive content-loader" style="height: 500px; overflow-y: 500px;">
                    <table class="table table-hover table-sm table-striped">
                        <thead>
                        <tr>
                            <th>SELECT</th>
                            <th>STATUS</th>
                            <th>SERIE</th>
                            <th>FOLIO</th>
                            <th>LUGAR_DE_EXPEDICION</th>
                            <th>EMISOR</th>
                            <th>CLIENTE</th>
                            <th>MONEDA</th>
                            <th>IMPORTE</th>
                            <th>TIPO_DE_CAMBIO</th>
                            <th>IMPORTE_EN_PESOS</th>
                            <th>METODO_DE_PAGO</th>
                            <th>FORMA_DE_PAGO</th>
                            <th>CONTRARECIBO</th>
                            <th>FECHA_DE_REVISION</th>
                            <th>FECHA_PAGO</th>

                        </tr>
                        </thead>
                        <tbody id="tablafacturas">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('include.modalFacturas')
    @endsection
@section('scripts')
    <script src="js/facturas/facturas.js"></script>
    @endsection
