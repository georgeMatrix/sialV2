@extends('layouts.app')
@section('content')
    <div class="container">
        @include('include.menu')
        <div class="row">
            <div class="col-md-12 text-center">
                <img height="700px" src="{{asset('img/noAutorizado.png')}}" alt="">
            </div>
        </div>
    </div>
@endsection