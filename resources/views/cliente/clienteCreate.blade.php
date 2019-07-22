@extends('layouts.app')
@section('content')
    <div class="container">
        @include('include.menu')
        <div class="card bg-dark">
            <div class="row">
                <div class="col-md-9 card-title">
                    <h3 style="font-size: 20pt;" class="mt-3 text-center text-white"><i class="text-danger fas fa-user"></i> NUEVO CLIENTE</h3>
                </div>
                <div class="col-md-3">
                    <a href="{{route('clientes.index')}}" class="mt-3 mr-3 btn btn-info float-right"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-md-12">
            <form action="{{route('clientes.store')}}" method="post" id="formularioCliente">
                {{csrf_field()}}
                @if(empty($id->id))
                    <input type="hidden" value="1" name="id">
                @else
                    <input type="hidden" value="{{$id->id+1}}" name="id">
                @endif

                <div class="form-group">
                    <h5 for="">Nombre</h5>
                    <input maxlength="70" required type="text" name="nombre" id="nombre" class="form-control">
                </div>

                <div class="form-group">
                    <h5 for="">Razon Social</h5>
                    <input maxlength="70" required type="text" name="razonSocial" id="razonSocial" class="form-control">
                </div>

                <div class="form-group">
                    <h5 for="">RFC</h5>
                    <input maxlength="15" required type="text" name="rfc" id="rfc" class="form-control">
                </div>

                <div class="form-group">
                    <h5 for="">Regimen</h5>
                    <input maxlength="50" required type="text" name="regimen" id="regimen" class="form-control">
                </div>

                <div class="form-group">
                    <h5 for="">Calle</h5>
                    <input maxlength="70" required type="text" name="calle" id="calle" class="form-control">
                </div>

                <div class="form-group">
                    <h5 for="">Numero</h5>
                    <input maxlength="10" required type="text" name="numero" id="numero" class="form-control">
                </div>

                <div class="form-group">
                    <h5 for="">Interior</h5>
                    <input maxlength="10" required type="text" name="interior" id="interior" class="form-control">
                </div>

                <div class="form-group">
                    <h5 for="">Colonia</h5>
                    <input maxlength="70" required type="text" name="colonia" id="colonia" class="form-control">
                </div>

                <div class="form-group">
                    <h5 for="">Ciudad</h5>
                    <input maxlength="70" required type="text" name="ciudad" id="ciudad" class="form-control">
                </div>

                <div class="form-group">
                    <h5 for="">Cp</h5>
                    <input maxlength="10" required type="text" name="cp" id="cp" class="form-control">
                </div>

                <div class="form-group">
                    <h5 for="">Estado</h5>
                    <input maxlength="20" required type="text" name="estado" id="estado" class="form-control">
                </div>

                <div class="form-group">
                    <h5 for="">Contacto 1</h5>
                    <input maxlength="50" required type="text" name="contacto1" id="contacto1" class="form-control">
                </div>

                <div class="form-group">
                    <h5 for="">Telefono 1</h5>
                    <input maxlength="20" required type="text" name="tel1" id="tel1" class="form-control">
                </div>

                <div class="form-group">
                    <h5 for="">Mail 1</h5>
                    <input maxlength="50" required type="email" name="mail1" id="mail1" class="form-control">
                </div>

                <div class="form-group">
                    <h5 for="">Contacto 2</h5>
                    <input maxlength="50" required type="text" name="contacto2" id="contacto2" class="form-control">
                </div>

                <div class="form-group">
                    <h5 for="">Telefono 2</h5>
                    <input maxlength="20" required type="text" name="tel2" id="tel2" class="form-control">
                </div>

                <div class="form-group">
                    <h5 for="">Mail 2</h5>
                    <input maxlength="50" required type="email" name="mail2" id="mail2" class="form-control">
                </div>

                <div class="form-group">
                    <h5 for="">Dia Revision</h5>
                    <select required name="dia_revision" id="dia_revision" class="form-control">
                        <option value="1">LUNES</option>
                        <option value="2">MARTES</option>
                        <option value="3">MIERCOLES</option>
                        <option value="4">JUEVES</option>
                        <option value="5">VIERNES</option>
                    </select>
                </div>

                <div class="form-group">
                    <h5 for="">Dia Credito</h5>
                    <select required name="dia_credito" id="dia_credito" class="form-control">
                        @for($i=1; $i<100; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                    
                </div>

                <button id="guardarCliente" type="submit" class="btn btn-info"><i class="far fa-save"></i> Guardar</button>
            </form>
        </div>
    </div>
    </div>
    <script src="{{asset('js/cliente/cliente.js')}}"></script>
@endsection