@extends('main.main')
@extends('sales.sales')
@section('salesIndex')
    <section id="frontend"> 
        <h1 class="titulo">Listado de ventas</h1>
        <div class="list">
            <table class="table">
                <tr>
                    <th>Animal</th>
                    <th>Tipo de venta</th>
                    <th>Fecha de la venta</th>
                    <th>Peso del animal (kg)</th>
                    <th>Monto de la venta</th>
                    <th>Precio por kilogramo</th>
                    <th>Comisión de subasta (%)</th>
                    <th>Nombre de la subasta</th>
                    <th>Sexo</th>
                    <th>Descripción</th>
                    <th>Ver</th>
                </tr>
                @if(!empty($listSales))
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
                @endif
            </table>
        </div>
    </section>
@stop