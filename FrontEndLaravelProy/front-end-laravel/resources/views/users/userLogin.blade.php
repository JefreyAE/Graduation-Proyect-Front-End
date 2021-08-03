@extends('layouts.master')

@section('title','Login')

@section('content')
    {{$titulo ?? ''}}
    <div class="row">
        <div class="form col-lg-4" id='formLogin'>
            <h2>Ingrese sus credenciales</h2>
            <form method="POST" id="formLog" action="{{action('UserController@login')}}">
                {{csrf_field()}}
                @if(!empty($listErrors['email']))
                    @foreach($listErrors['email'] as $error)
                        <div class='error'>{{$error}}</div>
                    @endforeach
                @endif
                <div class="mb-3">
                    <label class="form-label">Correo Electrónico:</label>
                    <input class="form-control" id="email" name='email' type="email" placeholder="@"required>
                </div>
                @if(!empty($listErrors['password']))
                    @foreach($listErrors['password'] as $error)
                        <div class='error'>{{$error}}</div>
                    @endforeach
                @endif
                <div class="mb-3">
                    <label class="form-label">Contraseña:</label>
                    <input class="form-control" id="password" name="password" type="password" placeholder="Contraseña" required>
                </div> 
                @if(!empty($message))
                    <div class='error'>{{$message}}</div>
                @endif
                <input type="submit" class="btn btn-success" id="btnLogin" value="Ingresar">  
                <!--<a href="#" class="link">Registrarse</a>-->
            </form>
        </div> 
    </div>  
@stop
@section('footer')
    <div class="clearfix"></div>
    @include('includes.footer')
@stop