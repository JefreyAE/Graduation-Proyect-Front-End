@extends('main.main')
@extends('notifications.notifications')
@section('notificationsIndex')
@if(!empty($userName))
<h1 id="welcome" class="row">
    Bienvenid@:  {{$userName ?? ''}}
</h1>
@endif
<section id="frontend" class="row"> 
    <h1 class="titulo col-md-12">Listado de {{$type ?? 'notificaciones activas'}}</h1>
    <div class="table-responsive">
        <table class="table table-striped table-sm table-hover table-light"> 
            @if(!empty($listActive))
            <thead>
                <tr class="table-primary">
                    <th align="center" scope="col">Fecha de la notificación</th>
                    <th scope="col">Tipo de notificación</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Descripción</th> 
                    <th scope="col">Ver el detalle</th> 
                    <th scope="col">Modificar estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listActive as $notification)
                <tr>
                    <td>{{explode(' ',$notification['notification_date'])[0]}}</td>
                    <td>{{$notification['notification_type']}}</td>
                    <td>{{$notification['notification_state']}}</td>
                    <td>{{$notification['description']}}</td>      
                    @if($notification['notification_type']=='Destete')
                    <td><a href="{{ url('/animals/detail/'.$notification['code'])}}">Ver animal</a></td>
                    @endif
                    @if($notification['notification_type']=='Injectable')
                    <td><a href="{{ url('/injectables/injectable/detail/'.$notification['code'])}}">Ver inyectable</a></td>
                    @endif

                    <td><a href="{{ url('/notifications/state/'.$notification['id'])}}">Marcar como visto</a></td>
                </tr>
                @endforeach
            </tbody>
            @endif
            @if(!empty($listAll))
            <thead>
                <tr class="table-primary">
                    <th>Fecha de la notificación</th>
                    <th>Tipo de notificación</th>
                    <th>Estado</th>
                    <th>Descripción</th> 
                    <th>Ver el detalle</th> 
                    <th>Modificar estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listAll as $notification)
                <tr>
                    <td>{{explode(' ',$notification['notification_date'])[0]}}</td>
                    <td>{{$notification['notification_type']}}</td>
                    <td>{{$notification['notification_state']}}</td>
                    <td>{{$notification['description']}}</td>           
                    @if($notification['notification_type']=='Destete')
                    <td><a href="{{ url('/animals/detail/'.$notification['code'])}}">Ver animal</a></td>
                    @endif
                    @if($notification['notification_type']=='Injectable')
                    <td><a href="{{ url('/injectables/injectable/detail/'.$notification['code'])}}">Ver inyectable</a></td>
                    @endif
                    @if($notification['notification_state']=='Active')
                    <td><a href="{{ url('/notifications/state/'.$notification['id'])}}">Marcar como visto</a></td>
                    @endif
                    @if($notification['notification_state']=='Checked')
                    <td>Vista</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
            @endif
            @if(!empty($listChecked))
            <thead>
                <tr class="table-primary">
                    <th>Fecha de la notificación</th>
                    <th>Tipo de notificación</th>
                    <th>Estado</th>
                    <th>Descripción</th> 
                    <th>Ver el detalle</th> 
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listChecked as $notification)
                <tr>
                    <td>{{explode(' ',$notification['notification_date'])[0]}}</td>
                    <td>{{$notification['notification_type']}}</td>
                    <td>{{$notification['notification_state']}}</td>
                    <td>{{$notification['description']}}</td>   
                    @if($notification['notification_type']=='Destete')
                    <td><a href="{{ url('/animals/detail/'.$notification['code'])}}">Ver animal</a></td>
                    @endif
                    @if($notification['notification_type']=='Injectable')
                    <td><a href="{{ url('/injectables/injectable/detail/'.$notification['code'])}}">Ver inyectable</a></td>
                    @endif
                    @if($notification['notification_state']=='Checked')
                    <td>Vista</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
            @endif
        </table>
    </div>
</section>
@stop