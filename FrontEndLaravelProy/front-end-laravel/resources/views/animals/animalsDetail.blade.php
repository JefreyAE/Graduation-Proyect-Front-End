@extends('main.main')
@extends('animals.animals')
@section('animalsDetail')
    <section id="frontend"> 
        <h1 class="titulo">Detalles del animal</h1>
        <div class="form" id='formDetailAnimal'>
            <h2>Información genera</h2>
            @if(!empty($animal))
                <form class="form_data" method="POST" action="#">
                    <label for='nickname'>Apodo:</label>
                    <input id="nickname" name='nickname' value='{{$animal['nickname']}}' type="text" disabled>
                    <label for='certification_name'>Nombre de certificación:</label>
                    <input id="certification_name" name="certification_name" type="text" value='{{$animal['certification_name']}}' type="text" disabled>
                    <label for='registration_number'>Número de registro:</label>
                    <input id="registration_number" name="registration_number" type="text" value='{{$animal['registration_number']}}' type="text" disabled>
                    <label for='birth_weight'>Peso de nacimiento:</label>
                    <input id="birth_weight" value="{{$animal['birth_weight']}}" disabled>
                    <label for='code'>Código de registro:</label>
                    <input id="code" name="code" type="text" value='{{$animal['code']}}' type="text" disabled>
                    <label for='birth_date'>Fecha de nacimiento:</label>
                    <input id="birth_date" name="birth_date" type="text" value='{{$animal['birth_date']}}' disabled>
                    <label for='sex'>Sexo del animal:</label>
                    <input id="sex" value="{{$animal['sex']}}" disabled>
                    <label for='father_id'>Nombre del padre:</label>
                    @if($animal['father_id'] == 0 )
                        <input id="father" type="text" value='Desconocido' type="text" disabled>
                    @endif
                    @foreach($animals as $animalP)
                        @if($animalP['id'] == $animal['father_id'] && $animal['father_id'] != 0)
                        <a id="father" href="{{ url('/animals/detail/'.$animalP['id'])}}">{{$animalP['code'].' '.$animalP['nickname'].' '.$animalP['certification_name']}}</a>
                        @endif
                    @endforeach

                    <label for='mother_id'>Nombre de la madre:</label>
                    @if($animal['mother_id'] == 0 )
                        <input id="mother" type="text" value='Desconocido' type="text" disabled>
                    @endif
                    @foreach($animals as $animalP)
                        @if($animalP['id'] == $animal['mother_id'] && $animal['mother_id'] != 0)
                        <a id="mother" href="{{ url('/animals/detail/'.$animalP['id'])}}">{{$animalP['code'].' '.$animalP['nickname'].' '.$animalP['certification_name']}}</a>
                        @endif
                    @endforeach
                    <label for='race'>Raza del animal:</label>
                    <input id="race" value="{{$animal["race"]}}" disabled></option>
                    <label for='animal_state'>Estado del animal:</label>
                    <input id="race" value="{{$animal["animal_state"]}}" disabled></option>
                </form>
            @endif
        </div>
    </section> 
    <section id="frontend"> 
        <h1 class="titulo">Registro de inyectables</h1>
        <div class="list">
            <table class="table" >
                <tr>
                    <th>Tipo</th>
                    <th>Fecha de aplicación</th>
                    <th>Nombre del producto</th>
                    <th>Marca</th>
                    <th>Fecha de vencimiento</th>
                    <th>Tiempo de efectividad</th>
                    <th>Descripción</th>
                    <th>Ver aplicación</th>
                </tr>
                @if(!empty($listInjectables))
                    @foreach($listInjectables as $injectable)
                    <tr>
                        <td>{{$injectable['injectable_type']}}</td>
                        <?php //$fecha = explode(' ',$injectable['application_date'])?>
                        <td>{{explode(' ',$injectable['application_date'])[0]}}</td>
                        <td>{{$injectable['injectable_name']}}</td>
                        <td>{{$injectable['injectable_brand']}}</td>
                        <td>{{$injectable['withdrawal_time']}}</td>
                        <td>{{$injectable['effective_time']}}</td>
                        <td>{{$injectable['description']}}</td>
                        <td><a href="{{ url('injectables/injectable/detail/'.$injectable['creation_time'])}}">Detalle</a></td>
                    </tr>
                    @endforeach
                @endif
             
            </table>
        </div>
    </section> 
    <section id="frontend"> 
        <h1 class="titulo">Registro de eventos</h1>
        <div class="list">
            <table class="table" >
                <tr>
                    <th>Tipo</th>
                    <th>Fecha del incidente</th>
                    <th>Descripción</th>
                </tr>
                @if(!empty($listIncidents))
                    @foreach($listIncidents as $incident)
                    <tr>
                        <td>{{$incident['incident_type']}}</td>
                        <?php //$fecha = explode(' ',$injectable['application_date'])?>
                        <td>{{explode(' ',$incident['incident_date'])[0]}}</td>
                        <td>{{$incident['description']}}</td>
                    </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </section> 
    <section id="frontend"> 
        <h1 class="titulo">Descendencia</h1>
        <div class="list">
            <table class="table">
                <tr>
                    <th>Apodo</th>
                    <th>Nombre en certificado</th>
                    <th>Número de registro</th>
                    <th>Código</th>
                    <th>Fecha de nacimiento</th>
                    <th>Raza</th>
                    <th>Sexo</th>
                    <th>Estado</th>
                    <th>Padre</th>
                    <th>Madre</th>
                    <th>Ver</th>
                </tr>
                @if(!empty($listOffSprings))
                    @foreach($listOffSprings as $animal)
                    <tr>
                        <td>{{$animal['nickname']}}</td>
                        <td>{{$animal['certification_name']}}</td>
                        <td>{{$animal['registration_number']}}</td>
                        <td>{{$animal['code']}}</td>
                        <?php $fecha = explode(' ',$animal['birth_date'])?>
                        <td>{{explode(' ',$animal['birth_date'])[0]}}</td>
                        <td>{{$animal['race']}}</td>
                        <td>{{$animal['sex']}}</td>
                        <td>{{$animal['animal_state']}}</td>

                        @if($animal['father']['id'] == 0 )
                           <td>Desconocido</td>
                        @endif
                        @if($animal['father']['id'] != 0)
                            <td><a id="father" href="{{ url('/animals/detail/'.$animal['father']['id'])}}">{{$animal['father']['code'].' '.$animal['father']['nickname'].' '.$animal['father']['certification_name']}}</a></td>
                        @endif
                        @if($animal['mother']['id'] == 0 )
                            <td>Desconocido</td>
                        @endif
                        @if($animal['mother']['id'] != 0)
                            <td><a id="mother" href="{{ url('/animals/detail/'.$animal['mother']['id'] )}}">{{$animal['mother']['code'].' '.$animal['mother']['nickname'].' '.$animal['mother']['certification_name']}}</a></td>
                        @endif
                        <td><a href="{{ url('/animals/detail/'.$animal['id'])}}">Detalle</a></td>
                    </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </section> 
@stop