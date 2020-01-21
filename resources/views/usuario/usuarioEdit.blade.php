@extends('layouts.app')
@section('content')
    <div class="container">
        @include('include.menu')
        <div class="card bg-dark">
            <div class="row">
                <div class="col-md-9 card-title">
                    <h3 style="font-size: 20pt;" class="mt-3 text-center text-white"><i class="fa fa-user-circle fa-md text-danger"></i> ACTUALIZACION USUARIOS</h3>
                </div>
                <div class="col-md-3">
                    <a href="{{route('usuarios.index')}}" class="mt-3 mr-3 btn btn-info float-right"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{url('/usuarios/'.$usuario->id)}}" method="post">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <h5 for="">Apellido Paterno</h5>
                <input maxlength="20" type="text" name="apellidoPaterno" id="apellidoPaterno" class="form-control" value="{{$usuario->apellidoPaterno}}">
                <h5 for="">Apellido Materno</h5>
                <input maxlength="20" type="text" name="apellidoMaterno" id="apellidoMaterno" class="form-control"  value="{{$usuario->apellidoMaterno}}">
                <h5 for="">Nombre</h5>
                <input maxlength="50" type="text" name="nombre" id="nombre" class="form-control"  value="{{$usuario->name}}">
                <h5>E-mail</h5>
                <input maxlength="50" type="text" name="email" id="email" class="form-control " value="{{$usuario->email}}">
                <h5 for="">Password</h5>
                <input maxlength="8" type="password" name="password" id="password" class="form-control"  value="{{$usuario->password}}">
                <h5 for="">Nombre Corto</h5>
                <input maxlength="20" type="text" name="nombreCorto" id="nombreCorto" class="form-control"  value="{{$usuario->nombreCorto}}">
                <h5 for="">Cargo del usuario</h5>
                <input maxlength="20" type="text" name="cargo" id="cargo" class="form-control"  value="{{$usuario->cargo}}">
                <h5 for="">Area del cargo</h5>
                <input maxlength="20" type="text" name="area" id="area" class="form-control"  value="{{$usuario->area}}">
                <br>
                <div class="form-group">
                    <label>Catalogos</label>
                    <div class="checkbox">
                        <input type="checkbox" id="modulo01_1"/>
                    </div>
                </div>
                <input type="hidden" name="modulo01" id="modulo01" value="1" />

                <div class="form-group">
                    <label>Rutas</label>
                    <div class="checkbox">
                        <input type="checkbox" id="modulo02_2"/>
                    </div>
                </div>
                <input type="hidden" name="modulo02" id="modulo02" value="1" />

                <div class="form-group">
                    <label>Carta porte</label>
                    <div class="checkbox">
                        <input type="checkbox" id="modulo03_3"/>
                    </div>
                </div>
                <input type="hidden" name="modulo03" id="modulo03" value="1" />

                <div class="form-group">
                    <label>Facturacion</label>
                    <div class="checkbox">
                        <input type="checkbox" id="modulo04_4"/>
                    </div>
                </div>
                <input type="hidden" name="modulo04" id="modulo04" value="1" />

                <div class="form-group">
                    <label>Usuarios</label>
                    <div class="checkbox">
                        <input type="checkbox" id="modulo05_5"/>
                    </div>
                </div>
                <input type="hidden" name="modulo05" id="modulo05" value="1" />

                <div class="form-group">
                    <label>Modulo06</label>
                    <div class="checkbox">
                        <input type="checkbox" id="modulo06_6"/>
                    </div>
                </div>
                <input type="hidden" name="modulo06" id="modulo06" value="1"/>

                <div class="form-group">
                    <label>Modulo07</label>
                    <div class="checkbox">
                        <input type="checkbox" id="modulo07_7"/>
                    </div>
                </div>
                <input type="hidden" name="modulo07" id="modulo07" value="1" />

                <div class="form-group">
                    <label>Modulo08</label>
                    <div class="checkbox">
                        <input type="checkbox" id="modulo08_8"/>
                    </div>
                </div>
                <input type="hidden" name="modulo08" id="modulo08" value="1" />

                <div class="form-group">
                    <label>Modulo09</label>
                    <div class="checkbox">
                        <input type="checkbox" id="modulo09_9"/>
                    </div>
                </div>
                <input type="hidden" name="modulo09" id="modulo09" value="1" />

                <div class="form-group">
                    <label>Modulo10</label>
                    <div class="checkbox">
                        <input type="checkbox" id="modulo10_10"/>
                    </div>
                </div>
                <input type="hidden" name="modulo10" id="modulo10" value="1" />

                <!-- CAMPOS ESCONDIDOS -->
                <input type="hidden" value="{{$usuario->modulo01}}" id="moduloUno">
                <input type="hidden" value="{{$usuario->modulo02}}" id="moduloDos">
                <input type="hidden" value="{{$usuario->modulo03}}" id="moduloTres">
                <input type="hidden" value="{{$usuario->modulo04}}" id="moduloCuatro">
                <input type="hidden" value="{{$usuario->modulo05}}" id="moduloCinco">
                <input type="hidden" value="{{$usuario->modulo06}}" id="moduloSeis">
                <input type="hidden" value="{{$usuario->modulo07}}" id="moduloSiete">
                <input type="hidden" value="{{$usuario->modulo08}}" id="moduloOcho">
                <input type="hidden" value="{{$usuario->modulo09}}" id="moduloNueve">
                <input type="hidden" value="{{$usuario->modulo10}}" id="moduloDiez">
                <!-- CAMPOS ESCONDIDOS -->


                <button type="submit" class="btn btn-info">Actualizar</button>
            </form>
        </div>
    </div>
    </div>
    <script src="{{asset('js/usuario/usuarioEdit.js')}}"></script>
@endsection