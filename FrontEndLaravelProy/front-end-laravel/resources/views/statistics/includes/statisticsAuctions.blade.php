@section('statisticsAuctions')
    <section class="frontend">
        <div class="row justify-content-center">
            <div class="col-md-12 statistics">
                <h1 class="titulo mt-3">Precios en subasta de los últimos 15 días</h1>
                <div id="statisticsAuctions" class="row">
                    @foreach ($listStatisticsAuctions as $key1 => $value1)
                        @foreach ($value1 as $auction_name => $value2)
                            @if (count($value2) != 0)
                                <div class="table-responsive">
                                    <table class="auctionsTable table border table-sm ">
                                        <tr class="col-md-12">
                                            <h2 class="auctionName titulo-2 ml-3">{{ $auction_name }}</h2>
                                            @foreach ($value2 as $key2 => $value3)
                                                <td>
                                                    @foreach ($value3 as $range => $value4)
                                                        <div class="range">Rango de peso entre {{ $range }}
                                                            kilogramos</div>
                                                        @foreach ($value4 as $key3 => $value5)
                                                            @foreach ($value5 as $date => $value6)
                                                                <div class="date">Fecha: {{ $date }}</div>
                                                                <div class="striped1">Máximo Macho:
                                                                    {{ $value6['max_price_male'] }}</div>
                                                                <div class="striped2">Máximo Hembra:
                                                                    {{ $value6['max_price_female'] }}</div>
                                                                <div class="striped1">Promedio Macho:
                                                                    {{ $value6['avg_price_male'] }}</div>
                                                                <div class="striped2 lastPrices">Promedio Hembra:
                                                                    {{ $value6['avg_price_female'] }}</div>
                                                            @endforeach
                                                        @endforeach
                                                    @endforeach
                                                </td>
                                            @endforeach
                                        </tr>
                                    </table>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@yield('statisticsAuctions')
