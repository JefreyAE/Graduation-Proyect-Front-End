@extends('layouts.master')

@section('title','Login')

@section('content')
    {{$titulo ?? ''}}
    
    <div class="form" id='formLogin'>
        <h2>Ingrese su correo y contraseña.</h2>
        <form method="POST" id="formLog" action="{{action('UserController@login')}}">
            {{csrf_field()}}
            @if(!empty($listErrors['email']))
                @foreach($listErrors['email'] as $error)
                    <div class='error'>{{$error}}</div>
                @endforeach
            @endif
            <div><input id="email" name='email' type="email" placeholder="correo"required></div>
            @if(!empty($listErrors['password']))
                @foreach($listErrors['password'] as $error)
                    <div class='error'>{{$error}}</div>
                @endforeach
            @endif
            <div><input id="password" name="password" type="password" placeholder="contraseña" required></div> 
            @if(!empty($message))
                <div class='error'>{{$message}}</div>
            @endif
            <input type="submit" id="btnLogin" value="Ingresar">  
            <!--<a href="#" class="link">Registrarse</a>-->
        </form>
    </div>   
@stop
@section('footer')
    <div class="clearfix"></div>
    @include('includes.footer')
@stop