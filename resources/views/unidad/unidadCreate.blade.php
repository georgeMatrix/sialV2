@extends('layouts.app')
@section('content')
    <div class="container">
        @include('include.menu')
        <div class="card bg-dark">
            <div class="row">
                <div class="col-md-9 card-title">
                    <h3 style="font-size: 20pt;" class="mt-3 text-center text-white"><i class="fa fa-truck fa-md text-danger"></i> NUEVA UNIDAD</h3>
                </div>
                <div class="col-md-3">
                    <a href="{{route('unidades.index')}}" class="mt-3 mr-3 btn btn-info float-right"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('unidades.store')}}" method="post" id="formUnidad">
                    {{csrf_field()}}
                    @if(empty($id->id))
                        <input type="hidden" value="1" name="id">
                    @else
                        <input type="hidden" value="{{$id->id+1}}" name="id">
                    @endif

                    <div class="form-group">
                        <h5 for="">Proveedor</h5>
                        <select name="provedor" required id="provedor" class="form-control">
                            @foreach($provedores as $provedor)
                                <option value="{{$provedor->id}}">{{$provedor->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <h5 for="">Nombre de la unidad</h5>
                        <input maxlength="70" required type="text" name="nombre" id="nombre" class="form-control">
                    </div>

                    <div class="form-group">
                        <h5 for="">Economico</h5>
                        <input maxlength="10" required type="text" name="economico" id="economico" class="form-control">
                    </div>

                    <div class="form-group">
                        <h5 for="">Tipo de unidad</h5>
                        <input maxlength="20" required type="text" name="tipo" id="tipo" class="form-control">
                    </div>

                    <div class="form-group">
                        <h5 for="">Marca</h5>
                        <input maxlength="20" required type="text" name="marca" id="marca" class="form-control">
                    </div>

                    <div class="form-group">
                        <h5 for="">Modelo</h5>
                        <input maxlength="20" required type="text" name="modelo" id="modelo" class="form-control">
                    </div>

                    <div class="form-group">
                        <h5 for="">Placas</h5>
                        <input maxlength="20" required type="text" name="placas" id="placas" class="form-control">
                        <div class="invalid-feedback">
                            El campo placas es requerido
                        </div>
                    </div>

                    <div class="form-group">
                        <h5 for="">Numero de serie de chasis</h5>
                        <input maxlength="30" required type="text" name="serie" id="serie" class="form-control">
                    </div>

                    <div class="form-group">
                        <h5 for="">Numero de serie de motor</h5>
                        <input maxlength="30" required type="text" name="motor" id="motor" class="form-control">
                    </div>

                    <div class="form-group">
                        <h5 for="">Vencimiento de poliza de seguro</h5>
                        <input type="text" required readonly name="seguro" id="seguro" class="form-control">
                    </div>

                    <div class="form-group">
                        <h5 for="">Vencimiento de Verificacion</h5>
                        <input type="text" required readonly name="verificacion" id="verificacion" class="form-control">
                    </div>

                    <div class="form-group">
                        <h5 for="">Vencimiento de fisico mecania</h5>
                        <input type="text" required readonly name="fm" id="fm" class="form-control">
                    </div>

                    <div class="form-group">
                        <h5 for="">Observaciones</h5>
                        <input maxlength="100" type="text" name="obs" id="obs" class="form-control">
                    </div>

                    <button id="guardarCreate" type="submit" class="btn btn-info">Guardar</button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#formUnidad").on('submit', function(){
                $("#guardarCreate").prop("disabled", true);
            })
        });
        jQuery.fn.datepicker.dates['es'] = {
            days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
            daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
            daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sá"],
            months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
            today: "Hoy",
            clear: "Borrar",
            format: "dd/mm/yyyy",
            titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
            weekStart: 0
        };

        jQuery('#seguro').datepicker({
            format: "yyyy/mm/dd",
            language: "es",
            autoclose: true
        });
        jQuery('#verificacion').datepicker({
            format: "yyyy/mm/dd",
            language: "es",
            autoclose: true
        });
        jQuery('#fm').datepicker({
            format: "yyyy/mm/dd",
            language: "es",
            autoclose: true
        });
    </script>
@endsection