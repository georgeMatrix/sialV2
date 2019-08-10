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
            <form action="#" method="post" id="formCuentasPorPagar">
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
                <!--<div class="row">
                    <label for="">prueba</label>
                    <input type="text" name="prueba" id="prueba" class="form-control">
                </div>-->
                <div class="row">
                <button class="btn btn-success" type="submit">Consultar</button>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive content-loader">
                    <table class="table table-hover table-sm table-striped" id="tablaCuentasPorPagar">
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('#formCuentasPorPagar').submit(function(e){
            e.preventDefault();
            $('#tablaCuentasPorPagar').DataTable({
                destroy:true,
                ajax:{
                    url:'/api/getCuentasPorPagar',
                    type:'post',
                    data:function (d) {
                        d.prueba=$('#facturadorCuentasPorPagar option:selected').val()
                    }
                },
                'columns':[
                    {title:'id', data:'id', name:'id'},
                    {title:'id_carta_porte', data:'id_carta_porte', name:'id_carta_porte'},
                    {title:'id_datos_facturacion', data:'id_datos_facturacion', name:'id_datos_facturacion'},
                    {title:'clave_prod_serv', data:'clave_prod_serv', name:'clave_prod_serv'},
                    {title:'no_identificacion', data:'no_identificacion', name:'no_identificacion'}


                ]
            })
        })
    </script>
    @endsection