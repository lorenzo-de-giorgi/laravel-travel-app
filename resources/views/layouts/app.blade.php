<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'My Travel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">

        <nav>
            <a href="{{ url('/') }}">
                <div class="mt-nav">
                    <div class="container">
                        <nav class="d-flex justify-content-between align-items-center">
                            <img src="../../img/logo.png" alt="logo" id="mt-logo">
                            <ul class="list-unstyled d-flex">
                                <!-- Authentication Links -->
                                @guest
                                <li class="mt-3 me-2">
                                    <a class="mt-delete" href="{{ route('login') }}">{{ __('Accedi') }}</a>
                                </li>
                                @if (Route::has('register'))
                                <li class="mt-3">
                                    <a class="mt-delete" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                                </li>
                                @endif
                                @else
                                <li class="nav-item dropdown mt-3">
                                    <a id="navbarDropdown" class="mt-a-nav dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ url('dashboard') }}">{{__('Dashboard')}}</a>
                                        <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profile')}}</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                @endguest
                            </ul>
                        </nav>
                    </div>
                </div>
            </a>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>
</body>

</html>
