@extends('main.main')
@extends('incidents.incidents')
@section('incidentsIndex')
    <section id="frontend"> 
        <h1 class="titulo">Listado de incidentes</h1>
        <div class="list">
            <table class="table" >
                <tr>
                    <th>Tipo</th>
                    <th>Animal</th>
                    <th>Fecha del incidente</th>
                    <th>Descripción</th>
                    <!--<th>Ver</th>-->
                </tr>
                @if(!empty($listIncidents))
                    @foreach($listIncidents as $incident)
                    <tr>
                        <td>{{$incident['incident_type']}}</td>
                        <td><a href="{{ url('/animals/detail/'.$incident['animal_id'])}}">{{$incident['code'].'-'.$incident['nickname'].'-'.$incident['certification_name']}}</a></td>
                        <?php //$fecha = explode(' ',$injectable['application_date'])?>
                        <td>{{explode(' ',$incident['incident_date'])[0]}}</td>
                        <td>{{$incident['description']}}</td>
                        <!--<td>Detalle</td>-->
                    </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </section>
@stop