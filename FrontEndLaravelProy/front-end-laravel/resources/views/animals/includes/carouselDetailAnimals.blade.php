@section('carouselDetailAnimals')
    <div id="carouselExampleCaptions" class="rounded carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php $contador1 = 0 ?>
            @foreach ($listImages as $image)
                    <?php if ($contador1 == 0): ?>
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <?php else: ?>
                        <li data-target="#carouselExampleCaptions" data-slide-to="<?=$contador1?>"></li>
                    <?php endif; ?>
                <?php $contador1++ ?>
            @endforeach
        </ol>
        <div class="carousel-inner">
            <?php $contador = 0 ?>
            @foreach ($listImages as $image)
                    <?php if ($contador == 0): ?>
                        <div class="carousel-item active">
                    <?php else: ?>
                        <div class="carousel-item ">
                    <?php endif; ?>
                    <img src="{{ url($url_api . '/api/animals/image/' . $image['image_name']) }}" class="rounded d-block w-100 carousel-img-height"
                        alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{$image['title']}}</h5>
                        <p>{{$image['description']}}</p>
                        <a id="btnImageDelete" class="btn btn-sm btn-outline-danger"  href="{{url('/animals/image-delete/'.$image['image_name'].'/'.$animal_id)}}" >Borrar</a>
                    </div>
                </div>
                <?php $contador++ ?>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    
    </div>
    @include('animals.includes.uploadImageAnimal')
@stop
@yield('carouselDetailAnimals')
