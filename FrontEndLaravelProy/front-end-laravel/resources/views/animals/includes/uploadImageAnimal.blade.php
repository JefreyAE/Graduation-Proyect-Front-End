@section('uploadImageAnimal')
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Agregar una nueva imagen
                    </button>
                </h2>
            </div>

            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <form class="form-data" id="uploadImage" action="#" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="mb-2">
                            <label class="form-label" for="title">Titulo:</label>
                            <input type="text" class="form-control" name="title" id="title" pattern="[A-Za-z0-9\s]+"
                                title="Solo números y letras" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="description">Descripción:</label>
                            <textarea class="form-control" name="description" id="description" pattern="[A-Za-z0-9\s]+"
                                title="Solo números y letras" required></textarea>
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="file0">Selecciona una imagen:</label>
                            <input type="file" class="form-control" name="file0" id="file0">
                        </div>
                        <input type="hidden" name="animal_id" id="animal_id" value="{{ $animal_id }}">
                        <input type="hidden" name="tk" id="tk" value="{{ $tk }}">
                        <input class="btn btn-success" type="submit" value="Subir imagen">
                        <div id="cargando" style="display:none">
                          <div class="d-flex justify-content-center">
                            <div class="spinner-border text-success" role="status">
                            </div>
                            <div class="spinner-border text-danger" role="status">
                            </div>
                            <div class="spinner-border text-warning" role="status">
                            </div>
                          </div>
                          <span class="alert ">Subiendo imagen...</span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@stop
@yield('uploadImageAnimal')
