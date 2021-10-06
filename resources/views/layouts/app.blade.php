<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('Credenciales', 'Credenciales') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilonav.css') }}" rel="stylesheet">

    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.dataTables.min.css') }}" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/select2.min.js') }}" defer></script>
    <script src="{{ asset('js/composicion/funciones.js') }}" defer></script>
    <script src="{{ asset('js/cruds/1.9.1-jquery.js') }}"></script>
    <script src="{{ asset('js/cruds/1.9.1-jquery.js') }}"></script>

    <script src="{{ asset('js/jquery.dataTables.min.js') }}" defer></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}" defer></script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-dark bg-dark navbar-expand-md  shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('autoridads') }}">
                    <img src="{{asset('img/icono2.png')}}" class="img-thumbnail" alt="...">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto ">
                        @can('menu.menuregion')
                        <li class="nav-item dropdown  ">
                            <a class="nav-link  dropdown-toggle" data-toggle="dropdown" href="{{route('menuregion')}}" role="button" aria-haspopup="true" aria-expanded="false">TERRITORIO</a>
                            <div class="dropdown-menu" style="background-color: #343A40">
                                @can('departamentos.index')
                                <a class="nav-link" href="{{route('departamentos.index')}} ">DEPARTAMENTOS</a>
                                @endcan
                                @can('provincias.index')
                                <a class="nav-link" href="{{route('provincias.index')}} ">PROVINCIAS</a>
                                @endcan
                                @can('municipios.index')
                                <a class="nav-link" href="{{route('municipios.index')}} ">MUNICIPIOS</a>
                                @endcan
                                @can('municipios.index')
                                <a class="nav-link" href="{{route('nacions.index')}} ">NACIONES Y PUEBLOS INDIGENAS</a>
                                @endcan
                            </div>
                        </li>
                        @endcan
                        @can('menu.menucandidato')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="{{route('menucandidato')}}" role="button" aria-haspopup="true" aria-expanded="false">CANDIDATOS Y AUTORIDADES</a>
                            <div class="dropdown-menu" style="background-color: #343A40">
                                @can('candidatos.index')
                                <a class="nav-link" href="{{route('candidatos.index')}} ">CANDIDATOS</a>
                                @endcan
                                @can('autoridads.index')
                                <a class="nav-link" href="{{route('autoridads.index')}} ">AUTORIDADES</a>
                                @endcan
                                @can('cargos.index')
                                <a class="nav-link" href="{{route('cargos.index')}} ">CARGOS</a>
                                @endcan
                                @can('npiocs.index')
                                <a class="nav-link" href="{{route('npiocs.index')}} ">NPIOC</a>
                                @endcan
                                @can('historico.index')
                                <a class="nav-link" href="{{route('historico.index')}} ">HISTORICO</a>
                                @endcan
                                @can('resolucion.index')
                                <a class="nav-link" href="{{route('resolucion.index')}} ">RESOLUCIÓN</a>
                                @endcan
                                @can('auditorias.index')
                                <a class="nav-link" href="{{route('auditorias.index')}} ">AUDITORIA</a>
                                @endcan
                            </div>
                        </li>
                        @endcan
                        @can('menu.menureporte')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="{{route('menureporte')}}" role="button" aria-haspopup="true" aria-expanded="false">REPORTE MUNICIPIO</a>
                            <div class="dropdown-menu" style="background-color: #343A40">
                                @can('credencial.index')
                                <a class="nav-link" href="{{route('credencial')}} ">CREDENCIALES</a>
                                @endcan
                                @can('composicion.filtros')
                                <a class="nav-link" href="{{route('composicion')}} ">COMPOSICION</a>
                                @endcan
                                @can('antecedentes.filtros')
                                <a class="nav-link" href="{{route('antecedente')}} ">ANTECEDENTES</a>
                                @endcan
                            </div>
                        </li>
                        @endcan
                        @can('menu.menugobernacion')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="{{route('menugober')}}" role="button" aria-haspopup="true" aria-expanded="false">REPORTE GOBERNACION</a>
                            <div class="dropdown-menu" style="background-color: #343A40">
                                <a class="nav-link" href="{{route('credencial_gobernacion')}} ">CREDENCIAL GOBERNACION</a>
                                <a class="nav-link" href="{{route('buscador_composicion_territorio.index')}} ">COMPOSICION POR TERRITORIO</a>
                                <a class="nav-link" href="{{route('buscador_composicion_poblacion.index')}} ">COMPOSICION POR POBLACION</a>
                                <a class="nav-link" href="{{route('credencial_npioc')}} ">CREDENCIAL NPIOC</a>
                                <a class="nav-link" href="{{route('buscador_composicion_npioc.index')}} ">COMPOSICION NPIOC</a>
                            </div>
                        </li>
                        @endcan
                        @can('menu.menurol')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="{{route('menurol')}}" role="button" aria-haspopup="true" aria-expanded="false">ROLES Y USUARIOS</a>
                            <div class="dropdown-menu" style="background-color: #343A40">
                                @can('roles.index')
                                <a class="nav-link" href="{{route('roles.index')}} ">ROLES</a>
                                @endcan
                                @can('users.index')
                                <a class="nav-link" href="{{route('users.index')}} ">USUARIOS</a>
                                @endcan
                                @can('personal.index')
                                <a class="nav-link" href="{{route('personal.index')}} ">PERSONAL TED</a>
                                @endcan
                            </div>
                        </li>
                        @endcan
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
        @yield('js')
    </div>
</body>
</html>