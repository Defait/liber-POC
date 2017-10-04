<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body class="blue-grey">
    <div class="container">
        <nav>
            <div class="nav-wrapper blue-grey darken-3">
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="left hide-on-med-and-down">
                    <li><a href="{{ route('chapter.index') }}">Home</a></li>
                    <li><a href="{{ route('series.index') }}">Series</a></li>
                </ul>
                @if(Auth::check())
                    <ul class="right hide-on-med-and-down">
                        <li><a href="{{ url('/') }}">{{Auth::user()->username}}</a></li>
                    </ul>
                @else
                    <ul class="right hide-on-med-and-down">
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    </ul>
                @endif
                <ul class="side-nav" id="mobile-demo">
                    <li><a href="{{ route('chapter.index') }}">Home</a></li>
                    <li><a href="{{ route('series.index') }}">Series</a></li>
                    @if(Auth::check())
                        <li><a href="{{ url('/') }}">{{Auth::user()->username}}</a></li>
                    @else
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @endif
                </ul>
            </div>
        </nav>
        

        @yield('content')

        <script>  
            $(document).ready(function() {
                $(".button-collapse").sideNav();
            });
        </script>
    </div>
</body>
</html