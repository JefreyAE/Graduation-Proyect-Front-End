@section('animalsDetailForm')
    <section class="frontend row justify-content-center">
        <h1 class="titulo col-md-12">Detalles del animal</h1>
        <div class="form col-lg-8" id='formDetailAnimal'>
            <h2 class="titulo-2">Información general</h2>
            @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (!empty($animal))
                <form id="form-detail-update" class="form_data form-group row" method="POST"
                    action="{{ url('/animals/update/') }}">
                    {{ csrf_field() }}
                    <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend input-detail-update">
                            <span class="input-group-text">Apodo</span>
                        </div>
                        <input class="form-control" id="nickname" name='nickname' value='{{ $animal['nickname'] }}'
                            type="text" disabled>
                    </div>
                    <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend input-detail-update">
                            <span class="input-group-text">Nombre de certificación</span>
                        </div>
                        <input class="form-control" id="certification_name" name="certification_name" type="text"
                            value='{{ $animal['certification_name'] }}' type="text" disabled>
                    </div>
                    <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend input-detail-update">
                            <span class="input-group-text">Número de registro</span>
                        </div>
                        <input class="form-control" id="registration_number" name="registration_number" type="text"
                            value='{{ $animal['registration_number'] }}' type="text" disabled>
                    </div>
                    <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend input-detail-update">
                            <span class="input-group-text">Peso de nacimiento</span>
                        </div>
                        <input type="text" class="form-control" name="birth_weight" id="birth_weight"
                            value="{{ $animal['birth_weight'] }}" disabled>
                    </div>
                    <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend input-detail-update">
                            <span class="input-group-text">Código de registro</span>
                        </div>
                        <input class="form-control" id="code" name="code" type="text" value='{{ $animal['code'] }}'
                            type="text" disabled>
                    </div>
                    <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend input-detail-update">
                            <span class="input-group-text">Fecha de nacimiento</span>
                        </div>
                        <input class="form-control" id="birth_date" name="birth_date" type="date"
                            value='{{ explode(' ', $animal['birth_date'])[0] }}' disabled>
                    </div>
                    <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend input-detail-update">
                            <span class="input-group-text">Sexo del animal</span>
                        </div>
                        <select class="form-control" id="sex" name="sex" required disabled>
                            <option value="{{ $animal['sex'] }}" selected>{{ $animal['sex'] }}</option>
                            <option value="Macho">Macho</option>
                            <option value="Hembra">Hembra</option>
                        </select>
                    </div>
                    <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend input-detail-update">
                            <span class="input-group-text">Nombre del padre</span>
                        </div>
                        <select class="custom-select" id="father_id" name="father_id" required disabled>
                            @if ($animal['father_id'] == 0)
                                <option value="unknown" selected>Desconocido</option>
                            @endif
                            @if ($animal['father_id'] != 0)
                                <option value="unknown">Desconocido</option>
                            @endif
                            @foreach ($animals as $animalP)
                                @if ($animalP['sex'] == 'Macho')
                                    @if ($animalP['id'] == $animal['father_id'])
                                        <option value="{{ $animalP['id'] }}" selected><a id="father"
                                                href="{{ url('/animals/detail/' . $animalP['id']) }}">{{ $animalP['code'] . ' ' . $animalP['nickname'] . ' ' . $animalP['certification_name'] }}</a>
                                        </option>
                                    @endif
                                    @if ($animalP['id'] != $animal['father_id'])
                                        <option value="{{ $animalP['id'] }}"><a id="father"
                                                href="{{ url('/animals/detail/' . $animalP['id']) }}">{{ $animalP['code'] . ' ' . $animalP['nickname'] . ' ' . $animalP['certification_name'] }}</a>
                                        </option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend input-detail-update">
                            <span class="input-group-text">Nombre de la madre</span>
                        </div>
                        <select class="custom-select" id="mother_id" name="mother_id" required disabled>
                            @if ($animal['mother_id'] == 0)
                                <option value="unknown" selected>Desconocido</option>
                            @endif
                            @if ($animal['mother_id'] != 0)
                                <option value="unknown">Desconocido</option>
                            @endif
                            @foreach ($animals as $animalP)
                                @if ($animalP['sex'] == 'Hembra')
                                    @if ($animalP['id'] == $animal['mother_id'])
                                        <option value="{{ $animalP['id'] }}" selected><a id="mother"
                                                href="{{ url('/animals/detail/' . $animalP['id']) }}">{{ $animalP['code'] . ' ' . $animalP['nickname'] . ' ' . $animalP['certification_name'] }}</a>
                                        </option>
                                    @endif
                                    @if ($animalP['id'] != $animal['mother_id'])
                                        <option value="{{ $animalP['id'] }}"><a id="mother"
                                                href="{{ url('/animals/detail/' . $animalP['id']) }}">{{ $animalP['code'] . ' ' . $animalP['nickname'] . ' ' . $animalP['certification_name'] }}</a>
                                        </option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend input-detail-update">
                            <span class="input-group-text">Raza del animal</span>
                        </div>
                        <select class="form-control" id="race" name="race" value="{{ $animal['race'] }}" disabled
                            required>
                            <option value="{{ $animal['race'] }}" selected>{{ $animal['race'] }}</option>
                            <option value="Brahaman">Brahaman</option>
                            <option value="Simbra">Simbra</option>
                            <option value="Angus">Angus</option>
                            <option value="Simmental">Simmental</option>
                            <option value="Holstein">Holstein</option>
                            <option value="Nelore">Nelore</option>
                            <option value="Jersey">Jersey</option>
                            <option value="Pardo Suizo">Pardo Suizo</option>
                            <option value="Charolais">Charolais</option>
                            <option value="Brandford">Brandford</option>
                        </select>
                    </div>
                    <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend input-detail-update">
                            <span class="input-group-text">Estado del animal</span>
                        </div>
                        <input class="form-control" id="animal_state" value="{{ $animal['animal_state'] }}" disabled>
                    </div>
                    <input type="hidden" name="animal_id" id="animal_id" value="{{ $animal['id'] }}">
                    <div class="input-group input-group-sm">
                        <div class="col-md-6 mb-2">
                            <input type="submit" class="btn btn-success btn-lg w-100" value="Actualizar" id="btnUpdateAnimal" style="display:none">
                        </div>       
                        <div class="col-md-6">
                            <a href="{{url('/animals/delete/'.$animal['id'])}}" class="btn btn-danger btn-lg w-100"  id="btnDeleteAnimal"  style="display:none">Borrar Registro</a>
                        </div>    
                    </div>
                </form>
                <button class="btn btn-primary btn-md btn-block" id="btnEnableForm">Habilitar actualización de
                    datos</button>
            @endif
        </div>
    </section>
@stop
@yield('animalsDetailForm')

