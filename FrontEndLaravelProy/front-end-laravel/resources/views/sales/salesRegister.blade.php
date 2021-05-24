@extends('main.main')
@extends('sales.sales')
@section('salesRegister')
<section id="frontend"> 
    <h1 class="titulo">Registro de ventas</h1>
    <div class="form" id='formSaleAnimal'>
        <h2>Ingrese los de la venta</h2>
        <form class="form_data" method="POST" action="{{ url('/sales/create/')}}">
            {{csrf_field()}}
            <label for='animal_id'>Seleccione animal:</label>
            <select id="animal_id" name="animal_id" required>
                @if(!empty($listAnimals))
                    @foreach($listAnimals as $animal)
                        <option value="{{$animal["id"]}}">{{$animal['code'].' '.$animal['nickname'].' '.$animal['certification_name']}}</option>
                    @endforeach
                @endif
            </select>
            <label for='sale_type'>Tipo de venta:</label>
            <select id="sale_type" name="sale_type" required>
                <option value="Subasta" selected>Subasta</option>
                <option value="Particular">Particular</option>
                <option value="Intercambio">Intercambio</option>
                <option value="Otro">Otro</option>
            </select>
            <label for='weight'>Peso de venta:</label>
            <select id="weight" name="weight" required></select> 
            <label for='price_total'>Monto total de la venta:</label>
            @if(!empty($response))
                @if($response['status'] =='error')
                    @if(!empty($response['validationErrors']['price_total']))
                        @foreach($response['validationErrors']['price_total'] as $error)
                            <div class='error'>{{$error}}</div>
                        @endforeach
                    @endif
                @endif
            @endif
            <div><input id="price_total" name="price_total" type="text" required></div>
            <div id="action_options">
                <div id="options">
                    <label for='price_kg'>Monto por kilogramo:</label>
                    @if(!empty($response))
                        @if($response['status'] =='error')
                            @if(!empty($response['validationErrors']['price_kg']))
                                @foreach($response['validationErrors']['price_kg'] as $error)
                                    <div class='error'>{{$error}}</div>
                                @endforeach
                            @endif
                        @endif
                    @endif
                    <div><input id="price_kg" name="price_kg" type="text"></div>
                    <label for='auction_commission'>Comisión de la subasta (Porcentaje): (Ejem: 5)</label>
                    @if(!empty($response))
                        @if($response['status'] =='error')
                            @if(!empty($response['validationErrors']['auction_commission']))
                                @foreach($response['validationErrors']['auction_commission'] as $error)
                                    <div class='error'>{{$error}}</div>
                                @endforeach
                            @endif
                        @endif
                    @endif
                    <div><select id="auction_commission" name="auction_commission" type="text"></select></div>
                    <label for='auction_name'>Nombre de la subasta:</label>
                    @if(!empty($response))
                        @if($response['status'] =='error')
                            @if(!empty($response['validationErrors']['auction_name']))
                                @foreach($response['validationErrors']['auction_name'] as $error)
                                    <div class='error'>{{$error}}</div>
                                @endforeach
                            @endif
                        @endif
                    @endif
                    <div><input id="auction_name" name="auction_name" type="text" ></div>
                </div>
            </div>    
            <label for='sale_date'>Fecha de la venta:</label>
            <input id="sale_date" name="sale_date" type="date" required>
            <label for='description'>Descripción de la venta:</label>
            @if(!empty($response))
                @if($response['status'] =='error')
                    @if(!empty($response['validationErrors']['description']))
                        @foreach($response['validationErrors']['description'] as $error)
                            <div class='error'>{{$error}}</div>
                        @endforeach
                    @endif
                @endif
            @endif
            <div><textarea id="description" name="description" required></textarea></div>
            @if(!empty($response))
                @if($response['status']=='success')
                    <div class='success final'>{{$response['message']}}</div>
                @endif
                @if($response['status'] =='error')
                    <div class='error final'>{{$errorMsg}}</div>
                @endif
            @endif
            <input id="btnRegister" type="submit" value="Registrar">  
        </form>
    </div> 
</section>
@stop