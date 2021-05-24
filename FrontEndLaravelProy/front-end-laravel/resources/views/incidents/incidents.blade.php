@section('title','Módulo Incidentes')
@section('incidents')
    @if(Route::currentRouteName() == 'incidents.register' || Route::currentRouteName() =='incidents.create')
        @yield('incidentsRegister')
    @endif 
    @if(Route::currentRouteName() == 'incidents.index')
        @yield('incidentsIndex')
    @endif
@stop