@extends('main.main')
@extends('sales.sales')
@section('salesSearch')
    <section class="frontend row justify-content-center"> 
        <h1 class="titulo col-md-12">Consulta de ventas por fecha</h1>
        <div class="form  col-md-8" id='formSearchSale'>
            <h2 class="titulo-2">Ingrese el rango de fechas de las ventas</h2>
            <form class="form_data" method="POST" action="{{ url('/sales/find/')}}">
                {{csrf_field()}}
                <div class="mb-3">
                    <label class="form-label" for='date1'>Ingrese la fecha inicial:</label>
                    <input  class="form-control" id="date1" name="date1" type="date" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for='date2'>Ingrese la ficha final:</label>
                    <input class="form-control" id="date2" name="date2" type="date" required>
                </div>
                <input id="btnSearch"  class="btn btn-success btn-lg btn-block" type="submit" value="Buscar">  
            </form>
        </div> 
    </section>
    @if(!empty($noData))
        <section class="frontend row justify-content-center"> 
            <h1 class="titulo">No se encontraron resultados</h1>
        </section>
    @endif
    @if(!empty($listSales))
    <section class="frontend row justify-content-center"> 
        
        <h1 class="titulo col-md-12">Listado de ventas</h1>
        @include('sales.includes.salesList')

    </section>
    @endif
@stop