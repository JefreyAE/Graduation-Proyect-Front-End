@extends('main.main')
@extends('animals.animals')
@section('animalsRegister')
<section class="frontend row justify-content-center"> 
    <h1 class="titulo col-md-12">Registro de nacimientos</h1>
    <div class="form col-md-8" id='formRegisterAnimal'>
        <h2 class="titulo-2">Ingrese los datos del animal</h2>
        @if(!empty($response))
            @if($response['status']=='success')
                <div class="alert alert-success" role="alert">{{$response['message']}}</div>
            @endif
            @if($response['status'] =='error')
                <div class="alert alert-danger" role="alert">{{$errorMsg}}</div>
            @endif
        @endif
        <form class="form_data" method="POST" action="{{ url('/animals/create/')}}">
            {{csrf_field()}}
            <div class="mb-3">
                <label class="form-label" for='nickname'>Apodo:</label>
                @if(!empty($response))
                    @if($response['status'] =='error')
                        @if(!empty($response['validationErrors']['nickname']))
                            @foreach($response['validationErrors']['nickname'] as $error)
                                <div class='error'>{{$error}}</div>
                            @endforeach
                        @endif
                    @endif
                @endif
                <div>
                    <input class="form-control" id="nickname" name='nickname' type="text">
                </div>  
            </div> 
            <div class="mb-3">
                <label class="form-label" for='certification_name'>Nombre de certificación:</label>
                @if(!empty($response))
                    @if($response['status'] =='error')
                        @if(!empty($response['validationErrors']['certification_name']))
                            @foreach($response['validationErrors']['certification_name'] as $error)
                                <div class='error'>{{$error}}</div>
                            @endforeach
                        @endif
                    @endif
                @endif
                <div>
                    <input class="form-control" id="certification_name" name="certification_name" type="text">
                </div> 
            </div>
            <div class="mb-3">
                <label class="form-label" for='registration_number'>Número de registro:</label>
                @if(!empty($response))
                    @if($response['status'] =='error')
                        @if(!empty($response['validationErrors']['registration_number']))
                            @foreach($response['validationErrors']['registration_number'] as $error)
                                <div class='error'>{{$error}}</div>
                            @endforeach
                        @endif
                    @endif
                @endif
                <div>
                    <input class="form-control" id="registration_number" name="registration_number" type="text">
                </div>
            </div> 
            <div class="mb-3">
                <label class="form-label" for='birth_weight'>Peso de nacimiento:</label>
                <select class="form-control" id="birth_weight" name="birth_weight" required></select> 
            </div>
            <div class="mb-3">
                <label class="form-label" for='code'>Código de registro:</label>
                @if(!empty($response))
                    @if($response['status'] =='error')
                        @if(!empty($response['validationErrors']['code']))
                            @foreach($response['validationErrors']['code'] as $error)
                                <div class='error'>{{$error}}</div>
                            @endforeach
                        @endif
                    @endif
                @endif
                <div>
                    <input class="form-control" id="code" name="code" type="text" required>
                </div>     
            </div>
            <div class="mb-3">
                <label  class="form-label" for='birth_date'>Fecha de nacimiento:</label>
                <input class="form-control" id="birth_date" name="birth_date" type="date" required>
            </div>
            <div class="mb-3">
                <label  class="form-label" for='sex'>Indique el sexo del animal:</label>
                <select class="form-control" id="sex" name="sex" required>
                    <option value="Macho" selected>Macho</option>
                    <option value="Hembra">Hembra</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for='father_id'>Seleccione el padre:</label>
                <select class="form-control" id="father_id" name="father_id" required>
                    <option value="unknown" selected>Desconocido</option>
                    @foreach($animals as $animal)
                        @if($animal['sex'] == 'Macho')
                        <option value="{{$animal["id"]}}">{{$animal['code'].' '.$animal['nickname'].' '.$animal['certification_name']}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for='mother_id'>Seleccione la madre:</label>
                <select class="form-control" id="mother_id" name="mother_id" required>
                    <option value="unknown" selected>Desconocido</option>
                    @foreach($animals as $animal)
                        @if($animal['sex'] == 'Hembra' )
                        <option value="{{$animal["id"]}}">{{$animal['code'].' '.$animal['nickname'].' '.$animal['certification_name']}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for='race'>Indique la raza del animal:</label>
                <select class="form-control" id="race" name="race" required>
                    <option value="Brahaman" selected>Brahaman</option>
                    <option value="Simbra">Simbra</option>
                    <option value="Angus">Angus</option>
                    <option value="Simmental">Simmental</option>
                    <option value=">Holstein">Holstein</option>
                    <option value="Nelore">Nelore</option>    
                    <option value="Jersey">Jersey</option>
                    <option value="Pardo Suizo">Pardo Suizo</option>
                    <option value="Charolais">Charolais</option>
                    <option value="Brandford">Brandford</option>
                </select>
            </div>
            <input class="btn btn-success btn-lg btn-block" id="btnRegister" type="submit" value="Registrar">  
        </form>
    </div> 
</section>
@stop