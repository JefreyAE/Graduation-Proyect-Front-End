@extends('main.main')
@extends('sales.sales')
@section('salesIndex')
    <section class="frontend row justify-content-center"> 
        <h1 class="titulo col-md-12">Listado de ventas</h1>
        @if(session('message'))
            <div class="alert alert-success w-100">
                {{ session('message') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger w-100">
                {{ session('error') }}
            </div>
        @endif

        @include('sales.includes.salesList')
        
    </section>
@stop