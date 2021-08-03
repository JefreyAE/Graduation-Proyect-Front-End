@extends('main.main')
@extends('incidents.incidents')
@section('incidentsRegister')
<section class="frontend row justify-content-center"> 
    <h1 class="titulo col-md-12">Registro de incidentes</h1>
    <div class="form col-md-8" id='formRegisterIncident'>
        <h2 class="titulo-2">Ingrese los datos del incidente</h2>
        @if(!empty($response))
            @if($response['status']=='success')
                <div class="alert alert-success" role="alert">{{$response['message']}}</div>
            @endif
            @if($response['status'] =='error')
                <div class="alert alert-danger" role="alert">{{$errorMsg}}</div>
            @endif
        @endif
        <form class="form_data" method="POST" action="{{ url('/incidents/create/')}}">
            {{csrf_field()}}
            <div class="mb-3">
                <label class="form-label" for='animal_id'>Seleccione animal:</label>
                <select class="form-control" id="animal_id" name="animal_id" required>
                    @if(!empty($listAnimals))
                        @foreach($listAnimals as $animal)
                            <option value="{{$animal["id"]}}">{{$animal['code'].' '.$animal['nickname'].' '.$animal['certification_name']}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for='incident_date'>Fecha del incidente:</label>
                <input class="form-control" id="incident_date" name="incident_date" type="date" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for='incident_type'>Tipo de incidente:</label>
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
                    <select class="form-control" id="incident_type" name="incident_type" required>
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
            </div>
            <div class="mb-3">
                <label class="form-label" for='description'>Descripción del incidente:</label>
                @if(!empty($response))
                    @if($response['status'] =='error')
                        @if(!empty($response['validationErrors']['description']))
                            @foreach($response['validationErrors']['description'] as $error)
                                <div class='error'>{{$error}}</div>
                            @endforeach
                        @endif
                    @endif
                @endif
                <div>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
            </div>
            <input class="btn btn-success btn-lg btn-block" id="btnRegister" type="submit" value="Registrar">  
        </form>
    </div> 
</section>
@stop