@extends('layouts.app')
@section('content')
    <div class="container">
        @include('include.menu')
        <div class="card bg-dark">
            <div class="row">
                <div class="col-md-9 card-title">
                    <h3 style="font-size: 20pt;" class="mt-3 text-center text-white"><i class=" text-danger far fa-id-card"></i> ACTUALIZACION OPERADOR</h3>
                </div>
                <div class="col-md-3">
                    <a href="{{route('operadores.index')}}" class="mt-3 mr-3 btn btn-info float-right"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form action="{{url('/operadores/'.$operador->id)}}" method="post">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <h5 for="">Apellido paterno</h5>
                    <input maxlength="20" required type="text" name="apellido_paterno" id="apellido_paterno" class="form-control" value="{{$operador->apellido_paterno}}">
                    <h5 for="">Apellido materno</h5>
                    <input maxlength="20" required type="text" name="apellido_materno" id="apellido_materno" class="form-control"  value="{{$operador->apellido_materno}}">
                    <h5 for="">Nombres</h5>
                    <input maxlength="50" required type="text" name="nombres" id="nombres" class="form-control"  value="{{$operador->nombres}}">
                    <h5 for="">Nombre corto</h5>
                    <input maxlength="20" required type="text" name="nombre_corto" id="nombre_corto" class="form-control"  value="{{$operador->nombre_corto}}">
                    <h5 for="">Numero de licencia</h5>
                    <input maxlength="20" required type="text" name="licencia" id="licencia" class="form-control"  value="{{$operador->licencia}}">
                    <h5 for="">Vigencia de licencia</h5>
                    <input type="text" readonly required name="vigencia_licencia" id="vigencia_licencia" class="form-control"  value="{{$operador->vigencia_licencia}}">
                    <h5 for="">Vigencia de examen medico</h5>
                    <input type="text" readonly required name="vigencia_medico" id="vigencia_medico" class="form-control"  value="{{$operador->vigencia_medico}}">
                    <h5 for="">Telefono de Casa</h5>
                    <input type="number" required maxlength="20" name="telefonoCasa" id="telefonoCasa" class="form-control" value="{{$operador->telefonoCasa}}">
                    <h5 for="">Persona de Contacto</h5>
                    <input type="text" maxlength="50" required name="personaContacto" id="personaContacto" class="form-control" value="{{$operador->personaContacto}}">
                    <h5 for="">Celular</h5>
                    <input type="number" maxlength="20" required name="celular" id="celular" class="form-control" value="{{$operador->celular}}">
                    <h5 for="">IMSS</h5>
                    <input type="text" maxlength="13" required name="imss" id="imss" class="form-control" value="{{$operador->imss}}">
                    <h5 for="">RFC</h5>
                    <input type="text" maxlength="13" required name="rfc" id="rfc" class="form-control" value="{{$operador->rfc}}">
                    <h5 for="">Observaciones</h5>
                    <input maxlength="100" required type="text" name="obs" id="obs" class="form-control"  value="{{$operador->obs}}">
                    <br>
                    <button type="submit" class="btn btn-info"><i class="far fa-edit"></i> Actualizar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{asset('js/operador/operadorEdit.js')}}"></script>
@endsection