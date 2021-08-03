
@section('injectablesTable')
    <section  class="frontend row"> 
        <h1 class="titulo col-md-12">Listado de inyectables aplicados</h1>
        <div class="table-responsive">
            <table class="animals purchases table table-striped table-sm table-hover table-light" >
                <thead>
                    <tr class="table-primary">
                        <th>Tipo</th>
                        <th>Fecha de aplicación</th>
                        <th>Nombre del producto</th>
                        <th>Periodo de retiro (días)</th>
                        <th>Tiempo de efectividad (días)</th>
                        <th>Ver aplicación</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($listInjectables))
                        @foreach($listInjectables as $injectable)
                        <tr>
                            <td>{{$injectable['injectable_type']}}</td>
                            <?php //$fecha = explode(' ',$injectable['application_date'])?>
                            <td>{{explode(' ',$injectable['application_date'])[0]}}</td>
                            <td>{{$injectable['injectable_name']}}</td>
                            <td>{{$injectable['withdrawal_time']}}</td>
                            <td>{{$injectable['effective_time']}}</td>
                            <td><a class="btn btn-sm btn-info buttonsTable" href="{{ url('injectables/injectable/detail/' . $injectable['creation_time']) }}">Detalle</a>
                            <td><a id="btnDeleteRegister" class="btn btn-sm btn-danger buttonsTable" href="{{ url('injectables/injectable/delete-one/' . $injectable['creation_time'] .'/'.$animal['id']) }}">Borrar</a>
                        </tr>
                        @endforeach
                    @endif
                </tbody>    
            </table>
        </div>
    </section>
@stop

@yield('injectablesTable')

