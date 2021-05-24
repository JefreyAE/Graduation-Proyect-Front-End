@section('title','Módulo Inyectables')
@section('injectables')
    @if(Route::currentRouteName() =='injectables.register'||Route::currentRouteName() =='injectables.create')
        @yield('injectablesRegister')
    @endif 
    @if(Route::currentRouteName() =='injectables.index' || Route::currentRouteName() =='injectables.detail')
        @yield('injectablesIndex')
    @endif
@stop