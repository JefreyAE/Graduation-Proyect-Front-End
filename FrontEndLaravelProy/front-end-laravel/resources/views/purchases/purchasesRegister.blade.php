@extends('main.main')
@extends('purchases.purchases')
@section('purchasesRegister')
<section class="frontend row justify-content-center"> 
    <h1 class="titulo col-md-12">Registro de compra</h1>
    <div class="form col-md-8" id='formPurchaseAnimal'>
        <h2 class="titulo-2">Ingrese los datos del animal</h2>
        @if(!empty($response))
            @if($response['status']=='success')
                <div class="alert alert-success" role="alert">{{$response['message']}}</div>
            @endif
            @if($response['status'] =='error')
                <div class="alert alert-danger" role="alert">{{$errorMsg}}</div>
            @endif
        @endif
        <form class="form_data" method="POST" action="{{ url('/purchases/create/')}}">
            {{csrf_field()}}
            <div class="mb-3">
                <label class="form-label" for='nickname'>Apodo:</label>
                @if(!empty($response))
                    @if($response['status'] =='error')
                        @if(!empty($response['validationErrors']['nickname']))
                            @foreach($response['validationErrors']['nickname'] as $error)
                                <div class='error'>{{$error}}</div>
                            @endforeach
                        @endif
                    @endif
                @endif
                <div>
                    <input class="form-control" id="nickname" name='nickname' type="text">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for='certification_name'>Nombre de certificación:</label>
                @if(!empty($response))
                    @if($response['status'] =='error')
                        @if(!empty($response['validationErrors']['certification_name']))
                            @foreach($response['validationErrors']['certification_name'] as $error)
                                <div class='error'>{{$error}}</div>
                            @endforeach
                        @endif
                    @endif
                @endif
                <div>
                    <input class="form-control" id="certification_name" name="certification_name" type="text">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for='registration_number'>Número de registro:</label>
                @if(!empty($response))
                    @if($response['status'] =='error')
                        @if(!empty($response['validationErrors']['registration_number']))
                            @foreach($response['validationErrors']['registration_number'] as $error)
                                <div class='error'>{{$error}}</div>
                            @endforeach
                        @endif
                    @endif
                @endif
                <div>
                    <input class="form-control" id="registration_number" name="registration_number" type="text">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for='code'>Código de registro:</label>
                @if(!empty($response))
                    @if($response['status'] =='error')
                        @if(!empty($response['validationErrors']['code']))
                            @foreach($response['validationErrors']['code'] as $error)
                                <div class='error'>{{$error}}</div>
                            @endforeach
                        @endif
                    @endif
                @endif
                <div>
                    <input class="form-control" id="code" name="code" type="text" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for='birth_date'>Fecha de nacimiento:</label>
                <input class="form-control" id="birth_date" name="birth_date" type="date" >
            </div>
            <div class="mb-3">
                <label class="form-label" for='sex'>Indique el sexo del animal:</label>
                <select class="form-control" id="sex" name="sex" required>
                    <option value="Macho" selected>Macho</option>
                    <option value="Hembra">Hembra</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for='race'>Indique la raza del animal:</label>
                <select class="form-control" id="race" name="race" required>
                    <option value="Brahaman" selected>Brahaman</option>
                    <option value="Simbra">Simbra</option>
                    <option value="Angus">Angus</option>
                    <option value="Simmental">Simmental</option>
                    <option value=">Holstein">Holstein</option>
                    <option value="Nelore">Nelore</option>    
                    <option value="Jersey">Jersey</option>
                    <option value="Pardo Suizo">Pardo Suizo</option>
                    <option value="Charolais">Charolais</option>
                    <option value="Brandford">Brandford</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for='purchase_type'>Tipo de compra:</label>
                <select class="form-control" id="purchase_type" name="purchase_type" required>
                    <option value="Subasta" selected>Subasta</option>
                    <option value="Particular">Particular</option>
                    <option value="Intercambio">Intercambio</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for='weight'>Peso de compra:</label>
                <select class="form-control" id="weight" name="weight" required></select> 
            </div>
            <div class="mb-3">
                <label class="form-label" for='price_total'>Monto total de la compra:</label>
                @if(!empty($response))
                    @if($response['status'] =='error')
                        @if(!empty($response['validationErrors']['price_total']))
                            @foreach($response['validationErrors']['price_total'] as $error)
                                <div class='error'>{{$error}}</div>
                            @endforeach
                        @endif
                    @endif
                @endif
                <div>
                    <input class="form-control" id="price_total" name="price_total" type="text" required>
                </div>
            </div>
            <div id="action_options">
                <div id="options">
                    <div class="mb-3">
                        <label class="form-label" for='price_kg'>Monto por kilogramo:</label>
                        @if(!empty($response))
                            @if($response['status'] =='error')
                                @if(!empty($response['validationErrors']['price_kg']))
                                    @foreach($response['validationErrors']['price_kg'] as $error)
                                        <div class='error'>{{$error}}</div>
                                    @endforeach
                                @endif
                            @endif
                        @endif
                        <div>
                            <input class="form-control" id="price_kg" name="price_kg" type="text">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for='auction_commission'>Comisión de la subasta (Porcentaje): (Ejem: 5)</label>
                        @if(!empty($response))
                            @if($response['status'] =='error')
                                @if(!empty($response['validationErrors']['auction_commission']))
                                    @foreach($response['validationErrors']['auction_commission'] as $error)
                                        <div class='error'>{{$error}}</div>
                                    @endforeach
                                @endif
                            @endif
                        @endif
                        <div>
                            <select class="form-control" id="auction_commission" name="auction_commission" type="text"></select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for='auction_name'>Nombre de la subasta:</label>
                        @if(!empty($response))
                            @if($response['status'] =='error')
                                @if(!empty($response['validationErrors']['auction_name']))
                                    @foreach($response['validationErrors']['auction_name'] as $error)
                                        <div class='error'>{{$error}}</div>
                                    @endforeach
                                @endif
                            @endif
                        @endif
                        <div>
                            <select class="form-control" id="auction_name" name="auction_name" required>
                                <option value="Subasta Ganadera Rio Blanco">Subasta Ganadera Rio Blanco</option>
                                <option value="Subasta ExpoPococi">Subasta Expococí (Guápiles)</option>
                                <option value="Subasta de Valle la Estrella">Subasta de Valle la Estrella</option>
                                <option value="Camara de Ganaderos Unidos del Sur" >Cámara de Ganaderos Unidos del Sur</option>
                                <option value="Subasta Ganadera UPAP">Subasta Ganadera UPAP</option>
                                <option value="Subasta Ganadera Sancarleña S.A.">Subasta Ganadera Sancarleña S.A.</option>
                                <option value="Subasta Ganadera Maleco Guatuso S.A.">Subasta Ganadera Maleco Guatuso S.A.</option>
                                <option value="Subasta Ganadera Montecillos, Upala">Subasta Ganadera Montecillos, Upala</option>
                                <option value="Grupo de Subastas Sarapiquí PJ">Grupo de Subastas Sarapiquí PJ</option>
                                <option value="Subasta Ganadera El Progreso de Nicoya">Subasta Ganadera El Progreso de Nicoya</option>
                                <option value="Subasta Cámara de Ganaderos de Santa Cruz">Subasta Cámara de Ganaderos de Santa Cruz</option>
                                <option value="Subasta Cámara de Ganaderos de Cañas">Subasta Cámara de Ganaderos de Cañas</option>
                                <option value="Subasta Limonal">Subasta Limonal</option>
                                <option value="Subasta de Tilarán">Subasta de Tilarán</option>
                                <option value="Subasta Cámara de Ganaderos de Hojancha">Subasta Cámara de Ganaderos de Hojancha</option>
                                <option value="Subasta de Ganadera Liberia 07">Subasta de Ganadera Liberia 07</option>
                                <option value="Subasta Ganadera AGAINPA">Subasta Ganadera AGAINPA</option>
                                <option value="Subasta Ganadera El Progreso">Subasta Ganadera El Progreso</option>
                                <option value="Subasta Ganadera de Parrita">Subasta Ganadera de Parrita</option>
                                <option value="Subasta Salama">Subasta Salamá (Neilly)</option>
                                <option value="Subasta San Vito">Subasta San Vito (Cotobruceña)</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                    </div>
                </div>    
            </div>
            <div class="mb-3">
                <label class="form-label" for='purchase_date'>Fecha de la compra:</label>
                <input class="form-control" id="purchase_date" name="purchase_date" type="date" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for='description'>Descripción de la compra:</label>
                @if(!empty($response))
                    @if($response['status'] =='error')
                        @if(!empty($response['validationErrors']['description']))
                            @foreach($response['validationErrors']['description'] as $error)
                                <div class='error'>{{$error}}</div>
                            @endforeach
                        @endif
                    @endif
                @endif
                <div>
                    <textarea class="form-control" id="description" name="description" required></textarea>
                </div>
            </div>
            <input id="father_id" name="father_id" type="hidden" value="unknown">
            <input id="mother_id" name="mother_id" type="hidden" value="unknown">
           
            <input class="btn btn-success btn-lg btn-block" id="btnRegister" type="submit" value="Registrar">     
            
        </form>
    </div> 
</section>
@stop