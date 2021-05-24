@section('title','Módulo Compras')
@section('purchases')
    @if(Route::currentRouteName() =='purchases.register'||Route::currentRouteName() =='purchases.create')
        @yield('purchasesRegister')
    @endif 
    @if(Route::currentRouteName() =='purchases.index')
        @yield('purchasesIndex')
    @endif
    @if(Route::currentRouteName() =='purchases.detail')
        @yield('purchasesDetail')
    @endif
    @if(Route::currentRouteName() =='purchases.search' || Route::currentRouteName() =='purchases.find')
        @yield('purchasesSearch')
    @endif
@stop