@section('title','404')
@section('errors')
    @if(Route::currentRouteName() == 'errors.errorPage404')
        @yield('errorPage404')
    @endif 
@stop