@extends('main.main')
@section('mainIndex')
    <h1 id="welcome">
        Bienvenid@:  {{$userName ?? ''}}
    </h1>
    @if(!empty($listActive))
        <section id="frontend"> 
            <h1 class="titulo">Tienes las siguentes notificaciones activas</h1>
            <div class="list">
                <table class="table" >
                    <tr>
                        <th>Fecha de la notificación</th>
                        <th>Tipo de notificación</th>
                        <th>Estado</th>
                        <th>Descripción</th> 
                        <th>Ver el detalle</th> 
                        <th>Modificar estado</th>
                    </tr>
                    @if(!empty($listActive))
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
                </table>
            </div>
        </section>
    @endif
    <div id="imgContainer">
        <img id="slider" name="slider">
        <!--<img id="img1" src="{{asset("img/1.jpeg")}}">-->
        <!--<img id="img2" src="{{asset("img/2.jpeg")}}">-->
    </div>
    
@stop