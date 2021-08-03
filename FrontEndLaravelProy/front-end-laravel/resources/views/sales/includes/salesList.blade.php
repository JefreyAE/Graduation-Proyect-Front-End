@section('salesList')
    <div class="table-responsive">
        <table class="animals purchases table table-striped table-sm table-hover table-light">
            <thead>
                <tr class="table-primary">
                    <th>Animal</th>
                    <th class="type">Tipo de venta</th>
                    <th>Fecha de la venta</th>
                    <th>Sexo</th>
                    <th>Ver</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($listSales))
                    @foreach ($listSales as $sale)
                        <tr>
                            <td><a
                                    href="{{ url('/animals/detail/' . $sale['animal_id']) }}">{{ $sale['code'] . ' ' . $sale['nickname'] . ' ' . $sale['certification_name'] }}</a>
                            </td>
                            <td class="type">{{ $sale['sale_type'] }}</td>
                            <?php $fecha = explode(' ', $sale['sale_date']); ?>
                            <td>{{ explode(' ', $sale['sale_date'])[0] }}</td>
                            <td>{{ $sale['sex'] }}</td>
                            <td><a class="btn btn-sm btn-info"
                                    href="{{ url('/sales/sale/detail/' . $sale['animal_id'] . '/' . $sale['code'] . ' ' . $sale['nickname'] . ' ' . $sale['certification_name'] . '/' . $sale['sale_type'] . '/' . explode(' ', $sale['sale_date'])[0] . '/' . $sale['weight'] . '/' . number_format($sale['price_total']) . '/' . number_format($sale['price_kg']) . '/' . $sale['auction_commission'] . '/' . $sale['sex'] . '/') }}">Detalle</a>
                            </td>
                            <td><a id="btnDeleteRegister" class="btn btn-sm btn-danger buttonsTable"
                                    href="{{ url('sales/sale/delete-one/' . $sale['sale_id'] . '/' . $sale['animal_id']) }}">Borrar</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@stop
@yield('salesList')
