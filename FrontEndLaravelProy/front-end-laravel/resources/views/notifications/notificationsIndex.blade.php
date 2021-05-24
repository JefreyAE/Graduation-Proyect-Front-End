@extends('main.main')
@extends('notifications.notifications')
@section('notificationsIndex')
    <section id="frontend"> 
        <h1 class="titulo">Listado de {{$type ?? 'notificaciones activas'}}</h1>
        <div class="list">
            <table class="table" > 
                @if(!empty($listActive))
                    <tr>
                        <th>Fecha de la notificación</th>
                        <th>Tipo de notificación</th>
                        <th>Estado</th>
                        <th>Descripción</th> 
                        <th>Ver el detalle</th> 
                        <th>Modificar estado</th>
                    </tr>
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
                @endif
                @if(!empty($listAll))
                    <tr>
                        <th>Fecha de la notificación</th>
                        <th>Tipo de notificación</th>
                        <th>Estado</th>
                        <th>Descripción</th> 
                        <th>Ver el detalle</th> 
                        <th>Modificar estado</th>
                    </tr>
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
                @endif
                @if(!empty($listChecked))
                    <tr>
                        <th>Fecha de la notificación</th>
                        <th>Tipo de notificación</th>
                        <th>Estado</th>
                        <th>Descripción</th> 
                        <th>Ver el detalle</th> 
                        <th>Estado</th>
                    </tr>
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
               @endif
            </table>
        </div>
    </section>
@stop