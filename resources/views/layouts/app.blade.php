<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} 🚗 @yield("title")</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}  | 🚗
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @auth
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item class {{ Request::is("home") ? "active" : "" }}"><a class="nav-link" href="{{ url('home') }}" accesskey="1">Kezdőlap</a></li>
                    <li class="nav-item dropdown">
                        <a href="#" class="dropdown-toggle nav-link {{ Request::routeIs("cars2.*") ? "active" : "" }}" data-toggle="dropdown">
                            Autók listája <span class="caret"></span>
                        </a>
                        </a>

                        <ul class="dropdown-menu" role="listbox">
                            <li><a href="{{ route('cars2.create') }}" class="dropdown-item {{ Request::routeIs("cars2.create") ? "active" : "" }}" role="option" accesskey="2">Új autó rögzítése</a></li>
                            <li><a href="{{ route('cars2.index') }}" class="dropdown-item {{ Request::routeIs("cars2.index") ? "active" : "" }}" role="option" accesskey="4" >Autók listázása</a></li>
                        </ul>
                    </li>
                    @can("edit_forum")

                    <li class="nav-item dropdown">
                        <a href="#lala" class="dropdown-toggle nav-link {{ Request::routeIs("user.*") ? "active" : "" }}" data-toggle="dropdown">
                            Munkatársak <span class="caret"></span>
                        </a>
                        </a>

                        <ul class="dropdown-menu" role="listbox">
                            <li><a href="{{ route('user.index') }}" class="dropdown-item {{ Request::routeIs("user.index") ? "active" : "" }}" role="option"  accesskey="5">Munkatársak listázása</a></li>
                        </ul>
                    </li>
                    @endcan
                    @endauth
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Bejelentkezés</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Regisztráció</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route("user.edit", Auth :: user()->id)}}" accesskey="6">Adataim módosítása</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" accesskey="7"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Kijelentkezés
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Tartalom | eleje -->
    <main class="py-4">
        @yield('content')
    </main>
    <!-- Tartalom | vége -->
</div>
<!-- Lábléc | eleje -->
<footer>
        <p class="text-center text-muted">
            ©{{ now()->year }} - Minden jog fenntartva!
        </p>
</footer>
<!-- Lábléc | vége -->
</body>
</html>
