@extends('main.main')
@extends('injectables.injectables')
@section('injectablesDetail')
    <section  class="frontend row"> 
        <h1 class="titulo col-md-12">Detalle de la aplicación</h1>
        <div class="table-responsive">
            <table class="animals purchases table table-striped table-sm table-hover table-light" >
                <thead>
                    <tr class="table-primary">
                        <th>Tipo</th>
                        <th>Animal</th>
                        <th>Fecha de aplicación</th>
                        <th>Nombre del producto</th>
                        <!--<th>Marca</th>-->
                        <th>Periodo de retiro (días)</th>
                        <th>Tiempo de efectividad (días)</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($listInjectables))
                        @foreach($listInjectables as $injectable)
                        <tr>
                            <td>{{$injectable['injectable_type']}}</td>
                            <td><a href="{{ url('/animals/detail/'.$injectable['animal_id'])}}">{{$injectable['code'].'-'.$injectable['nickname'].'-'.$injectable['certification_name']}}</a></td>
                            <?php //$fecha = explode(' ',$injectable['application_date'])?>
                            <td>{{explode(' ',$injectable['application_date'])[0]}}</td>
                            <td>{{$injectable['injectable_name']}}</td>
                            <!--<td>{{$injectable['injectable_brand']}}</td>-->
                            <td>{{$injectable['withdrawal_time']}}</td>
                            <td>{{$injectable['effective_time']}}</td>
                            <td>{{$injectable['description']}}</td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>    
            </table>
        </div>
    </section>
@stop