<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>@yield('title')</title>
        <link rel="icon" type="favicon/x-icon" href="{{asset("img/supertux.jpg")}}" />
        <link rel="stylesheet" type="text/css" href="{{asset("css/main2.css")}}">
        <script type="text/javascript" src="{{asset("js/jsmain11.js")}}"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="container-fluid mt-2">
            <div class="justify-content-center">
                <header id="header" class="col-md-12">
                    <div class=" justify-content-center">
                        <div id="companyName" class="mb-3">
                            <h1>
                                <a href="{{ url('/main/index/') }}">Sistema de Registro Ganadero</a>
                            </h1>
                        </div> 
                    </div>
                    @yield('header')
                </header>
             
                <div id="container-all" class="wrap col-md-12">
                    @yield('content')
                </div>

                <div class="clearfix"></div>
                @yield('footer')
                <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>

            </div>
        </div>
    </body>
</html>
