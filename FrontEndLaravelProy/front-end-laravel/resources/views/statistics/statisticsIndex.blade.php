@extends('main.main')
@extends('statistics.statistics')
@section('statisticsIndex')
    <section class="frontend">
        <h1 class="titulo">Estadísticas globales</h1>
        @if (!empty($listStatisticsGlobal))
            @include('statistics.includes.statisticsTable')
        @endif
    </section>

    @if (!empty($listStatisticsGlobal))
        <div class="accordion mt-3" id="accordionExample2">
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            <h2 class="titulo-2 ">Mostrar el historial de estadísticas</h2>
                        </button>
                    </h2>
                </div>

                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample2">
                    <div class="card-body">
                        @include('statistics.includes.statisticsHistoryTable')
                    </div>
                </div>
            </div>
        </div>
    @endif

@stop
