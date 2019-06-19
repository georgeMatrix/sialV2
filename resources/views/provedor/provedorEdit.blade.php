@extends('layouts.app')
@section('content')
    <div class="container">
        @include('include.menu')
        <div class="card bg-dark">
            <div class="row">
                <div class="col-md-9 card-title">
                    <h3 style="font-size: 20pt;" class="mt-3 text-center text-white"><i class="text-danger fa fa-box-open fa-md text-danger"></i> ACTUALIZACION PROVEEDORES</h3>
                </div>
                <div class="col-md-3">
                    <a href="{{route('provedores.index')}}" class="mt-3 mr-3 btn btn-primary float-right"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{url('/provedores/'.$provedor->id)}}" method="post">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <h5 for="">Nombre comercial del proveedor</h5>
                    <input maxlength="70" required type="text" name="nombre" id="nombre" class="form-control" value="{{$provedor->nombre}}">
                    <h5 for="">Razon social del proveedor</h5>
                    <input maxlength="70" required type="text" name="razon_social" id="razon_social" class="form-control"  value="{{$provedor->razon_social}}">
                    <h5 for="">Rfc</h5>
                    <input maxlength="13" required type="text" name="rfc" id="rfc" class="form-control"  value="{{$provedor->rfc}}">
                    <h5 for="">Direccion</h5>
                    <input maxlength="100" required type="text" name="direccion" id="direccion" class="form-control"  value="{{$provedor->direccion}}">
                    <h5 for="">Contacto</h5>
                    <input maxlength="50" required type="text" name="contacto" id="contacto" class="form-control"  value="{{$provedor->contacto}}">
                    <h5 for="">Mail</h5>
                    <input maxlength="50" required type="email" name="mail" id="mail" class="form-control"  value="{{$provedor->mail}}">
                    <h5 for="">Dias de credito</h5>
                    <input type="number" required name="credito" id="credito" class="form-control"  value="{{$provedor->credito}}">
                    <h5 for="">Saldo</h5>
                    <input type="number" required name="saldo" id="saldo" class="form-control"  value="{{$provedor->saldo}}">
                    <br>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
@endsection