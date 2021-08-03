@extends('main.main')
@extends('statistics.statistics')
@section('statisticsAuctions')
    <section class="frontend">
        <h1 class="titulo">Estadísticas de subastas</h1>
        @if (!empty($listStatisticsAuctions))
            @include('statistics.includes.statisticsAuctions')
        @endif
    </section>
@stop
