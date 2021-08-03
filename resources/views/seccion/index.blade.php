@extends('adminlte::page')


@section('title', '| Seccion')


@section('content')
    <div class="container">

        @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ Session::get('mensaje') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif


        <a href="{{ url('seccion/create') }}" class="btn btn-success">Registrar nueva Seccion</a><br><br>
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Seccion</th>
                    <th>Foto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($seccion as $itemSec)
                    <tr>
                        <td>{{ $itemSec->id }}</td>
                        <td>{{ $itemSec->seccion }}</td>
                        <td> <img class="foto_portada card-img-top"
                                src="{{ asset('storage') . '/' . $itemSec->foto_perfil }}" style="width: 100px">
                        <td>
                            <a href="{{ url('/seccion/' . $itemSec->id . '/edit') }}" class="btn btn-warning">Editar</a>
                            |

                            <form action="{{ url('/seccion/' . $itemSec->id) }}" class="d-inline" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" class="btn btn-danger"
                                    onclick="return confirm('¿Quieres Borrar la Sección?')" value="Borrar">
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');

    </script>
@stop
