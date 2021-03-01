<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" ></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
    @livewireStyles
</head>
<body>
    
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    ITSX
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  
                    <ul class="navbar-nav mr-auto">
                        
                        @if($pemisoArea || $pemisoAreaUser || Gate::check('roles.index') || Gate::check('cuestionario.asing') || Gate::check('graficos.index') || Gate::check('correos.index') || Gate::check('campus.index'))
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Administrcion</a>
                            <div class="dropdown-menu">
                            <div class="nav-link"><b> General</b></div>
    @if($pemisoAreaUser)      <a class="nav-link" href="{{ route('users.index') }}">Empleados</a>       @endif
    @can('roles.index')       <a class="nav-link" href="{{ route('roles.index') }}">Roles</a>           @endcan
                            <div class="dropdown-divider"></div>
                            <div class="nav-link"><b> Cuestionario</b></div>
    @can('cuestionario.asing')<a class="nav-link" href="{{ route('cuestionario.asignar') }}">Asignar</a>@endcan
    @can('graficos.index')    <a class="nav-link" href="{{ route('graficos.index') }}">Graficos</a>     @endcan
                            <div class="dropdown-divider"></div>
                            <div class="nav-link"><b> Catalogos</b></div>
    @if($pemisoArea)          <a class="nav-link" href="{{ route('areas.index') }}">Areas</a>           @endif
    @can('correos.index')     <a class="nav-link" href="{{ route('correos.index') }}">Correos</a>       @endcan
    @can('campus.index')      <a class="nav-link" href="{{ route('campus.index') }}">Campus</a>         @endcan
                            </div>
                        </li>
                        @endif
                            
                        @guest
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.personal') }}">Datos Personales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cuestionario.resolver') }}">Cuestionario</a>
                        </li>
                        @endguest
                    </ul>

             
                    <ul class="navbar-nav ml-auto">
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
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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

        <main class="py-sm-5">

            @if(session('info'))
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="alert alert-success">
                            {{ session('info')}}
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @yield('content')
            
        </main>
    </div>
    @livewireScripts
    @yield('scrips')
    @stack('scripts')
</body>
</html>
