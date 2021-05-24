@extends('main.main')
@extends('sales.sales')
@section('salesSearch')
    <section id="frontend"> 
        <h1 class="titulo">Consulta de ventas por fecha</h1>
        <div class="form" id='formSearchSale'>
            <h2>Ingrese el rango de fechas de las ventas</h2>
            <form class="form_data" method="POST" action="{{ url('/sales/find/')}}">
                {{csrf_field()}}
                
                <label for='date1'>Ingrese la fecha inicial:</label>
                <input id="date1" name="date1" type="date" required>
                <label for='date2'>Ingrese la ficha final:</label>
                <input id="date2" name="date2" type="date" required>
                
                <input id="btnSearch" type="submit" value="Buscar">  
            </form>
        </div> 
    </section>
     @if(!empty($noData))
        <section id="frontend"> 
        <h1 class="titulo">No se encontraron resultados</h1>
        </section>

    @endif
    @if(!empty($listSales))
    <section id="frontend"> 
        <h1 class="titulo">Listado de ventas</h1>
        <div class="list">
            <table class="table">
                <tr>
                    <th>Animal</th>
                    <th>Tipo de venta</th>
                    <th>Fecha de la venta</th>
                    <th>Peso del animal</th>
                    <th>Monto de la venta</th>
                    <th>Precio por kilogramo</th>
                    <th>Comisión de subasta (%)</th>
                    <th>Nombre de la subasta</th>
                    <th>Sexo</th>
                    <th>Descripcion</th>
                    <th>Ver</th>
                </tr>
                @foreach($listSales as $sale)
                <tr>
                    <td>{{$sale['code'].' '.$sale['nickname'].' '.$sale['certification_name']}}</td>
                    <td>{{$sale['sale_type']}}</td>
                    <?php $fecha = explode(' ',$sale['sale_date'])?>
                    <td>{{explode(' ',$sale['sale_date'])[0]}}</td>
                    <td>{{$sale['weight']}}</td>
                    <td>{{$sale['price_total']}}</td>
                    <td>{{$sale['price_kg']}}</td>
                    <td>{{$sale['auction_commission']}}</td>
                    <td>{{$sale['auction_name']}}</td>
                                            <td>{{$sale['sex']}}</td>
                    <td>{{$sale['description']}}</td>
                    <td><a href="{{ url('/animals/detail/'.$sale['id'])}}">Detalle</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </section>
    @endif
@stop