<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Agregande Angular JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.min.js"></script>
    
    <script src="{{ asset('js/myApp.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="https://use.fontawesome.com/9ac82a5638.js"></script>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SGE</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('#') }}">
                        SGE
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->

                         
                                   
                        <li><a href="" title=""></a></li>
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">

                                    {{ Auth::user()->nombre }} <span class="caret"></span>

                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    {{-- Menu para usuario diferente --}}
                                        @if (Route::has('login'))
                                        
                                            @auth
                                                        @if(Auth::user()->tipo == '1')
                                                            <li><a href="{{ url('/home') }}">Home</a>
                                                            </li>
                                                            <li><a href="{{ url('/home') }}">Calificaciones</a>
                                                            </li>
                                                            <li><a href="{{ url('/home') }}">Horarios</a>
                                                            </li>

                                                        @elseif(Auth::user()->tipo == '2')
                                                           <li><a href="{{ url('/docente/home') }}">Calificaciones</a>
                                                            </li>
                                                        @else
                                                            <li><a href="{{ url('alumno') }}">Alumno</a>
                                                            </li>
                                                            <li><a href="{{ url('docente') }}">Docentes</a>
                                                            </li>
                                                            <li><a href="{{ url('materia') }}">Materias</a>
                                                            </li>
                                                            <li><a href="{{ url('salon') }}">Salones</a>
                                                            </li>
                                                            <li><a href="{{ url('grado') }}">Grados</a>
                                                            </li>
                                                            
                                                        @endif

                                            
                                            @endauth
                                         @endif
                                    


                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
