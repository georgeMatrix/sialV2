@extends('layouts.app')
@section('content')
    <div class="container">
        @include('include.menu')
        <div class="card bg-dark">
            <div class="row">
                <div class="col-md-6 card-title">
                    <h3 class="text-center text-white"><i class="text-danger mt-3 fa fa-id-card fa-md"></i> LISTADO CUENTAS POR PAGAR</h3>
                </div>

                <div class="col-md-3">
                    <a href="{{url('/home')}}" class="mt-3 mr-3 btn btn-info float-right"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <form action="" method="post">
                <div class="row">
                    <h5>Facturador</h5>
                    <select name="facturadorCuentasPorPagar" id="facturadorCuentasPorPagar" class="form-control">
                        <option value="1">RUBEN GUTIERREZ VELAZCO</option>
                        <option value="2">TRANSPORTES LOGIEXPRESS SA DE CV</option>
                    </select>
                </div>
                <div class="row">
                    <h5>Cliente</h5>
                    <select name="clienteCuentasPorPagar" id="clienteCuentasPorPagar" class="form-control">
                        @foreach($clientes as $cliente)
                            <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive content-loader">
                    <table class="table table-hover table-sm table-striped">
                        <thead class="table-info">
                        <tr>
                            <th>ID</th>
                            <th>ID_CARTA_PORTE</th>
                            <th>ID_DATOS_FACTURACION</th>
                            <th>CLAVE_PROD_SERV</th>
                            <th>NO_IDENTIFICACION</th>
                            <th>CANTIDAD</th>
                            <th>CLAVE_UNIDAD</th>
                            <th>UNIDAD</th>
                            <th>DESCRIPCION</th>
                            <th>VALOR_UNITARIO</th>
                            <th>IMPORTE</th>
                            <th>EMISOR_RFC</th>
                            <th>EMISOR_RAZON_SOCIAL</th>
                            <th>EMISOR_REGIMEN</th>
                            <th>RECEPTOR_RFC</th>
                            <th>RECEPTOR_RAZON_SOCIAL</th>
                            <th>RECEPTOR_REGIMEN</th>
                            <th>CFDI_T_IVA_BASE</th>
                            <th>CFDI_T_IVA_IMPUESTO</th>
                            <th>CFDI_T_IVA_TIPOFACTOR</th>
                            <th>CFDI_T_IVA_TASACUOTA</th>
                            <th>CFDI_T_IVA_IMPORTE</th>
                            <th>CFDI_T_ISR_BASE</th>
                            <th>CFDI_T_ISR_IMPUESTO</th>
                            <th>CFDI_T_ISR_TIPOFACTOR</th>
                            <th>CFDI_T_ISR_TASACOUTA</th>
                            <th>CFDI_T_ISR_IMPORTE</th>
                            <th>CFDI_R_IVA_BASE</th>
                            <th>CFDI_R_IVA_IMPUESTO</th>
                            <th>CFDI_R_IVA_TIPOFACTOR</th>
                            <th>CFDI_R_IVA_TASACOUTA</th>
                            <th>CFDI_R_IVA_IMPORTE</th>
                            <th>CFDI_R_ISR_BASE</th>
                            <th>CFDI_R_ISR_IMPUESTO</th>
                            <th>CFDI_R_ISR_TIPOFACTOR</th>
                            <th>CFDI_R_ISR_TASACUOTA</th>
                            <th>CFDI_R_ISR_IMPORTE</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($facturables as $facturable)
                            <tr>
                                <td>{{$facturable->id}}</td>
                                <td>{{$facturable->id_carta_porte}}</td>
                                <td>{{$facturable->id_datos_facturacion}}</td>
                                <td>{{$facturable->clave_prod_serv}}</td>
                                <td>{{$facturable->no_identificacion}}</td>
                                <td>{{$facturable->cantidad}}</td>
                                <td>{{$facturable->clave_unidad}}</td>
                                <td>{{$facturable->unidad}}</td>
                                <td>{{$facturable->descripcion}}</td>
                                <td>{{$facturable->valor_unitario}}</td>
                                <td>{{$facturable->importe}}</td>
                                <td>{{$facturable->emisor_rfc}}</td>
                                <td>{{$facturable->emisor_razon_social}}</td>
                                <td>{{$facturable->emisor_regimen}}</td>
                                <td>{{$facturable->receptor_rfc}}</td>
                                <td>{{$facturable->receptor_razon_social}}</td>
                                <td>{{$facturable->receptor_regimen}}</td>
                                <td>{{$facturable->cfdi_t_iva_base}}</td>
                                <td>{{$facturable->cfdi_t_iva_impuesto}}</td>
                                <td>{{$facturable->cfdi_t_iva_tipofactor}}</td>
                                <td>{{$facturable->cfdi_t_iva_tasacuota}}</td>
                                <td>{{$facturable->cfdi_t_iva_importe}}</td>
                                <td>{{$facturable->cfdi_t_isr_base}}</td>
                                <td>{{$facturable->cfdi_t_isr_impuesto}}</td>
                                <td>{{$facturable->cfdi_t_isr_tipofactor}}</td>
                                <td>{{$facturable->cfdi_t_isr_tasacuota}}</td>
                                <td>{{$facturable->cfdi_t_isr_importe}}</td>
                                <td>{{$facturable->cfdi_r_iva_base}}</td>
                                <td>{{$facturable->cfdi_r_iva_impuesto}}</td>
                                <td>{{$facturable->cfdi_r_iva_tipofactor}}</td>
                                <td>{{$facturable->cfdi_r_iva_tasacuota}}</td>
                                <td>{{$facturable->cfdi_r_iva_importe}}</td>
                                <td>{{$facturable->cfdi_r_isr_base}}</td>
                                <td>{{$facturable->cfdi_r_isr_impuesto}}</td>
                                <td>{{$facturable->cfdi_r_isr_tipofactor}}</td>
                                <td>{{$facturable->cfdi_r_isr_tasacuota}}</td>
                                <td>{{$facturable->cfdi_r_isr_importe}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{$facturables->render()}}
            </div>
        </div>
    </div>
@endsection