@section('statisticsTable')
    <div class="row justify-content-center">
        <div class="col-sm-10 statistics">
            <h2 class="titulo-2">Resumen del año en curso</h2>
            <table class="table table-sm table-hover table-light">
                <tbody>
                    <tr>
                        <td>Animales activos:</td>
                        <td>{{ $listStatisticsGlobal['activeAnimalNumber'] }}</td>
                    </tr>
                    <tr>
                        <td>Cantidad de nacimientos en el último año:</td>
                        <td>{{ $listStatisticsGlobal['birthsDataByYear'][0]['birthsNumberByDate'] }}</td>
                    </tr>
                    <tr>
                        <td>Cantidad de animales vendidos en el último año:</td>
                        <td>{{ $listStatisticsGlobal['salesDataByYear'][0]['salesNumberByDate'] }}</td>
                    </tr>
                    <tr>
                        <td>Monto de las ventas en el último año:</td>
                        <td>{{ number_format($listStatisticsGlobal['salesDataByYear'][0]['salesAmountByDate']) }}</td>
                    </tr>
                    <tr>
                        <td>Cantidad de animales comprados en el último año:</td>
                        <td>{{ $listStatisticsGlobal['purchasesDataByYear'][0]['purchasesNumberByDate'] }}</td>
                    </tr>
                    <tr>
                        <td>Monto de las compras en el último año:</td>
                        <td>{{ number_format($listStatisticsGlobal['purchasesDataByYear'][0]['purchasesAmountByDate']) }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@yield('statisticsTable')
