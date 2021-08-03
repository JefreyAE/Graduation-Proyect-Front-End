@extends('main.main')
@extends('animals.animals')
@section('animalsDetail')
    <div class="row mt-4 justify-content-center">
        <div class="col-md-7">
            @if (!empty($listImages))
                @include('animals.includes.carouselDetailAnimals')
            @endif
            @if (empty($listImages))
                @include('animals.includes.uploadImageAnimal')
            @endif
            @if(session('imageMessage'))
                <div class="alert alert-success">
                    {{ session('imageMessage') }}
                </div>
            @endif
            @if(session('imageError'))
                <div class="alert alert-danger">
                    {{ session('imageError') }}
                </div>
            @endif
        </div>
    </div>

    @include('animals.includes.animalsDetailForm')

    @if (!empty($statistics))
        <div class="accordion mt-3" id="accordionExample6">
            <div class="card">
                <div class="card-header" id="headingSix">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                            <h2 class="titulo-2 ">Mostrar estadísticas</h2>
                        </button>
                    </h2>
                </div>

                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample6">
                    <div class="card-body">
                        @include('animals.includes.animalsStatisticsTable')
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (!empty($listInjectables))
        <div class="accordion mt-3" id="accordionExample2">
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            <h2 class="titulo-2 ">Mostrar inyectables aplicados</h2>
                        </button>
                    </h2>
                </div>

                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample2">
                    <div class="card-body">
                        @include('injectables.includes.injectablesTable')
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (!empty($listIncidents))
        <div class="accordion mt-3" id="accordionExample3">
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                            <h2 class="titulo-2 ">Mostrar incidentes registrados</h2>
                        </button>
                    </h2>
                </div>

                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample3">
                    <div class="card-body">
                        @include('incidents.includes.incidentsTable')
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (!empty($listOffSprings))
        <div class="accordion mt-3" id="accordionExample4">
            <div class="card">
                <div class="card-header" id="headingFour">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                            <h2 class="titulo-2 ">Mostrar descendencia</h2>
                        </button>
                    </h2>
                </div>

                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample4">
                    <div class="card-body">
                        @include('animals.includes.animalsOffspringTable')
                    </div>
                </div>
            </div>
        </div>
    @endif

@stop
