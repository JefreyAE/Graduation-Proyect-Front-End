@extends('main.main')
@extends('injectables.injectables')
@section('injectablesRegister')
<section class="frontend row justify-content-center"> 
    <h1 class="titulo col-md-12">Registro de inyectables</h1>
    <div class="form col-md-8" id='formRegisterInjectable'>
        <h2 class="titulo-2">Ingrese los datos del injectable aplicado</h2>
        @if(!empty($response))
            @if($response['status']=='success')
                <div class="alert alert-success" role="alert">{{$response['message']}}</div>
            @endif
            @if($response['status'] =='error')
                <div class="alert alert-danger" role="alert">{{$errorMsg}}</div>
            @endif
        @endif
        <form class="form_data" method="POST" action="{{ url('/injectables/create/')}}">
            {{csrf_field()}}
            <div class="mb-3">
                <label class="form-label" for='animal_id'>Seleccione animal:</label>
                <select class="form-control" id="animal_id" name="animal_id" required>
                    <option value="all" selected>Aplicar a todos</option>
                    @if(!empty($listAnimals))
                        @foreach($listAnimals as $animal)
                            <option value="{{$animal["id"]}}">{{$animal['code'].' '.$animal['nickname'].' '.$animal['certification_name']}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for='injectable_type'>Tipo de injectable:</label>
                <select class="form-control" id="injectable_type" name="injectable_type" required>
                    <option value="Antibiótico" selected>Antibiótico</option>
                    <option value="Desparasitante">Desparasitante</option>
                    <option value="Vitaminas">Vitaminas</option>
                    <option value="Inmuno Estimulante">Estimulante inmunológico</option>
                    <option value="Hormonas">Hormonas</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for='application_date'>Fecha de aplicación:</label>
                @if(!empty($response))
                    @if($response['status'] =='error')
                        @if(!empty($response['validationErrors']['application_date']))
                            @foreach($response['validationErrors']['application_date'] as $error)
                                <div class='error'>{{$error}}</div>
                            @endforeach
                        @endif
                    @endif
                @endif
                <div>
                    <input class="form-control" id="application_date" name="application_date" type="date" required>
                </div>  
            </div>
            <div class="mb-3">
                <label class="form-label" for='injectable_name'>Nombre del inyectable:</label>
                @if(!empty($response))
                    @if($response['status'] =='error')
                        @if(!empty($response['validationErrors']['injectable_name']))
                            @foreach($response['validationErrors']['injectable_name'] as $error)
                                <div class='error'>{{$error}}</div>
                            @endforeach
                        @endif
                    @endif
                @endif
                <div>
                    <input class="form-control" id="injectable_name" name="injectable_name" type="text" required>
                </div> 
            </div>
            <div class="mb-3">
                <label class="form-label" for='injectable_brand'>Marca del inyectable:</label>
                @if(!empty($response))
                    @if($response['status'] =='error')
                        @if(!empty($response['validationErrors']['injectable_brand']))
                            @foreach($response['validationErrors']['injectable_brand'] as $error)
                                <div class='error'>{{$error}}</div>
                            @endforeach
                        @endif
                    @endif
                @endif
                <div>
                    <input class="form-control" id="injectable_brand" name="injectable_brand" type="text">
                </div>  
            </div>
            <div class="mb-3">   
                <label class="form-label" for='withdrawal_time'>Periodo de retiro:</label>
                <select class="form-control" id="withdrawal_time" name="withdrawal_time" required>
                    <option value="8" selected>8</option>
                    <option value="15">15 días</option>
                    <option value="22">22 días</option>
                    <option value="30">30 días - 1 mes</option>
                    <option value="60">60 días - 2 mes</option>
                    <option value="90">90 días - 3 mes</option>
                    <option value="120">120 días - 4 mes</option>
                    <option value="150">150 días - 5 mes</option>
                    <option value="180">180 días - 6 mes</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for='effective_time'>Periodo de efectividad:</label>
                <select class="form-control" id="effective_time" name="effective_time" required>
                    <option value="8" selected>8</option>
                    <option value="15">15 días</option>
                    <option value="22">22 días</option>
                    <option value="30">30 días - 1 mes</option>
                    <option value="60">60 días - 2 mes</option>
                    <option value="90">90 días - 3 mes</option>
                    <option value="120">120 días - 4 mes</option>
                    <option value="150">150 días - 5 mes</option>
                    <option value="180">180 días - 6 mes</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for='description'>Descripción del producto:</label>
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