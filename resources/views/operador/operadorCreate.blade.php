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
                        <input maxlength="20" required type="text" name="apellido_paterno" id="apellido_paterno" class="form-control" value="{{old('apellido_paterno')}}">
                    </div>

                    <div class="form-group">
                        <h5 for="">Apellido materno</h5>
                        <input maxlength="20" required type="text" name="apellido_materno" id="apellido_materno" class="form-control" value="{{old('apellido_materno')}}">
                    </div>

                    <div class="form-group">
                        <h5 for="">Nombres</h5>
                        <input maxlength="50" required type="text" name="nombres" id="nombres" class="form-control" value="{{old('nombres')}}">
                    </div>

                    <div class="form-group">
                        <h5 for="">Nombre corto</h5>
                        <input maxlength="20" required type="text" name="nombre_corto" id="nombre_corto" class="form-control" value="{{old('nombre_corto')}}">
                    </div>

                    <div class="form-group">
                        <h5 for="">Numero de licencia</h5>
                        <input maxlength="20" required type="text" name="licencia" id="licencia" class="form-control" value="{{old('licencia')}}">
                    </div>

                    <div class="form-group">
                        <h5 for="">Vigencia de licencia</h5>
                        <!-- <input type="text" class="form-control" id="datapicker">-->
                        <input type="text" required readonly name="vigencia_licencia" id="vigencia_licencia" class="form-control {{$errors->has('vigencia_licencia')?'is-invalid':''}}" value="{{old('vigencia_licencia')}}">
                        {!! $errors->first('vigencia_licencia','<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group">
                        <h5 for="">Vigencia de examen medico</h5>
                        <input type="text" required readonly name="vigencia_medico" id="vigencia_medico" class="form-control {{$errors->has('vigencia_medico')?'is-invalid':''}}" value="{{old('vigencia_medico')}}">
                        {!! $errors->first('vigencia_medico','<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group">
                        <h5 for="">Telefono de Casa</h5>
                        <input type="number" required maxlength="20" name="telefonoCasa" id="telefonoCasa" class="form-control {{$errors->has('telefonoCasa')?'is-invalid':''}}" value="{{old('telefonoCasa')}}">
                        {!! $errors->first('telefonoCasa','<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group">
                        <h5 for="">Persona de Contacto</h5>
                        <input type="text" maxlength="50" required name="personaContacto" id="personaContacto" class="form-control {{$errors->has('personaContacto')?'is-invalid':''}}" value="{{old('personaContacto')}}">
                        {!! $errors->first('personaContacto','<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group">
                        <h5 for="">Celular</h5>
                        <input type="number" maxlength="20" required name="celular" id="celular" class="form-control {{$errors->has('celular')?'is-invalid':''}}" value="{{old('celular')}}">
                        {!! $errors->first('celular','<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group">
                        <h5 for="">IMSS</h5>
                        <input type="text" maxlength="13" required name="imss" id="imss" class="form-control {{$errors->has('imss')?'is-invalid':''}}" value="{{old('imss')}}">
                        {!! $errors->first('imss','<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group">
                        <h5 for="">RFC</h5>
                        <input type="text" maxlength="13" required name="rfc" id="rfc" class="form-control {{$errors->has('rfc')?'is-invalid':''}}" value="{{old('rfc')}}">
                        {!! $errors->first('rfc','<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group">
                        <h5 for="">Observaciones</h5>
                        <input maxlength="100" type="text" name="obs" id="obs" class="form-control" value="{{old('obs')}}">
                    </div>

                    <button id="guardarOperador" type="submit" class="btn btn-info"><i class="far fa-save"></i> Guardar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{asset('js/operador/operadorCreate.js')}}"></script>
@endsection