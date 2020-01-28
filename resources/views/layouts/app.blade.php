<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-primary bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="fas fa-pizza-slice"></i> {{ config('app.name', 'Panel administrativo de pizzas') }}
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
                        @auth
                            <b-dropdown text="{{ Auth::user()->name }}" split split-variant="outline-primary" variant="primary">
                                <b-dropdown-item href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</b-dropdown-item>
                            </b-dropdown>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center" >
                    @auth
                    <div class="col-md-3">
                        <b-list-group>
                            <b-list-group-item><b-link href="#foo"> <i class="fas fa-pizza-slice"></i> Pizzas</b-link></b-list-group-item>
                            <b-list-group-item><b-link href="#foo"> <i class="fab fa-houzz"></i>Sucursales</b-link></b-list-group-item>
                            <b-list-group-item><b-link href="#foo"> <i class="fas fa-users"></i>Clientes</b-link></b-list-group-item>
                            <b-list-group-item><b-link href="#foo"><i class="fab fa-first-order"></i> Ordenes de Pizzas</b-link></b-list-group-item>
                        </b-list-group>
                    </div>
                    @endauth
                    <div class="col-md-9">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
