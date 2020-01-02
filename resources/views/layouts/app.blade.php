<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Logiexpress-sial</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>

    <!-- ICO -->
    <link rel="shortcut icon" href="{{asset('robocop.icon')}}">

    <!-- Datapicker -->
    <script src="{{asset('js/dataPicker/bootstrap-datepicker.js')}}"></script>

    <!-- switch -->
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.4.0/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.4.0/js/bootstrap4-toggle.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('fontawesome-free-5.9.0-web/css/all.min.css')}}">

    <!-- Menu lateral -->
    <link rel="stylesheet" href="{{asset('css/menu_lateral/icon-menu.css')}}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/dataPicker/bootstrap-datepicker.standalone.css')}}">
    <link rel="stylesheet" href="{{asset('css/dataPicker/bootstrap-datepicker3.css')}}">

    <!-- tabs -->
    <link rel="stylesheet" href="{{asset('css/tabs/tabs.css')}}">

    <!-- collapse -->
    <link rel="stylesheet" href="{{asset('css/collapse/collapse.css')}}">

    <!-- SweetAlert 2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <!-- DataTimePicker -->
    <script type="text/javascript" src="{{asset('datetimepicker/build/jquery.datetimepicker.full.js')}}"></script>
    <link rel="stylesheet" href="{{asset('datetimepicker/build/jquery.datetimepicker.min.css')}}">

    <!-- DataTables -->
    <script src="{{asset('datatables/datatables.js')}}"></script>
    <link rel="stylesheet" href="{{asset('datatables/datatables.css')}}">
    <!-- CheckBox Datatables -->
    <!--<link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/css/dataTables.checkboxes.css" rel="stylesheet" />
    <script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/js/dataTables.checkboxes.min.js"></script>-->
    <style>
        .content-loader tr td {
            white-space: nowrap;
        }
    </style>

    <link rel="stylesheet" href="{{asset('loader/css/styles.css')}}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    S I A L
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Cerrar Sesión
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
        @yield('scripts')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                // Disable caching of AJAX responses
                cache: false
            });
        })
    </script>
</body>
</html>
