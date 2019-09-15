@extends('layouts.app')
@section('content')
    <div class="container">
        @include('include.menu')
        <div class="card bg-dark">
            <div class="row">
                <div class="col-md-9 card-title">
                    <h3 style="font-size: 20pt;" class="mt-3 text-center text-white"><i class="text-danger fas fa-user"></i> Nuevo Cuentas Por Cobrar</h3>
                </div>
                <div class="col-md-3">
                    <a href="{{route('cuentasPorCobrarV2.index')}}" class="mt-3 mr-3 btn btn-info float-right"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('cuentasPorCobrarV2.store')}}" method="post" id="cuentasPorPagarForm">
                    {{csrf_field()}}
                    <label for="">Tipo</label>
                    <select name="id_carta_porte" id="id_carta_porte" class="form-control">
                        @foreach($cartasPorteRelease as $cartasPorteR)
                            <option value="{{$cartasPorteR->id}}">{{$cartasPorteR->tipo}}</option>
                        @endforeach
                    </select>

                    <label for="">Id</label>
                    <select name="id_carta_porte" id="id_carta_porte" class="form-control">
                        @foreach($cartasPorteRelease as $cartasPorteR)
                            <option value="{{$cartasPorteR->id}}">{{$cartasPorteR->id}}</option>
                        @endforeach
                    </select>

                    <input type="hidden" value="0" name="id_datos_facturacion" id="id_datos_facturacion" class="form-control">
                    <h5 for="">Clave Producto Servicio</h5>
                    <input type="text" name="clave_prod_serv" id="clave_prod_serv" class="form-control">
                    <h5 for="">Identificacion</h5>
                    <input type="text" name="no_identificacion" id="no_identificacion" class="form-control">
                    <h5 for="">Cantidad</h5>
                    <input type="number" min="0" name="cantidad" id="cantidad" class="form-control">
                    <h5 for="">Clave unidad</h5>
                    <input type="text" name="clave_unidad" id="clave_unidad" class="form-control">
                    <h5 for="">Unidad</h5>
                    <input type="text" name="unidad" id="unidad" class="form-control">
                    <h5 for="">Descripción</h5>
                    <input type="text" name="descripcion" id="descripcion" class="form-control">
                    <h5 for="">Valor unitario</h5>
                    <input type="number" min="0" name="valor_unitario" id="valor_unitario" class="form-control">
                    <h5 for="">Importe</h5>
                    <input type="number" min="0" name="importe" id="importe" class="form-control">
                    <h5 for="">Facturador</h5>
                    <select name="emisor_razon_social" id="emisor_razon_social" class="form-control">
                        <option value="1">RUBEN GUTIERREZ VELAZCO</option>
                        <option value="2">TRANSPORTES LOGIEXPRESS SA DE CV</option>
                    </select>
                    <input type="hidden" value="" name="emisor_rfc" id="emisor_rfc">
                    <input type="hidden" value="" name="emisor_regimen" id="emisor_regimen">

                    <h5 for="">Cliente</h5>

                    <select name="" id="receptor_razon_social_busqueda" class="form-control">
                        @foreach($clientes as $cliente)
                                <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                        @endforeach
                    </select>

                    <input type="hidden" value="" name="receptor_razon_social" id="receptor_razon_social">
                    <input type="hidden" value="" name="receptor_rfc" id="receptor_rfc">
                    <input type="hidden" value="" name="receptor_regimen" id="receptor_regimen">
                    <input type="hidden" value="" name="cliente_id" id="cliente_id">

                    <h5>TRASLADO IVA %</h5>
                    <input min="0" max="99" type="number" name="trasladoIva" id="trasladoIva" class="form-control">
                    <h5>TRASLADO ISR %</h5>
                    <input min="0" max="99" type="number" name="trasladoIsr" id="trasladoIsr" class="form-control">
                    <h5>RETENCION IVA %</h5>
                    <input min="0" max="99" type="number" name="retencionIva" id="retencionIva" class="form-control">
                    <h5>RETENCION ISR %</h5>
                    <input min="0" max="99" type="number" name="retencionIsr" id="retencionIsr" class="form-control">
                    <!-- ============================================================================ -->
                    <!-- ===========================HASTA AQUI SE VEN================================ -->
                    <!-- ============================================================================ -->
                    <input type="hidden" min="0" name="cfdi_t_iva_base" id="cfdi_t_iva_base" class="form-control">
                    <input type="hidden" min="0" max="99" name="cfdi_t_iva_impuesto" id="cfdi_t_iva_impuesto" class="form-control">
                    <input type="hidden" readonly name="cfdi_t_iva_tipofactor" id="cfdi_t_iva_tipofactor" class="form-control" value="Tasa">
                    <input type="hidden" min="0" name="cfdi_t_iva_tasacuota" id="cfdi_t_iva_tasacuota" class="form-control">
                    <input type="hidden" min="0" name="cfdi_t_iva_importe" id="cfdi_t_iva_importe" class="form-control">

                    <input type="hidden" min="0" name="cfdi_t_isr_base" id="cfdi_t_isr_base" class="form-control">
                    <input type="hidden" name="cfdi_t_isr_impuesto" id="cfdi_t_isr_impuesto" class="form-control">
                    <input type="hidden" min="0" max="99" name="cfdi_t_isr_tipofactor" id="cfdi_t_isr_tipofactor" class="form-control">
                    <input type="hidden" min="0" max="99" name="cfdi_t_isr_tasacuota" id="cfdi_t_isr_tasacuota" class="form-control">
                    <input type="hidden" min="0" max="99" name="cfdi_t_isr_importe" id="cfdi_t_isr_importe" class="form-control">

                    <input type="hidden" min="0" max="99" name="cfdi_r_iva_base" id="cfdi_r_iva_base" class="form-control">
                    <input type="hidden" name="cfdi_r_iva_impuesto" id="cfdi_r_iva_impuesto" class="form-control">
                    <input type="hidden" name="cfdi_r_iva_tipofactor" id="cfdi_r_iva_tipofactor" class="form-control">
                    <input type="hidden" name="cfdi_r_iva_tasacuota" id="cfdi_r_iva_tasacuota" class="form-control">
                    <input type="hidden" name="cfdi_r_iva_importe" id="cfdi_r_iva_importe" class="form-control">

                    <input type="hidden" name="cfdi_r_isr_base" id="cfdi_r_isr_base" class="form-control">
                    <input type="hidden" name="cfdi_r_isr_impuesto" id="cfdi_r_isr_impuesto" class="form-control">
                    <input type="hidden" name="cfdi_r_isr_tipofactor" id="cfdi_r_isr_tipofactor" class="form-control">
                    <input type="hidden" name="cfdi_r_isr_tasacuota" id="cfdi_r_isr_tasacuota" class="form-control">
                    <input type="hidden" name="cfdi_r_isr_importe" id="cfdi_r_isr_importe" class="form-control">

                    <button type="submit" class="btn btn-success">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $("#receptor_razon_social_busqueda").on('change', function() {
            console.log( this.value );
            $.get('/api/cliente/'+this.value, function (data) {
                //console.log(data[0]['razonSocial'])
                $('#receptor_rfc').val(data[0]['rfc'])
                $('#receptor_regimen').val(data[0]['regimen'])
                $('#cliente_id').val(data[0]['id'])

                $('#receptor_razon_social').val(data[0]['razonSocial'])


            });
        });

        $("#cuentasPorPagarForm").submit(function (e) {
            //e.preventDefault()
            $('#emisor_rfc').val($("#emisor_razon_social").val());
            $('#emisor_regimen').val($("#emisor_rfc").val());

            //$('#receptor_rfc').val($("#receptor_rfc").val());
            //$('#receptor_regimen').val($("#receptor_regimen").val())

            if ($("#trasladoIva").val() != 0){
                $("#cfdi_t_iva_base").val($('#importe').val());
                $("#cfdi_t_iva_impuesto").val('002');
                $("#cfdi_t_iva_tipofactor").val('Tasa');
                let iva1 = $("#trasladoIva").val()/100;
                $("#cfdi_t_iva_tasacuota").val(iva1);
                let importe1 = $("#importe").val()*iva1;
                console.log('importe:'+iva1)
                console.log('retencion:'+$("#trasladoIva").val())
                $("#cfdi_t_iva_importe").val(importe1);
            }

            if ($("#trasladoIsr").val() != 0){
                $("#cfdi_t_isr_base").val($('#importe').val());
                $("#cfdi_t_isr_impuesto").val('001');
                $("#cfdi_t_isr_tipofactor").val('Tasa');
                let iva2 = $("#trasladoIsr").val()/100;
                $("#cfdi_t_isr_tasacuota").val(iva2);
                let importe2 = $("#importe").val()*iva2;
                $("#cfdi_t_isr_importe").val(importe2);
            }

            if ($("#retencionIva").val() != 0){
                $("#cfdi_r_iva_base").val($('#importe').val());
                $("#cfdi_r_iva_impuesto").val('002');
                $("#cfdi_r_iva_tipofactor").val('Tasa');
                let iva3 = $("#retencionIva").val()/100;
                $("#cfdi_r_iva_tasacuota").val(iva3);
                let importe3 = $("#importe").val()*iva3;
                console.log('importe:'+importe3)
                console.log('retencion:'+$("#retencionIva").val())
                $("#cfdi_r_iva_importe").val(importe3);
            }

            if ($("#retencionIsr").val() != 0){
                $("#cfdi_r_isr_base").val($('#importe').val());
                $("#cfdi_r_isr_impuesto").val('002');
                $("#cfdi_r_isr_tipofactor").val('Tasa');
                let iva4 = $("#retencionIsr").val()/100;
                $("#cfdi_r_isr_tasacuota").val(iva4);
                let importe4 = $("#importe").val()*iva4;
                console.log('importe:'+importe4)
                console.log('retencion:'+$("#retencionIsr").val())
                $("#cfdi_r_isr_importe").val(importe4);
            }
        })



    </script>
    @endsection