@section('statisticsHistoryTable')
    <table id="history-table" class="table table-hover">
        <thead>
            <tr class="table-primary">
                <th class="column-head"></th>
                @foreach ($listStatisticsGlobal['salesDataByYear'] as $item)
                    <th>{{$item['year']}}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr >
                <td class="column-head">Cantidad de nacimientos</td>
                @foreach ($listStatisticsGlobal['birthsDataByYear'] as $item)
                    <td>{{$item['birthsNumberByDate']}}</td>
                @endforeach  
            </tr>
            <tr>
                <td class="column-head">Cantidad de animales vendidos</td>     
                @foreach ($listStatisticsGlobal['salesDataByYear'] as $item)
                    <td>{{$item['salesNumberByDate']}}</td>
                @endforeach  
            </tr>
            <tr>
                <td class="column-head">Monto de las ventas</td>
                @foreach ($listStatisticsGlobal['salesDataByYear'] as $item)
                    <td>{{number_format($item['salesAmountByDate'])}}</td>
                @endforeach         
            </tr>
            <tr>
                <td class="column-head">Cantidad de animales comprados</td>
                @foreach ($listStatisticsGlobal['purchasesDataByYear'] as $item)
                    <td>{{$item['purchasesNumberByDate']}}</td>
                @endforeach  
            </tr>
            <tr>
                <td class="column-head">Monto de las compras</td>
                @foreach ($listStatisticsGlobal['purchasesDataByYear'] as $item)
                    <td>{{number_format($item['purchasesAmountByDate'])}}</td>
                @endforeach   
            </tr>


        </tbody>

    </table>

@endsection

@yield('statisticsHistoryTable')
