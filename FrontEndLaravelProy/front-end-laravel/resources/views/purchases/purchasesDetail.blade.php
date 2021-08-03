@extends('main.main')
@extends('purchases.purchases')
@section('purchasesDetail')
    <section id="frontend">
        <div class="row justify-content-center">
            <div class="col-sm-10 statistics">
                <h2 class="titulo-2">Detalle de la información</h2>
                <table class="table table-sm table-hover table-light">
                    <tbody>
                        <tr>
                            <td>Animal:</td>
                            <td><a href="{{ url('/animals/detail/' . $animal_id) }}">{{ $name }}</a></td>
                        </tr>
                        <tr>
                            <td>Tipo de venta:</td>
                            <td>{{ $purchase_type }}</td>
                        </tr>
                        <tr>
                            <td>Fecha de la venta:</td>
                            <td>{{ $purchase_date }}</td>
                        </tr>
                        <tr>
                            <td>Peso del animal (kg):</td>
                            <td>{{ $weight }}</td>
                        </tr>
                        <tr>
                            <td>Monto de la venta:</td>
                            <td>{{ $price_total }}</td>
                        </tr>
                        <tr>
                            <td>Precio por kilogramo:</td>
                            <td>{{ $price_kg }}</td>
                        </tr>
                        <tr>
                            <td>Comisión de subasta (%):</td>
                            <td>{{ $auction_commision }}</td>
                        </tr>
                        <tr>
                            <td>Sexo:</td>
                            <td>{{ $sex }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@stop
