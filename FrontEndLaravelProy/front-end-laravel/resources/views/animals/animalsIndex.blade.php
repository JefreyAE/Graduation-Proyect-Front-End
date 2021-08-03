@extends('main.main')
@extends('animals.animals')
@section('animalsIndex')
<section class="frontend row"> 
    @if(!session('message'))
        <h1 class="titulo col-md-12">Listado de {{$type ?? ''}}</h1>
    @endif
    @if(session('message'))
        <h1 class="titulo col-md-12">Listado de animales activos</h1>
        <div class="alert alert-success w-100">
            {{ session('message') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="animals table table-striped table-sm table-hover table-light">
            <thead>
                <tr class="table-primary">
                    <th>Apodo</th>
                    <th>Nombre en certificado</th>
                    <th>Código</th>
                    <th>Fecha de nacimiento</th>
                    <th>Raza</th>
                    <th>Sexo</th>
                    <th>Ver</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($listActive))
                @foreach($listActive as $animal)
                <tr>
                    <td>{{$animal['nickname']}}</td>
                    <td>{{$animal['certification_name']}}</td>
                    <td>{{$animal['code']}}</td>
                    <?php $fecha = explode(' ', $animal['birth_date']) ?>
                    <td>{{explode(' ',$animal['birth_date'])[0]}}</td>
                    <td>{{$animal['race']}}</td>
                    <td>{{$animal['sex']}}</td>
                    <td><a class="btn btn-sm btn-info"  href="{{ url('/animals/detail/'.$animal['id'])}}">Detalle</a></td>
                </tr>
                @endforeach
                @endif
                @if(!empty($listAll))
                @foreach($listAll as $animal)
                <tr>
                    <td>{{$animal['nickname']}}</td>
                    <td>{{$animal['certification_name']}}</td>
                    <td>{{$animal['code']}}</td>
                    <?php $fecha = explode(' ', $animal['birth_date']) ?>
                    <td>{{explode(' ',$animal['birth_date'])[0]}}</td>
                    <td>{{$animal['race']}}</td>
                    <td>{{$animal['sex']}}</td>
                    <td><a class="btn btn-sm btn-info" href="{{ url('/animals/detail/'.$animal['id'])}}">Detalle</a></td>
                </tr>
                @endforeach
                @endif
                @if(!empty($listDead))
                @foreach($listDead as $animal)
                <tr>
                    <td>{{$animal['nickname']}}</td>
                    <td>{{$animal['certification_name']}}</td>
                    <td>{{$animal['code']}}</td>
                    <?php $fecha = explode(' ', $animal['birth_date']) ?>
                    <td>{{explode(' ',$animal['birth_date'])[0]}}</td>
                    <td>{{$animal['race']}}</td>
                    <td>{{$animal['sex']}}</td>
                    <td><a class="btn btn-sm btn-info" href="{{ url('/animals/detail/'.$animal['id'])}}">Detalle</a></td>
                </tr>
                @endforeach
                @endif
            <tbody>
        </table>
    </div>
</section>
@stop