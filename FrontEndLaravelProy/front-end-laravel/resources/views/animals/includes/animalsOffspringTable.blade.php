@section('animalsOffspringsTable')
    <section class="frontend row">
        <h1 class="titulo col-lg-12">Descendencia</h1>
        <div class="table-responsive">
            <table class="animals table offspring table-striped table-sm table-hover table-light">
                <thead>
                    <tr class="table-primary">
                        <th>Apodo</th>
                        <th class="registration-number">Número de registro</th>
                        <th>Código</th>
                        <th>Fecha de nacimiento</th>
                        <th>Sexo</th>
                        <th>Estado</th>
                        @if ($animal['sex'] != 'Macho')
                            <th>Padre</th>
                        @endif
                        @if ($animal['sex'] != 'Hembra')
                            <th>Madre</th>
                        @endif
                        <th>Ver</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($listOffSprings))
                        @foreach ($listOffSprings as $animalOff)
                            <tr>
                                <td>{{ $animalOff['nickname'] }}</td>
                                <td class="registration-number">{{ $animalOff['registration_number'] }}</td>
                                <td>{{ $animalOff['code'] }}</td>
                                <?php $fecha = explode(' ', $animalOff['birth_date']); ?>
                                <td>{{ explode(' ', $animalOff['birth_date'])[0] }}</td>
                                <td>{{ $animalOff['sex'] }}</td>
                                <td>{{ $animalOff['animal_state'] }}</td>

                                @if ($animal['sex'] != 'Macho')
                                    @if ($animalOff['father']['id'] == 0)
                                        <td>Desconocido</td>
                                    @endif
                                    @if ($animalOff['father']['id'] != 0)
                                        <td><a id="father" 
                                                href="{{ url('/animals/detail/' . $animalOff['father']['id']) }}">{{ $animalOff['father']['code'] . ' ' . $animalOff['father']['nickname'] }}</a>
                                        </td>
                                    @endif
                                @endif

                                @if ($animal['sex'] != 'Hembra')
                                    @if ($animalOff['mother']['id'] == 0)
                                        <td>Desconocido</td>
                                    @endif
                                    @if ($animalOff['mother']['id'] != 0)
                                        <td><a id="mother" 
                                                href="{{ url('/animals/detail/' . $animalOff['mother']['id']) }}">{{ $animalOff['mother']['code'] . ' ' . $animalOff['mother']['nickname'] }}</a>
                                        </td>
                                    @endif
                                @endif
                                <td><a class="btn btn-sm btn-info"
                                        href="{{ url('/animals/detail/' . $animalOff['id']) }}">Detalle</a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </section>
@endsection

@yield('animalsOffspringsTable')
