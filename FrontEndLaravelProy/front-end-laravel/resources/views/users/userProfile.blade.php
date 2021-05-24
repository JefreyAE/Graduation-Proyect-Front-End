@extends('main.main')
@extends('users.user')
@section('userProfile')
    <section id="frontend"> 
    <h1 class="titulo">Cambio de contraseña</h1>
    <div class="form" id='formUpdateUser'>
        <h2>Formulario de cambio de correo y contraseña</h2>
        <form class="form_data" method="POST" action="{{action('UserController@update')}}">
            {{csrf_field()}}
            <label for="email">Ingrese su nuevo correo:</label>
            <div><input id="email" name="email" type="email" placeholder="Nuevo correo" autocomplete="off" required></div>
            @if(!empty($listErrors['email']))
                @foreach($listErrors['email'] as $error)
                    <div class='error'>{{$error}}</div>
                @endforeach
            @endif
            <label for="email2">Repita su nuevo correo:</label>
            <div><input id="email2" name="email2" type="email2" placeholder="Ingrese nuevamente el correo" autocomplete="off" required></div>
            @if(!empty($listErrors['email2']))
                @foreach($listErrors['email2'] as $error)
                    <div class='error'>{{$error}}</div>
                @endforeach
            @endif
            <label for="passwordCurrent">Ingrese su contraseña actual:</label>
            <div><input id="passwordCurrent" name="passwordCurrent" type="password" placeholder="Contraseña actual"   autocomplete="off" required></div>
            @if(!empty($listErrors['passwordCurrent']))
                @foreach($listErrors['passwordCurrent'] as $error)
                    <div class='error'>{{$error}}</div>
                @endforeach
            @endif
            <label for="password1">Ingrese su nueva contraseña:</label>
            <div><input id="password1" name="password1" type="password" placeholder="Nueva contraseña"  autocomplete="off" required></div>
            @if(!empty($listErrors['password1']))
                @foreach($listErrors['password1'] as $error)
                    <div class='error'>{{$error}}</div>
                @endforeach
            @endif
            <label for="password2">Repita su nueva contraseña:</label>
            <div><input id="password2" name="password2" type="password" placeholder="Ingrese nuevamente la contraseña"  autocomplete="off" required></div>
            <label class="message" type="hidden"></label>
            @if(!empty($error))
                <div class='error'>{{$error}}</div>
            @endif
            @if(!empty($message))
                    <div class='success'>{{$message}}</div>
            @endif
            <input type="submit" value="Ingresar">  
            <!--<a href="#" class="link">Registrarse</a>-->
        </form>
    </div> 
</section>
@stop