@extends('main.main')
@extends('injectables.injectables')
@section('injectablesIndex')
    <section id="frontend"> 
        <h1 class="titulo">Listado de inyectables aplicados</h1>
        <div class="list">
            <table class="table" >
                <tr>
                    <th>Tipo</th>
                    <th>Animal</th>
                    <th>Fecha de aplicación</th>
                    <th>Nombre del producto</th>
                    <!--<th>Marca</th>-->
                    <th>Código</th>
                    <th>Periodo de retiro (días)</th>
                    <th>Tiempo de efectividad (días)</th>
                    <th>Descripción</th>
                    <!--<th>Ver</th>-->
                </tr>
                @if(!empty($listInjectables))
                    @foreach($listInjectables as $injectable)
                    <tr>
                        <td>{{$injectable['injectable_type']}}</td>
                        <td><a href="{{ url('/animals/detail/'.$injectable['animal_id'])}}">{{$injectable['code'].'-'.$injectable['nickname'].'-'.$injectable['certification_name']}}</a></td>
                        <?php //$fecha = explode(' ',$injectable['application_date'])?>
                        <td>{{explode(' ',$injectable['application_date'])[0]}}</td>
                        <td>{{$injectable['injectable_name']}}</td>
                        <!--<td>{{$injectable['injectable_brand']}}</td>-->
                        <td>{{$injectable['creation_time']}}</td>
                        <td>{{$injectable['withdrawal_time']}}</td>
                        <td>{{$injectable['effective_time']}}</td>
                        <td>{{$injectable['description']}}</td>
                        <!--<td><a href="{{ url('/animals/detail/'.$injectable['animal_id'])}}">Animal</a></td>-->
                    </tr>
                    @endforeach
                @endif
             
            </table>
        </div>
    </section>
@stop