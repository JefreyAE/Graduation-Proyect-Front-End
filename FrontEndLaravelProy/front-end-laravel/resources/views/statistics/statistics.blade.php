@section('title','Módulo de estadísticas')
@section('statistics')
    @if(Route::currentRouteName() =='statistics.index')
        @yield('statisticsIndex')
    @endif 
    @if(Route::currentRouteName() =='statistics.auctions')
        @yield('statisticsAuctions')
    @endif 
@stop