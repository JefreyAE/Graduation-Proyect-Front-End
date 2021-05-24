@section('title','Cuenta')
@section('user')
    @if(Route::currentRouteName() =='user.update' || Route::currentRouteName() =='user.profile')
        @yield('userProfile')
    @endif 
@stop