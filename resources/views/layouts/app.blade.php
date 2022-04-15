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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <div class="sidebar">
            @guest
            @if (Route::has('login'))
            <a href="{{ route('login') }}"><i class="fa-fw p-5">Login</a>
            @endif

            @if (Route::has('register'))
            <a href="{{ route('register') }}"><i class="fa-fw ">Register</a>
            @endif
            @else
            <a href="/home"><i class="fa-fw fa-dashboard"></i> Home</a>
            <a href="{{route('companies.index')}}"><i class="fa-fw fa-user"></i> Manage Companies</a>
            <a href="{{route('employees.index')}}"><i class="fa-fw fa-home"></i> Manage Employees</a>
            <div class="">
                <a class="fa fa-fw " href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            @endguest
        </div>
        <div class="main">
            @yield('content')
        </div>
    </div>
</body>
</html>