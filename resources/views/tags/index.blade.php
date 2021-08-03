@extends('adminlte::page')


@section('title', '| Subcategorías')

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


        <a href="{{ url('tags/create') }}" class="btn btn-success">Crear nuevo Tag</a><br><br>
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Tags</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->tags }}</td>


                        <td>
                            <a href="{{ url('/tags/' . $tag->id . '/edit') }}" class="btn btn-warning">Editar</a>
                            |

                            <form action="{{ url('/tags/' . $tag->id) }}" class="d-inline" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" class="btn btn-danger"
                                    onclick="return confirm('¿Quieres Borrar el Tag?')" value="Borrar">
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
