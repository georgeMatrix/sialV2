@extends('layouts.app')
@section('content')
    <div class="container">
        @include('include.menu')
        <div class="card bg-dark">
            <div class="row">
                <div class="col-md-9 card-title">
                    <h3 style="font-size: 20pt;" class="mt-3 text-center text-white"><i class="text-danger fa fa-box-open fa-md text-danger"></i> NUEVO PROVEEDOR</h3>
                </div>
                <div class="col-md-3">
                    <a href="{{route('provedores.index')}}" class="mt-3 mr-3 btn btn-info float-right"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('provedores.store')}}" method="post" id="formProvedor">
                    {{csrf_field()}}
                    @if(empty($id->id))
                        <input type="hidden" value="1" name="id">
                    @else
                        <input type="hidden" value="{{$id->id+1}}" name="id">
                    @endif
                    <div class="form-group">
                        <h5 for="">Nombre Comercial del Proveedor</h5>
                        <input maxlength="70" required type="text" name="nombre" id="nombre" class="form-control">
                    </div>

                    <div class="form-group">
                        <h5 for="">Rázon Social del Proveedor</h5>
                        <input maxlength="70" required type="text" name="razon_social" id="razon_social" class="form-control">
                    </div>

                    <div class="form-group">
                        <h5 for="">RFC</h5>
                        <input maxlength="13" required type="text" name="rfc" id="rfc" class="form-control">
                    </div>

                    <div class="form-group">
                        <h5 for="">Dirección</h5>
                        <input maxlength="100" required type="text" name="direccion" id="direccion" class="form-control">
                    </div>

                    <div class="form-group">
                        <h5 for="">Contacto</h5>
                        <input maxlength="50" required type="text" name="contacto" id="contacto" class="form-control">
                    </div>

                    <div class="form-group">
                        <h5 for="">Correo Electrónico de Contacto</h5>
                        <input maxlength="50" required type="email" name="mail" id="mail" class="form-control">
                    </div>

                    <div class="form-group">
                        <h5 for="">Días de Crédito</h5>
                        <input type="number" required min="0" name="credito" id="credito" class="form-control">
                    </div>

                    <div class="form-group">
                        <h5 for="">Saldo</h5>
                        <input type="number" min="0" name="saldo" id="saldo" class="form-control">
                    </div>

                    <button id="guardarProvedor" type="submit" class="btn btn-info">Guardar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{asset('js/provedor/provedorCreate.js')}}"></script>
@endsection