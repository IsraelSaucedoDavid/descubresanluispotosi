@extends('adminlte::page')


@section('title', '| Zona')


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


        <a href="{{ url('zona/create') }}" class="btn btn-success">Registrar nueva Zona</a><br><br>
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Zona</th>
                    <th>Foto</th>
                    <th>Seccion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($zona as $itemZona)
                    <tr>
                        <td>{{ $itemZona->id }}</td>
                        <td>{{ $itemZona->zona }}</td>
                        <td>{{ $itemZona->seccion['seccion'] }}</td>
                        <td> <img class="foto_portada card-img-top"
                                src="{{ asset('storage') . '/' . $itemZona->foto_perfil }}" style="width: 100px">
                        <td>
                            <a href="{{ url('/zona/' . $itemZona->id . '/edit') }}" class="btn btn-warning">Editar</a>
                            |

                            <form action="{{ url('/zona/' . $itemZona->id) }}" class="d-inline" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" class="btn btn-danger"
                                    onclick="return confirm('¿Quieres Borrar la Institución?')" value="Borrar">
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $zona->links() }}
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
