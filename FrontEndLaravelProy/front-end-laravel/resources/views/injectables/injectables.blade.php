@section('title','Módulo Inyectables')
@section('injectables')
    @if(Route::currentRouteName() =='injectables.register'||Route::currentRouteName() =='injectables.create')
        @yield('injectablesRegister')
    @endif 
    @if(Route::currentRouteName() =='injectables.index')
        @yield('injectablesIndex')
    @endif
    @if(Route::currentRouteName() =='injectables.detail')
        @yield('injectablesDetail')
    @endif
@stop