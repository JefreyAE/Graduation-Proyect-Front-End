<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>@yield('title')</title>
        <link rel="icon" type="favicon/x-icon" href="{{asset("img/supertux.jpg")}}" />
        <link rel="stylesheet" type="text/css" href="{{asset("css/main.css")}}">
        <script type="text/javascript" src="{{asset("js/jsmain.js")}}"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <header id="header">
            <div id="companyName">
                <h1>
                    <a href="{{ url('/main/index/') }}">Ganadería LOVE de la Suerte S.A</a>
                </h1>
            </div>
            <h1>
                <a href="{{ url('/main/index/') }}">Sistema de Registro Ganadero</a>
            </h1>
            @yield('header')
        </header>

        <div class="wrap">
            @yield('content')
        </div>
        
        <div class="clearfix"></div>
        @yield('footer')
    </body>
</html>
