@extends('main.main')
@extends('purchases.purchases')
@section('purchasesIndex')
    <section class="frontend row"> 
        <h1 class="titulo col-md-12">Listado de compras</h1>
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
        <div class="table-responsive">
            <table class="animals purchases table table-striped table-sm table-hover table-light">
                <thead>
                    <tr class="table-primary">
                        <th>Animal</th>
                        <th class="type">Tipo de compra</th>
                        <th>Fecha de la compra</th>
                        <th>Sexo</th>
                        <th>Detalle</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @if(!empty($listPurchases))
                    @foreach($listPurchases as $purchase)
                    <tr>
                        <td><a href="{{ url('/animals/detail/'.$purchase['animal_id'])}}">{{$purchase['code'].' '.$purchase['nickname'].' '.$purchase['certification_name']}}</a></td>
                        <td  class="type">{{$purchase['purchase_type']}}</td>
                        <td>{{explode(' ',$purchase['purchase_date'])[0]}}</td>
                        <td>{{$purchase['sex']}}</td>
                        <td><a class="btn btn-sm btn-info"
                            href="{{ url('/purchases/purchase/detail/' . $purchase['animal_id'] . '/' . $purchase['code'] . ' ' . $purchase['nickname'] . ' ' . $purchase['certification_name'] . '/' . $purchase['purchase_type'] . '/' . explode(' ', $purchase['purchase_date'])[0] . '/' . $purchase['weight'] . '/' . number_format($purchase['price_total']) . '/' . number_format($purchase['price_kg']) . '/' . $purchase['auction_commission'] . '/' . $purchase['sex'] . '/'.$purchase['description'].'/') }}">Detalle</a>
                        </td>
                        <td><a id="btnDeleteRegister" class="btn btn-sm btn-danger buttonsTable" href="{{ url('purchases/purchase/delete-one/' . $purchase['purchase_id'] . '/' . $purchase['animal_id']) }}">Borrar</a></td>
                    </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </section>
@stop