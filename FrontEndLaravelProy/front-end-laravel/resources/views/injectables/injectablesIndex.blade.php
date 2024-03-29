@extends('main.main')
@extends('injectables.injectables')
@section('injectablesIndex')
    <section  class="frontend row"> 
        <h1 class="titulo col-md-12">Listado de inyectables aplicados</h1>
        <div class="table-responsive">
            <table class="animals purchases table table-striped table-sm table-hover table-light" >
                <thead>
                    <tr class="table-primary">
                        <th>Tipo</th>
                        <th>Fecha de aplicación</th>
                        <th>Nombre del producto</th>
                        <th>Ver detalle</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($listInjectables))
                        @foreach($listInjectables as $injectable)
                        <tr>
                            <td>{{$injectable['injectable_type']}}</td>
                            <td>{{explode(' ',$injectable['application_date'])[0]}}</td>
                            <td>{{$injectable['injectable_name']}}</td>
                            <td><a  href="{{ url('injectables/injectable/detail/' . $injectable['creation_time']) }}">Detalle</a>
                        </tr>
                        @endforeach
                    @endif
                </tbody>    
            </table>
        </div>
    </section>
@stop