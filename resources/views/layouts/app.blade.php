<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('elections.index') }}">
                                Pemilihan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('voters.index') }}">
                                Pemilih terdaftar
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Organisasi
                            </a>
                        </li>
                    </ul>
                    @endauth

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Masuk</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Daftar</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.users') }}">
                                    <i class="fas fa-shield-alt"></i> Administrator
                                </a>
                            </li>
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

        <main class="py-3">
            @yield('content')
        </main>

        <footer>
            <div class="bg-dark text-white py-5">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="d-flex flex-column flex-md-row justify-content-between">
                                <div class="mb-3 mb-md-0">
                                    &copy; 2019 KamaruYogiru.
                                </div>
                                <div>
                                    <ul class="mb-3 mb-md-0 list-unstyled d-flex flex-column flex-md-row">
                                        <li class="mr-3">
                                            <a class="text-decoration-none text-white" href="#">Tentang</a>
                                        </li>
                                        <li class="mr-3">
                                            <a class="text-decoration-none text-white" href="#">Syarat & Ketentuan</a>
                                        </li>
                                        <li class="mr-3">
                                            <a class="text-decoration-none text-white" href="#">Privasi</a>
                                        </li>
                                        <li>
                                            <a class="text-decoration-none text-white" href="#">Kontak</a>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <ul class="m-0 list-unstyled">
                                        <li>
                                            <a class="text-decoration-none text-white" href="https://github.com/kamaruyogiru" target="_blank">
                                                <i class="fab fa-github fa-2x"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
