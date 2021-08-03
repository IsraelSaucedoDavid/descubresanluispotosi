<div class="row">
    <div class="col">
        <h4>Subir imagenes para la galería</h4>
        {{-- <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('filesempresa.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" id="" accept="image/*">
                    <br>
                    @error('file')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <br>
                    <button type="submit" class="btn btn-success">Subir Imagen </button>
                </form>
            </div>
        </div> --}}


        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="btn btn-info" href="{{ url('filesempresa') }}">Guardar <span
                                class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <form action="{{ route('filesempresa.store') }}" method="POST" class="dropzone" id="my-awesome-dropzone">
        </form>
    </div>
</div>
