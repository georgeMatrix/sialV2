@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">MENU PRINCIPAL</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @include('include.menu')
                        <div class="table-responsive">
                        <table class="table table-hover table-sm">
                            <thead>
                            <th><h1>Seccion</h1></th>
                            <th><h1>Listado</h1></th>
                            <th><h1>Nuevo</h1></th>
                            </thead>
                            <tr>
                                <td><h2>Cliente</h2></td>
                                <td><a href="{{route('clientes.index')}}" class="btn btn-info btn-block">Listado Clientes</a></td>
                                <td><a href="{{route('clientes.create')}}" class="btn btn-info btn-block">Nuevo Cliente</a></td>
                            </tr>
                            <tr>
                                <td><h2>Operadores</h2></td>
                                <td><a href="{{route('operadores.index')}}" class="btn btn-info btn-block">Listado Operadores</a></td>
                                <td><a href="{{route('operadores.create')}}" class="btn btn-info btn-block">Nuevo Operador</a></td>
                            </tr>
                            <tr>
                                <td><h2>Provedores</h2></td>
                                <td><a href="{{route('provedores.index')}}" class="btn btn-info btn-block">Listado Provedores</a></td>
                                <td><a href="{{route('provedores.create')}}" class="btn btn-info btn-block">Nuevo Provedor</a></td>
                            </tr>
                            <tr>
                                <td><h2>Rutas</h2></td>
                                <td><a href="{{route('rutas.index')}}" class="btn btn-info btn-block">Listado Rutas</a></td>
                                <td><a href="{{route('rutas.create')}}" class="btn btn-info btn-block">Nuevas Rutas</a></td>
                            </tr>
                            <tr>
                                <td><h2>Unidades</h2></td>
                                <td><a href="{{route('unidades.index')}}" class="btn btn-info btn-block">Listado Unidades</a></td>
                                <td><a href="{{route('unidades.create')}}" class="btn btn-info btn-block">Nueva Unidad</a></td>
                            </tr>
                            <tr>
                                <td><h2>Usuarios</h2></td>
                                <td><a href="{{route('usuarios.index')}}" class="btn btn-info btn-block">Listado Usuarios</a></td>
                                <td><a href="{{route('usuarios.create')}}" class="btn btn-info btn-block">Nuevos Usuarios</a></td>
                            </tr>

                            <tr>
                                <td><h2>Carta Porte</h2></td>
                                <td><a href="{{route('cartaPorte.index')}}" class="btn btn-info btn-block">Listado Carta Porte</a></td>
                                <td><a href="{{route('cartaPorte.create')}}" class="btn btn-info btn-block">Nueva Carta Porte</a></td>
                            </tr>
                        </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
