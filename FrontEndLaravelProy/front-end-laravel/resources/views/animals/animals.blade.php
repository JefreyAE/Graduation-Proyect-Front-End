@section('title','Módulo Animales')
@section('animals')
    @if(Route::currentRouteName() =='animals.register'||Route::currentRouteName() =='animals.create')
        @yield('animalsRegister')
    @endif 
    @if(Route::currentRouteName() =='animals.index'||Route::currentRouteName() =='animals.dead'||Route::currentRouteName() =='animals.indexAll')
        @yield('animalsIndex')
    @endif
    @if(Route::currentRouteName() =='animals.detail')
        @yield('animalsDetail')
    @endif
    @if(Route::currentRouteName() =='animals.search'||Route::currentRouteName() =='animals.find')
        @yield('animalsSearch')
    @endif
@stop