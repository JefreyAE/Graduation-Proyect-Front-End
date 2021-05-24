@section('title','Módulo Ventas')
@section('sales')
    @if(Route::currentRouteName() =='sales.register'||Route::currentRouteName() =='sales.create')
        @yield('salesRegister')
    @endif 
    @if(Route::currentRouteName() =='sales.index')
        @yield('salesIndex')
    @endif
    @if(Route::currentRouteName() =='sales.detail')
        @yield('salesDetail')
    @endif
    @if(Route::currentRouteName() =='sales.search' || Route::currentRouteName() =='sales.find')
        @yield('salesSearch')
    @endif
@stop