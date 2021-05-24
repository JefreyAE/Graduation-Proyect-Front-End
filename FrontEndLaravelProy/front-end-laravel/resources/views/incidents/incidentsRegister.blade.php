@extends('main.main')
@extends('incidents.incidents')
@section('incidentsRegister')
<section id="frontend"> 
    <h1 class="titulo">Registro de incidentes</h1>
    <div class="form" id='formRegisterIncident'>
        <h2>Ingrese los datos del incidente</h2>
        <form class="form_data" method="POST" action="{{ url('/incidents/create/')}}">
            {{csrf_field()}}
            <label for='animal_id'>Seleccione animal:</label>
            <select id="animal_id" name="animal_id" required>
                @if(!empty($listAnimals))
                    @foreach($listAnimals as $animal)
                        <option value="{{$animal["id"]}}">{{$animal['code'].' '.$animal['nickname'].' '.$animal['certification_name']}}</option>
                    @endforeach
                @endif
            </select>
            <label for='incident_date'>Fecha del incidente:</label>
            <input id="incident_date" name="incident_date" type="date" required>
            <label for='incident_type'>Tipo de incidente:</label>
             @if(!empty($response))
                @if($response['status'] =='error')
                    @if(!empty($response['validationErrors']['incident_type']))
                        @foreach($response['validationErrors']['incident_type'] as $error)
                            <div class='error'><{{$error}}</div>
                        @endforeach
                    @endif
                @endif
            @endif
            <div>
                <select id="incident_type" name="incident_type" required>
                    <option value="Aborto" selected>Aborto</option>
                    <option value="Herida abierta">Herida abierta</option>
                    <option value="Muerte">Muerte</option>
                    <option value="Infección">Infección</option>
                    <option value="RenqueraVivo">RenqueraVivo</option>
                    <option value="Rechazado por la madre">Rechazado por la madre</option>
                    <option value="Muerte de la madre">Muerte de la madre</option>
                    <option value="Gabarros">Gabarros</option>
                    <option value="Tórsalos">Torzalos</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
            <label for='description'>Descripción del incidente:</label>
            @if(!empty($response))
                @if($response['status'] =='error')
                    @if(!empty($response['validationErrors']['description']))
                        @foreach($response['validationErrors']['description'] as $error)
                            <div class='error'>{{$error}}</div>
                        @endforeach
                    @endif
                @endif
            @endif
            <div><textarea id="description" name="description"></textarea></div>
            @if(!empty($response))
                @if($response['status']=='success')
                    <div class='success final'>{{$response['message']}}</div>
                @endif
                @if($response['status'] =='error')
                    <div class='error final'>{{$errorMsg}}</div>
                @endif
            @endif
            <input id="btnRegister" type="submit" value="Registrar">  
            
        </form>
    </div> 
</section>
@stop