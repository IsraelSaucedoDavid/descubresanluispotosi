@extends('adminlte::page')


@section('title', '| Categorías')


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


        <a href="{{ url('categoria/create') }}" class="btn btn-success">Crear nueva Categoría</a>
        <br><br>
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Categoria</th>
                    <th>Foto perfil</th>
                    <th>Acciones</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->categorias }}</td>
                        <td> <img class="foto_portada card-img-top"
                                src="{{ asset('storage') . '/' . $categoria->foto_perfil }}" style="width: 100px">
                        </td>



                        <td>
                            <a href="{{ url('/categoria/' . $categoria->id . '/edit') }}"
                                class="btn btn-warning">Editar</a>
                            |

                            <form action="{{ url('/categoria/' . $categoria->id) }}" class="d-inline" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" class="btn btn-danger"
                                    onclick="return confirm('¿Quieres Borrar las Categoría?')" value="Borrar">
                            </form>


                        </td>
                        <td>
                            <div onclick="verImg({{ $categoria->id }})">
                                <p>Agregar imagenes</p>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Formulairo para ingresar a la empresa directamente con el id --}}
        <form name="categoria" id="categoria" action="{{ URL('/galeria') }}" target="_self" method="post">
            @csrf
            <input type="hidden" name="id_cat" id="id_cat" value="">
        </form>
        {{ $categorias->links() }}
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        function verImg(id) {
            $("#id_cat").val(id);
            $("#categoria").submit();
        }

    </script>

@stop
