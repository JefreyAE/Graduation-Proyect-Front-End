@extends('main.main')
@extends('animals.animals')
@section('animalsSearch')
     <section class="frontend"> 
        <h1 class="titulo">Búsqueda de animales</h1>
        <div class="form" id='formSearchAnimal'>
        <h2>Ingrese los datos del animal</h2>
        <form class="form_data" method="POST" action="{{ url('/animals/find/')}}">
            {{csrf_field()}}
            <label for='search_type'>Seleccione el tipo de búsqueda:</label>
             <select id="search_type" name="search_type" required>
                <option value="code" selected>Por código</option>
                <option value="nickname">Por apodo</option>
                <option value="certification_name">Por nombre de certificación</option>
                <option value="registration_number">Por número de registro</option>
            </select>
            <label for='find_string'>Ingrese la busqueda:</label>
            @if(!empty($response))
                @if($response['status'] =='error')
                    @if(!empty($response['validationErrors']['find_string']))
                        @foreach($response['validationErrors']['find_string'] as $error)
                            <div class='error'>{{$error}}</div>
                        @endforeach
                    @endif
                @endif
            @endif
            <div><input id="find_string" name="find_string" type="text" required></div>
           @if(!empty($response))
                @if($response['status']=='success')
                    <div class='success final'>{{$response['message']}}</div>
                @endif
                @if($response['status'] =='error')
                    <div class='error final'>{{$errorMsg}}</div>
                @endif
            @endif
            <input id="btnSearch" type="submit" value="Buscar">  
        </form>
    </div> 
    </section>
    @if(!empty($noData))
        <section id="frontend"> 
        <h1 class="titulo">No se encontraron resultados</h1>
        </section>
    @endif
    @if(!empty($listFind))
        <section class="frontend"> 
            <h1 class="titulo">Resultados de la búsqueda</h1>
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
                            <th>Ver</th>
                        </tr>
                        @foreach($listFind as $animal)
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
                            <td><a href="{{ url('/animals/detail/'.$animal['id'])}}">Detalle</a></td>
                        </tr>
                        @endforeach         
                </table>
            </div>
        </section>
    @endif
@stop