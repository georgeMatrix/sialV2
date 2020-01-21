@extends('layouts.app')
@section('content')
    <div class="container">
        @include('include.menu')
        <div class=" card bg-dark">
            <div class="row">
                <div class="col-md-9 card-title">
                    <h3 style="font-size: 20pt;" class="mt-3 text-center text-white"><i class="fa fa-user-circle fa-md text-danger"></i> NUEVO USUARIOS</h3>
                </div>
                <div class="col-md-3">
                    <a href="{{route('usuarios.index')}}" class="mt-3 mr-3 btn btn-info float-right"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('usuarios.store')}}" method="post" id="formUsuario">
                    {{csrf_field()}}
                    @if(empty($id->id))
                        <input type="hidden" value="1" name="id">
                    @else
                        <input type="hidden" value="{{$id->id+1}}" name="id">
                    @endif
                    <div class="form-group">
                        <h5>Apellido Paterno</h5>
                        <input maxlength="20" required type="text" name="apellidoPaterno" id="apellidoPaterno" class="form-control">
                    </div>

                    <div class="form-group">
                        <h5>Apellido Materno</h5>
                        <input maxlength="20" required type="text" name="apellidoMaterno" id="apellidoMaterno" class="form-control">
                    </div>

                    <div class="form-group">
                        <h5>Nombre</h5>
                        <input maxlength="50" required type="text" name="nombre" id="nombre" class="form-control ">
                    </div>

                    <div class="form-group">
                        <h5>E-mail</h5>
                        <input maxlength="50" required type="text" name="email" id="email" class="form-control ">
                    </div>

                    <div class="form-group">
                        <h5>Password</h5>
                        <input maxlength="8" required type="password" name="password" id="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <h5>Nombre Corto</h5>
                        <input maxlength="20" required type="text" name="nombreCorto" id="nombreCorto" class="form-control">
                    </div>

                    <div class="form-group">
                        <h5>Cargo del usuario</h5>
                        <input maxlength="20" required type="text" name="cargo" id="cargo" class="form-control">
                    </div>

                    <div class="form-group">
                        <h5>Area</h5>
                        <input maxlength="20" required type="text" name="area" id="area" class="form-control">
                    </div>

                    <div class="form-group">
                        <h5>Catalogos</h5>
                        <br>
                        <input data-toggle="toggle" type="checkbox" id="modulo01" name="modulo01" value="1" @if(old('modulo01') ==  1) checked="checked" @endif />
                    </div>

                    <div class="form-group">
                        <h5>Rutas</h5>
                        <br>
                        <input data-toggle="toggle" type="checkbox" id="modulo02" name="modulo02" value="1" @if(old('modulo02') ==  1) checked="checked" @endif />
                    </div>

                    <div class="form-group">
                        <h5>Carta porte</h5>
                        <br>
                        <input data-toggle="toggle" type="checkbox" id="modulo03" name="modulo03" value="1" @if(old('modulo03') ==  1) checked="checked" @endif />
                    </div>

                    <div class="form-group">
                        <h5>Facturacion</h5>
                        <br>
                        <input data-toggle="toggle" type="checkbox" id="modulo04" name="modulo04" value="1" @if(old('modulo04') ==  1) checked="checked" @endif />
                    </div>

                    <div class="form-group">
                        <h5>Modulo05</h5>
                        <br>
                        <input data-toggle="toggle" type="checkbox" id="modulo05" name="modulo05" value="1" @if(old('modulo05') ==  1) checked="checked" @endif />
                    </div>

                    <div class="form-group">
                        <h5>Modulo06</h5>
                        <br>
                        <input data-toggle="toggle" type="checkbox" id="modulo06" name="modulo06" value="1" @if(old('modulo06') ==  1) checked="checked" @endif />
                    </div>

                    <div class="form-group">
                        <h5>Modulo07</h5>
                        <br>
                        <input data-toggle="toggle" type="checkbox" id="modulo07" name="modulo07" value="1" @if(old('modulo07') ==  1) checked="checked" @endif />
                    </div>

                    <div class="form-group">
                        <h5>Modulo08</h5>
                        <br>
                        <input data-toggle="toggle" type="checkbox" id="modulo08" name="modulo08" value="1" @if(old('modulo08') ==  1) checked="checked" @endif />
                    </div>

                    <div class="form-group">
                        <h5>Modulo09</h5>
                        <br>
                        <input data-toggle="toggle" type="checkbox" id="modulo09" name="modulo09" value="1" @if(old('modulo09') ==  1) checked="checked" @endif />
                    </div>

                    <div class="form-group">
                        <h5>Modulo10</h5>
                        <br>
                        <input data-toggle="toggle" type="checkbox" id="modulo10" name="modulo10" value="1" @if(old('modulo10') ==  1) checked="checked"  @endif />
                    </div>

                    <button id="guardarUsuario" type="submit" class="btn btn-info">Guardar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{asset('js/usuario/usuarioCreate.js')}}"></script>
@endsection