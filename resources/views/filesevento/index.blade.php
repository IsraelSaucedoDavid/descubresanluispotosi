@extends('adminlte::page')


@section('title', '| Galería')

@section('content_header')
    <div class="container">
        <h1>Galeria</h1>
    </div>


@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css">

@stop


@section('content')
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="btn btn-info" href="{{ url('evento') }}">Regresar <span
                                class="sr-only">(current)</span></a>
                    </li>

                </ul>
            </div>
        </nav>



        {{-- Tarjeta de imagenes --}}
        <div class="row">
            <div class="col">
                <div class="card-columns">
                    @foreach ($files as $itemFile)
                        <div class="card" style="width: 20rem; ">
                            <img class="card-img-top" src="{{ asset($itemFile->url) }}" alt="">
                            <div class="card-body">
                                <form action="{{ route('filesestablecimiento.destroy', $itemFile->id) }}" method="POST"
                                    class="d-inline form-elim">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>


        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('filesevento.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" id="" accept="image/*">
                    <br><br>

                    <div class="form-group col-lg-6 col-m-6 col-6 mt-6">
                        <label for="id_evento">Evento:</label>
                        <select id="id_evento" name="id_evento" class="form-control" required value="">
                            <option value="">Selecciona...</option>

                            @foreach ($evento as $itemEvento)
                                <option value="{{ $itemEvento->id }}"> {{ $itemEvento->title }}</option>
                            @endforeach
                        </select><br>
                    </div>

                    @error('file')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <br>
                    <button type="submit" class="btn btn-success">Subir Imagen </button>
                </form>
            </div>
        </div>




        {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="btn btn-info" href="{{ url('filesevento') }}">Guardar <span
                                class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <form action="{{ route('filesevento.store') }}" method="POST" class="dropzone" id="my-awesome-dropzone">
        </form> --}}
        <br><br><br><br><br><br>
    </div>
@stop



@section('js')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>

    <script>
        // "myAwesomeDropzone" is the camelized version of the HTML element's ID
        Dropzone.options.myAwesomeDropzone = {
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },

            dictDefaultMessage: "Arrastra las imagenes que deseas guardar",
            acceptedFiles: "image/jpeg, image/png, image/gif, image/jpg",

        };
    </script>




    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                'Eliminado!',
                'La imagen fue eliminada.',
                'success'
            )
        </script>
    @endif

    <script>
        $('form-elim').submit(function(e) {
            e.preventDesault();

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    /**/
                    this.submit();
                }
            })
        });
    </script>
@stop
