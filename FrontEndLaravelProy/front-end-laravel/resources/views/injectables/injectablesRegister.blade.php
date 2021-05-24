@extends('main.main')
@extends('injectables.injectables')
@section('injectablesRegister')
<section id="frontend"> 
    <h1 class="titulo">Registro de inyectables</h1>
    <div class="form" id='formRegisterInjectable'>
        <h2>Ingrese los datos del injectable aplicado</h2>
        <form class="form_data" method="POST" action="{{ url('/injectables/create/')}}">
            {{csrf_field()}}
            <label for='animal_id'>Seleccione animal:</label>
            <select id="animal_id" name="animal_id" required>
                <option value="all" selected>Aplicar a todos</option>
                @if(!empty($listAnimals))
                    @foreach($listAnimals as $animal)
                        <option value="{{$animal["id"]}}">{{$animal['code'].' '.$animal['nickname'].' '.$animal['certification_name']}}</option>
                    @endforeach
                @endif
            </select>
            <label for='injectable_type'>Tipo de injectable:</label>
            <select id="injectable_type" name="injectable_type" required>
                <option value="Antibiótico" selected>Antibiótico</option>
                <option value="Desparasitante">Desparasitante</option>
                <option value="Vitaminas">Vitaminas</option>
                <option value="Inmuno Estimulante">Estimulante inmunológico</option>
                <option value="Hormonas">Hormonas</option>
                <option value="Otro">Otro</option>
            </select>
            <label for='application_date'>Fecha de aplicación:</label>
            @if(!empty($response))
                @if($response['status'] =='error')
                    @if(!empty($response['validationErrors']['application_date']))
                        @foreach($response['validationErrors']['application_date'] as $error)
                            <div class='error'>{{$error}}</div>
                        @endforeach
                    @endif
                @endif
            @endif
            <div><input id="application_date" name="application_date" type="date" required></div>  
            <label for='injectable_name'>Nombre del inyectable:</label>
            @if(!empty($response))
                @if($response['status'] =='error')
                    @if(!empty($response['validationErrors']['injectable_name']))
                        @foreach($response['validationErrors']['injectable_name'] as $error)
                            <div class='error'>{{$error}}</div>
                        @endforeach
                    @endif
                @endif
            @endif
            <div><input id="injectable_name" name="injectable_name" type="text" required></div> 
            <label for='injectable_brand'>Marca del inyectable:</label>
             @if(!empty($response))
                @if($response['status'] =='error')
                    @if(!empty($response['validationErrors']['injectable_brand']))
                        @foreach($response['validationErrors']['injectable_brand'] as $error)
                            <div class='error'>{{$error}}</div>
                        @endforeach
                    @endif
                @endif
            @endif
            <div><input id="injectable_brand" name="injectable_brand" type="text"></div>     
            <label for='withdrawal_time'>Periodo de retiro:</label>
            <select id="withdrawal_time" name="withdrawal_time" required>
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
            <label for='effective_time'>Periodo de efectividad:</label>
            <select id="effective_time" name="effective_time" required>
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
            <label for='description'>Descripción del producto:</label>
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