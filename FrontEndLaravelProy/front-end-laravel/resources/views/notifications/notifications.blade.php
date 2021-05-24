@section('title','Módulo Notificaciones')
@section('notifications') 
    @if(Route::currentRouteName() == 'main.index' || Route::currentRouteName() == 'notifications.index'||Route::currentRouteName() == 'notifications.indexAll'||Route::currentRouteName() == 'notifications.checked'||Route::currentRouteName() == 'notifications.state')
        @yield('notificationsIndex')
    @endif  
@stop