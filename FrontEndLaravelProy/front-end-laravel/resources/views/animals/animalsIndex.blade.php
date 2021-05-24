@extends('main.main')
@extends('animals.animals')
@section('animalsIndex')
    <section id="frontend"> 
        <h1 class="titulo">Listado de {{$type ?? ''}}</h1>
        <div class="list">
            <table class="table">
                <tr>
                    <th>Apodo</th>
                    <th>Nombre en certificado</th>
                    <th>Número de registro</th>
                    <th>Código</th>
                    <th>Fecha de nacimiento</th>
                    <th>Raza</th>
                    <th>Sexo</th>
                    <th>Estado</th>
                    <th>Ver</th>
                </tr>
                @if(!empty($listActive))
                    @foreach($listActive as $animal)
                    <tr>
                        <td>{{$animal['nickname']}}</td>
                        <td>{{$animal['certification_name']}}</td>
                        <td>{{$animal['registration_number']}}</td>
                        <td>{{$animal['code']}}</td>
                        <?php $fecha = explode(' ',$animal['birth_date'])?>
                        <td>{{explode(' ',$animal['birth_date'])[0]}}</td>
                        <td>{{$animal['race']}}</td>
                        <td>{{$animal['sex']}}</td>
                        <td>{{$animal['animal_state']}}</td>
                        <td><a href="{{ url('/animals/detail/'.$animal['id'])}}">Detalle</a></td>
                    </tr>
                    @endforeach
                @endif
                @if(!empty($listAll))
                    @foreach($listAll as $animal)
                    <tr>
                        <td>{{$animal['nickname']}}</td>
                        <td>{{$animal['certification_name']}}</td>
                        <td>{{$animal['registration_number']}}</td>
                        <td>{{$animal['code']}}</td>
                        <?php $fecha = explode(' ',$animal['birth_date'])?>
                        <td>{{explode(' ',$animal['birth_date'])[0]}}</td>
                        <td>{{$animal['race']}}</td>
                        <td>{{$animal['sex']}}</td>
                        <td>{{$animal['animal_state']}}</td>
                        <td><a href="{{ url('/animals/detail/'.$animal['id'])}}">Detalle</a></td>
                    </tr>
                    @endforeach
                @endif
                @if(!empty($listDead))
                   @foreach($listDead as $animal)
                   <tr>
                       <td>{{$animal['nickname']}}</td>
                       <td>{{$animal['certification_name']}}</td>
                       <td>{{$animal['registration_number']}}</td>
                       <td>{{$animal['code']}}</td>
                       <?php $fecha = explode(' ',$animal['birth_date'])?>
                       <td>{{explode(' ',$animal['birth_date'])[0]}}</td>
                       <td>{{$animal['race']}}</td>
                       <td>{{$animal['sex']}}</td>
                       <td>{{$animal['animal_state']}}</td>
                       <td><a href="{{ url('/animals/detail/'.$animal['id'])}}">Detalle</a></td>
                   </tr>
                   @endforeach
               @endif
            </table>
        </div>
    </section>
@stop