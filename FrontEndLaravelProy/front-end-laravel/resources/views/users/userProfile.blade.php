@extends('main.main')
@extends('users.user')
@section('userProfile')
    <section class="frontend row justify-content-center"> 
    <h1 class="titulo col-md-12">Cambio de contraseña</h1>
    <div class="form col-md-8" id='formUpdateUser'>
        <h2 class="titulo-2">Formulario de cambio de correo y contraseña</h2>
        @if(!empty($error))
            <div class="alert alert-danger" role="alert">{{$error}}</div>
        @endif
        @if(!empty($message))
            <div class="alert alert-success" role="alert">{{$message}}</div>
        @endif
        <form class="form_data" method="POST" action="{{action('UserController@update')}}">
            {{csrf_field()}}
            <div class="mb-3">
                <label class="form-label" for="passwordCurrent">Ingrese su contraseña actual:</label>
                <div><input class="form-control" id="passwordCurrent" name="passwordCurrent" type="password" placeholder="Contraseña actual"   autocomplete="off" required></div>
                @if(!empty($listErrors['passwordCurrent']))
                    @foreach($listErrors['passwordCurrent'] as $error)
                        <div class='error'>{{$error}}</div>
                    @endforeach
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label" for="password1">Ingrese su nueva contraseña:</label>
                <div><input class="form-control" id="password1" name="password1" type="password" placeholder="Nueva contraseña"  autocomplete="off" required></div>
                @if(!empty($listErrors['password1']))
                    @foreach($listErrors['password1'] as $error)
                        <div class='error'>{{$error}}</div>
                    @endforeach
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label" for="password2">Repita su nueva contraseña:</label>
                <div><input class="form-control" id="password2" name="password2" type="password" placeholder="Ingrese nuevamente la contraseña"  autocomplete="off" required></div>
            </div>
            <label class="form-label" class="message" type="hidden"></label>
            
            <input id="btnChangePassword" class="btn btn-danger btn-lg btn-block" type="submit" value="Cambiar contraseña">  
            <!--<a href="#" class="link">Registrarse</a>-->
        </form>
    </div> 
</section>
@stop