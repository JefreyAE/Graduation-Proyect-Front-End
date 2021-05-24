@extends('main.main')
@extends('animals.animals')
@section('animalsRegister')
<section id="frontend"> 
    <h1 class="titulo">Registro de nacimientos</h1>
    <div class="form" id='formRegisterAnimal'>
        <h2>Ingrese los datos del animal</h2>
        <form class="form_data" method="POST" action="{{ url('/animals/create/')}}">
            {{csrf_field()}}
            <label for='nickname'>Apodo:</label>
            @if(!empty($response))
                @if($response['status'] =='error')
                    @if(!empty($response['validationErrors']['nickname']))
                        @foreach($response['validationErrors']['nickname'] as $error)
                            <div class='error'>{{$error}}</div>
                        @endforeach
                    @endif
                @endif
            @endif
            <div><input id="nickname" name='nickname' type="text"></div>   
            <label for='certification_name'>Nombre de certificación:</label>
            @if(!empty($response))
                @if($response['status'] =='error')
                    @if(!empty($response['validationErrors']['certification_name']))
                        @foreach($response['validationErrors']['certification_name'] as $error)
                            <div class='error'>{{$error}}</div>
                        @endforeach
                    @endif
                @endif
            @endif
            <div><input id="certification_name" name="certification_name" type="text"></div> 
            <label for='registration_number'>Número de registro:</label>
            @if(!empty($response))
                @if($response['status'] =='error')
                    @if(!empty($response['validationErrors']['registration_number']))
                        @foreach($response['validationErrors']['registration_number'] as $error)
                            <div class='error'>{{$error}}</div>
                        @endforeach
                    @endif
                @endif
            @endif
            <div><input id="registration_number" name="registration_number" type="text"></div> 
            <label for='birth_weight'>Peso de nacimiento:</label>
            <select id="birth_weight" name="birth_weight" required></select> 
            <label for='code'>Código de registro:</label>
             @if(!empty($response))
                @if($response['status'] =='error')
                    @if(!empty($response['validationErrors']['code']))
                        @foreach($response['validationErrors']['code'] as $error)
                            <div class='error'>{{$error}}</div>
                        @endforeach
                    @endif
                @endif
            @endif
            <div><input id="code" name="code" type="text" required></div>     
            <label for='birth_date'>Fecha de nacimiento:</label>
            <input id="birth_date" name="birth_date" type="date" required>
            <label for='sex'>Indique el sexo del animal:</label>
            <select id="sex" name="sex" required>
                <option value="Macho" selected>Macho</option>
                <option value="Hembra">Hembra</option>
            </select>
            <label for='father_id'>Seleccione el padre:</label>
            <select id="father_id" name="father_id" required>
                <option value="unknown" selected>Desconocido</option>
                @foreach($animals as $animal)
                    @if($animal['sex'] == 'Macho')
                    <option value="{{$animal["id"]}}">{{$animal['code'].' '.$animal['nickname'].' '.$animal['certification_name']}}</option>
                    @endif
                @endforeach
            </select>
            <label for='mother_id'>Seleccione la madre:</label>
            <select id="mother_id" name="mother_id" required>
                <option value="unknown" selected>Desconocido</option>
                @foreach($animals as $animal)
                    @if($animal['sex'] == 'Hembra' )
                    <option value="{{$animal["id"]}}">{{$animal['code'].' '.$animal['nickname'].' '.$animal['certification_name']}}</option>
                    @endif
                @endforeach
            </select>
            <label for='race'>Indique la raza del animal:</label>
            <select id="race" name="race" required>
                <option value="Brahaman" selected>Brahaman</option>
                <option value="Angus">Simbra</option>
                <option value="Angus">Angus</option>
                <option value="Angus">Simmental</option>
                <option value="Angus">Holstein</option>
                <option value="Angus">Nelore</option>    
                <option value="Angus">Jersey</option>
                <option value="Angus">Pardo Suizo</option>
                <option value="Angus">Charolais</option>
                <option value="Angus">Brandford</option>
            </select>
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