@extends('main.main')
@extends('purchases.purchases')
@section('purchasesSearch')
    <section class="frontend row justify-content-center"> 
        <h1 class="titulo col-md-12">Consulta de compras por fecha</h1>
        <div class="form col-md-8" id='formSearchPurchase'>
            <h2 class="titulo-2">Ingrese el rango de fechas de las compras</h2>
            <form class="form_data" method="POST" action="{{ url('/purchases/find/')}}">
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
    @if(!empty($listPurchases))
    <section class="frontend row justify-content-center"> 
        <h1 class="titulo col-md-12">Listado de compras</h1>
        <div class="table-responsive">
            <table class="animals purchases table table-striped table-sm table-hover table-light">
                <thead>
                    <tr class="table-primary">
                        <th>Animal</th>
                        <th>Sexo</th>
                        <th class="type">Tipo de compra</th>
                        <th>Fecha de la compra</th>
                        <th>Peso del animal</th>
                        <th>Monto de la compra</th>
                        <th>Precio por kilogramo</th>
                        <th class="comision">Comisión de subasta (%)</th>
                        <th>Nombre de la subasta</th>
                        <th>Descripción</th>
                        <th>Ver</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($listPurchases))
                        @foreach($listPurchases as $purchase)
                        <tr>
                            <td>{{$purchase['code'].' '.$purchase['nickname'].' '.$purchase['certification_name']}}</td>
                            <td>{{$purchase['sex']}}</td>
                            <td class="type">{{$purchase['purchase_type']}}</td>
                            <?php $fecha = explode(' ',$purchase['purchase_date'])?>
                            <td>{{explode(' ',$purchase['purchase_date'])[0]}}</td>
                            <td>{{$purchase['weight']}}</td>
                            <td>{{$purchase['price_total']}}</td>
                            <td>{{$purchase['price_kg']}}</td>
                            <td class="comision">{{$purchase['auction_commission']}}</td>
                            <td>{{$purchase['auction_name']}}</td>
                            <td>{{$purchase['description']}}</td>
                            <td><a class="btn btn-sm btn-info"  href="{{ url('/animals/detail/'.$purchase['animal_id'])}}">Detalle</a></td>
                        </tr>
                        @endforeach
                    @endif
                <tbody>
            </table>
        </div>
    </section>
    @endif
@stop