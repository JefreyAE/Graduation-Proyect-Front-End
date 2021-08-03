@extends('main.main')
@extends('incidents.incidents')
@section('incidentsIndex')
    <section class="frontend row"> 
        <h1 class="titulo col-md-12">Listado de incidentes</h1>
        @if(session('message'))
            <div class="alert alert-success w-100">
                {{ session('message') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger w-100">
                {{ session('error') }}
            </div>
        @endif
        <div class="table-responsive">
            <table class="animals purchases table table-striped table-sm table-hover table-light" >
                <thead>
                    <tr class="table-primary">
                        <th>Tipo</th>
                        <th>Animal</th>
                        <th>Fecha del incidente</th>
                        <th>Descripción</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($listIncidents))
                        @foreach($listIncidents as $incident)
                        <tr>
                            <td>{{$incident['incident_type']}}</td>
                            <td><a href="{{ url('/animals/detail/'.$incident['animal_id'])}}">{{$incident['code'].'-'.$incident['nickname'].'-'.$incident['certification_name']}}</a></td>
                            <?php //$fecha = explode(' ',$injectable['application_date'])?>
                            <td>{{explode(' ',$incident['incident_date'])[0]}}</td>
                            <td>{{$incident['description']}}</td>
                            <td><a id="btnDeleteRegister" class="btn btn-sm btn-danger buttonsTable" href="{{ url('incidents/incident/delete-one/' . $incident['incident_id'] . '/' . $incident['animal_id'] .'/' . '1') }}">Borrar</a></td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </section>
@stop