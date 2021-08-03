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


        <a href="{{ url('subcategoria/create') }}" class="btn btn-success">Crear nueva Subategoría</a><br><br>
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Subcategoria</th>
                    <th>Categoria</th>
                    <th>Foto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subcategorias as $subcategoria)
                    <tr>
                        <td>{{ $subcategoria->id }}</td>
                        <td>{{ $subcategoria->subcategoria }}</td>
                        <td>{{ $subcategoria->id_categoria }}</td>
                        <td> <img class="foto_portada card-img-top"
                                src="{{ asset('storage') . '/' . $subcategoria->foto_perfil }}" style="width: 100px">
                        </td>
                        <td>
                            <a href="{{ url('/subcategoria/' . $subcategoria->id . '/edit') }}"
                                class="btn btn-warning">Editar</a>
                            |

                            <form action="{{ url('/subcategoria/' . $subcategoria->id) }}" class="d-inline" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" class="btn btn-danger"
                                    onclick="return confirm('¿Quieres Borrar la Subcategoría?')" value="Borrar">
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $subcategorias->links() }}
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
