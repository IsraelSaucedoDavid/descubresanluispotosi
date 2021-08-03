@extends('adminlte::page')


@section('title', '| Galería')

@section('content_header')
    <div class="container">
        <h1>Galeria</h1>
    </div>
@stop


@section('content')
    {{-- Nav menu --}}
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="btn btn-info" href="{{ url('files/create') }}">Agregar Imagenes <span
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
                                <form action="{{ route('files.destroy', $itemFile->id) }}" method="POST"
                                    class="d-inline form-elim">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-12">
                    {{ $files->links() }}
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
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
