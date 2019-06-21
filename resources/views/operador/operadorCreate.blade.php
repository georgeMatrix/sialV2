@extends('layouts.app')
@section('content')
    <div class="container">
        @include('include.menu')
        <div class=" card bg-dark">
            <div class="row">
                <div class="col-md-9 card-title">
                    <h3 style="font-size: 20pt;" class="mt-3 text-center text-white"><i class=" text-danger far fa-id-card"></i> NUEVO OPERADOR</h3>
                </div>
                <div class="col-md-3">
                    <a href="{{route('operadores.index')}}" class="mt-3 mr-3 btn btn-info float-right"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('operadores.store')}}" method="post" id="formOperador">
                    {{csrf_field()}}
                    @if(empty($id->id))
                        <input type="hidden" value="1" name="id">
                    @else
                        <input type="hidden" value="{{$id->id+1}}" name="id">
                    @endif
                    <div class="form-group">
                        <h5 for="">Apellido paterno</h5>
                        <input maxlength="20" required type="text" name="apellido_paterno" id="apellido_paterno" class="form-control">
                    </div>

                    <div class="form-group">
                        <h5 for="">Apellido materno</h5>
                        <input maxlength="20" required type="text" name="apellido_materno" id="apellido_materno" class="form-control">
                    </div>

                    <div class="form-group">
                        <h5 for="">Nombres</h5>
                        <input maxlength="50" required type="text" name="nombres" id="nombres" class="form-control">
                    </div>

                    <div class="form-group">
                        <h5 for="">Nombre corto</h5>
                        <input maxlength="20" required type="text" name="nombre_corto" id="nombre_corto" class="form-control">
                    </div>

                    <div class="form-group">
                        <h5 for="">Numero de licencia</h5>
                        <input maxlength="20" required type="text" name="licencia" id="licencia" class="form-control">
                    </div>

                    <div class="form-group">
                        <h5 for="">Vigencia de licencia</h5>
                        <!-- <input type="text" class="form-control" id="datapicker">-->
                        <input type="text" required readonly name="vigencia_licencia" id="vigencia_licencia" class="form-control">
                    </div>

                    <div class="form-group">
                        <h5 for="">Vigencia de examen medico</h5>
                        <input type="text" required readonly name="vigencia_medico" id="vigencia_medico" class="form-control">
                    </div>

                    <div class="form-group">
                        <h5 for="">Observaciones</h5>
                        <input maxlength="100" type="text" name="obs" id="obs" class="form-control">
                    </div>

                    <button id="guardarOperador" type="submit" class="btn btn-info"><i class="far fa-save"></i> Guardar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{asset('js/operador/operadorCreate.js')}}"></script>
@endsection