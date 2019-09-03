@extends('layouts.app')
@section('content')
    <div class="container">
        @include('include.menu')
        <div class="card bg-dark">
            <div class="row">
                <div class="col-md-6 card-title">
                    <h3 class="text-center text-white"><i class="text-danger mt-3 fa fa-id-card fa-md"></i> LISTADO CUENTAS POR COBRAR</h3>
                </div>

                <div class="col-md-3">
                    <a href="{{url('/home')}}" class="mt-3 mr-3 btn btn-info float-right"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>
                <div class="col-md-3">
                    <a href="{{route('cuentasPorCobrarV2.create')}}" class="mt-3 mr-3 btn btn-info float-right">Nuevo</a>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <form action="#" method="post" id="formCuentasPorPagar">
                <input type="hidden" name="tokenCuentasPorPagar" id="tokenCuentasPorPagar" value="{{csrf_token()}}">
                <div class="row">
                    <h5>Facturador</h5>
                    <select name="facturadorCuentasPorPagar" id="facturadorCuentasPorPagar" class="form-control">
                        <option value="" selected>Seleccione una opcion</option>
                        <option value="1">RUBEN GUTIERREZ VELAZCO</option>
                        <option value="2">TRANSPORTES LOGIEXPRESS SA DE CV</option>
                    </select>
                </div>
                <div class="row">
                    <h5>Cliente</h5>
                    <select name="clienteCuentasPorPagar" id="clienteCuentasPorPagar" class="form-control">
                        <option value="" selected>Seleccione una opcion</option>
                        @foreach($clientes as $cliente)
                            <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <!--<div class="row">
                    <label for="">prueba</label>
                    <input type="text" name="prueba" id="prueba" class="form-control">
                </div>-->
                <div class="row">
                    <button class="btn btn-success mt-2" type="submit">Consultar</button>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive content-loader">
                    <table class="table table-hover table-sm table-striped">
                        <thead>
                            <tr>
                                <th>SELECT</th>
                                <th>TIPO</th>
                                <th>CARTA_PORTE</th>
                                <th>FACTURADOR</th>
                                <th>CLIENTE</th>
                                <th>NOMBRE_RUTA</th>
                                <th>UNIDAD</th>
                                <th>REMOLQUE</th>
                                <th>OPERADOR</th>
                                <th>CLAVE_PRODUCTO_O_SERVICIO</th>
                                <th>NO._IDENTIFICACION</th>
                                <th>CANTIDAD</th>
                                <th>CLAVE_UNIDAD</th>
                                <th>UNIDAD</th>
                                <th>DESCRIPCION</th>
                                <th>VALOR_UNITARIO</th>
                                <th>IMPORTE</th>
                                <th>IVA_TRASLADADO</th>
                                <th>IVA_RETENIDO</th>
                            </tr>
                        </thead>
                        <form action="{{route('cuentasPorCobrarV2.store')}}" method="post" id="cuentasPorCobrarForm">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
                                <tbody id="tablaCuentasPorPagar">
                                </tbody>
                            <button type="submit" class="btn btn-info">Enviar</button>
                        </form>

                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('js/cuentasPorCobrar/cuentasPorCobrar.js')}}"></script>
    @endsection