@extends('layouts.master')

@section('title','Inicio')

@section('header')
    @include('includes.header')
@stop

@section('content')
    <div class="clearfix"></div>
    <div id="content">
        <div id="sectionCentral">
            @if(Request::is('animals/*'))
                @yield('animals')
            @endif 
            @if(Request::is('injectables/*'))
                @yield('injectables')
            @endif 
            @if(Request::is('incidents/*'))
                @yield('incidents')
            @endif
            @if(Request::is('sales/*'))
                @yield('sales')
            @endif
            @if(Request::is('purchases/*'))
                @yield('purchases')
            @endif
            @if(Request::is('notifications/*'))
                @yield('notifications')
            @endif
            @if(Request::is('user/*'))
                @yield('user')
            @endif
            @if(Request::is('main/index'))
                @yield('mainIndex')
            @endif
        </div>  
    </div>
    <div class="clearfix"></div>
@stop
@section('footer')
    <div class="clearfix"></div>
    @include('includes.footer')
@stop