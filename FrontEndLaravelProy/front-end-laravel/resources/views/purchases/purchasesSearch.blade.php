@extends('main.main')
@extends('purchases.purchases')
@section('purchasesSearch')
    <section id="frontend"> 
        <h1 class="titulo">Consulta de compras por fecha</h1>
        <div class="form" id='formSearchPurchase'>
            <h2>Ingrese el rango de fechas de las compras</h2>
            <form class="form_data" method="POST" action="{{ url('/purchases/find/')}}">
                {{csrf_field()}}
                
                <label for='date1'>Ingrese la fecha inicial:</label>
                <input id="date1" name="date1" type="date" required>
                <label for='date2'>Ingrese la ficha final:</label>
                <input id="date2" name="date2" type="date" required>
                
                <input type="submit" value="Buscar">  
            </form>
        </div> 
    </section>
    @if(!empty($noData))
        <section id="frontend"> 
        <h1 class="titulo">No se encontraron resultados</h1>
        </section>
    @endif
    @if(!empty($listPurchases))
    <section id="frontend"> 
        <h1 class="titulo">Listado de compras</h1>
        <div class="list">
           <table class="table">
                <tr>
                    <th>Animal</th>
                    <th>Sexo</th>
                    <th>Tipo de compra</th>
                    <th>Fecha de la compra</th>
                    <th>Peso del animal</th>
                    <th>Monto de la compra</th>
                    <th>Precio por kilogramo</th>
                    <th>Comisión de subasta (%)</th>
                    <th>Nombre de la subasta</th>
                    <th>Descripción</th>
                    <th>Ver</th>
                </tr>
                @if(!empty($listPurchases))
                    @foreach($listPurchases as $purchase)
                    <tr>
                        <td>{{$purchase['code'].' '.$purchase['nickname'].' '.$purchase['certification_name']}}</td>
                        <td>{{$purchase['sex']}}</td>
                        <td>{{$purchase['purchase_type']}}</td>
                        <?php $fecha = explode(' ',$purchase['purchase_date'])?>
                        <td>{{explode(' ',$purchase['purchase_date'])[0]}}</td>
                        <td>{{$purchase['weight']}}</td>
                        <td>{{$purchase['price_total']}}</td>
                        <td>{{$purchase['price_kg']}}</td>
                        <td>{{$purchase['auction_commission']}}</td>
                        <td>{{$purchase['auction_name']}}</td>
                        <td>{{$purchase['description']}}</td>
                        <td><a href="{{ url('/animals/detail/'.$purchase['animal_id'])}}">Detalle</a></td>
                    </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </section>
    @endif
@stop