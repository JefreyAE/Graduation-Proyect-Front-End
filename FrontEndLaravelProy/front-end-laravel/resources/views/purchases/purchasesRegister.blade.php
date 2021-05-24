@extends('main.main')
@extends('purchases.purchases')
@section('purchasesRegister')
<section id="frontend"> 
    <h1 class="titulo">Registro de compra</h1>
    <div class="form" id='formPurchaseAnimal'>
        <h2>Ingrese los datos del animal</h2>
        <form class="form_data" method="POST" action="{{ url('/purchases/create/')}}">
            {{csrf_field()}}
            <label for='nickname'>Apodo:</label>
            @if(!empty($response))
                @if($response['status'] =='error')
                    @if(!empty($response['validationErrors']['nickname']))
                        @foreach($response['validationErrors']['nickname'] as $error)
                            <div class='error'>{{$error}}</div>
                        @endforeach
                    @endif
                @endif
            @endif
            <div><input id="nickname" name='nickname' type="text"></div>
            <label for='certification_name'>Nombre de certificación:</label>
            @if(!empty($response))
                @if($response['status'] =='error')
                    @if(!empty($response['validationErrors']['certification_name']))
                        @foreach($response['validationErrors']['certification_name'] as $error)
                            <div class='error'>{{$error}}</div>
                        @endforeach
                    @endif
                @endif
            @endif
            <div><input id="certification_name" name="certification_name" type="text"></div>
            <label for='registration_number'>Número de registro:</label>
            @if(!empty($response))
                @if($response['status'] =='error')
                    @if(!empty($response['validationErrors']['registration_number']))
                        @foreach($response['validationErrors']['registration_number'] as $error)
                            <div class='error'>{{$error}}</div>
                        @endforeach
                    @endif
                @endif
            @endif
            <div><input id="registration_number" name="registration_number" type="text"></div>
            <label for='code'>Código de registro:</label>
            @if(!empty($response))
                @if($response['status'] =='error')
                    @if(!empty($response['validationErrors']['code']))
                        @foreach($response['validationErrors']['code'] as $error)
                            <div class='error'>{{$error}}</div>
                        @endforeach
                    @endif
                @endif
            @endif
            <div><input id="code" name="code" type="text" required></div>
            <label for='birth_date'>Fecha de nacimiento:</label>
            <input id="birth_date" name="birth_date" type="date" >
            <label for='sex'>Indique el sexo del animal:</label>
            <select id="sex" name="sex" required>
                <option value="Macho" selected>Macho</option>
                <option value="Hembra">Hembra</option>
            </select>
            <label for='race'>Indique la raza del animal:</label>
            <select id="race" name="race" required>
                <option value="Brahaman" selected>Brahaman</option>
                <option value="Angus">Simbra</option>
                <option value="Angus">Angus</option>
                <option value="Angus">Simmental</option>
                <option value="Angus">Holstein</option>
                <option value="Angus">Nelore</option>    
                <option value="Angus">Jersey</option>
                <option value="Angus">Pardo Suizo</option>
                <option value="Angus">Charolais</option>
                <option value="Angus">Brandford</option>
            </select>
            
            <label for='purchase_type'>Tipo de compra:</label>
            <select id="purchase_type" name="purchase_type" required>
                <option value="Subasta" selected>Subasta</option>
                <option value="Particular">Particular</option>
                <option value="Intercambio">Intercambio</option>
                <option value="Otro">Otro</option>
            </select>
            <label for='weight'>Peso de compra:</label>
            <select id="weight" name="weight" required></select> 
            <label for='price_total'>Monto total de la compra:</label>
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
            <label for='purchase_date'>Fecha de la compra:</label>
            <input id="purchase_date" name="purchase_date" type="date" required>
            <label for='description'>Descripción de la compra:</label>
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
            <input id="father_id" name="father_id" type="hidden" value="unknown">
            <input id="mother_id" name="mother_id" type="hidden" value="unknown">
             
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