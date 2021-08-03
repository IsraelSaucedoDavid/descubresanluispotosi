@extends('adminlte::page')


@section('title', '| Paquetes')


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


        <a href="{{ url('paquete/create') }}" class="btn btn-success">Crear nuevo Paquete</a>
        <br><br>
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Paquete</th>
                    <th>TAG</th>
                    <th>Foto perfil</th>
                    <th>Acciones</th>
                    <th>Galeria</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($paquetes as $paquete)
                    <tr>
                        <td>{{ $paquete->id }}</td>
                        <td>{{ $paquete->paquetes }}</td>
                        <td>{{ $paquete->tag }}</td>
                        <td> <img class="foto_portada card-img-top"
                                src="{{ asset('storage') . '/' . $paquete->foto_perfil }}" style="width: 100px">
                        </td>



                        <td>
                            <a href="{{ url('/paquete/' . $paquete->id . '/edit') }}" class="btn btn-warning">Editar</a>
                            |

                            <form action="{{ url('/paquete/' . $paquete->id) }}" class="d-inline" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" class="btn btn-danger"
                                    onclick="return confirm('¿Quieres Borrar el paquete?')" value="Borrar">
                            </form>


                        </td>
                        <td>
                            <div onclick="verImg({{ $paquete->id }})">
                                <p>Agregar imagenes</p>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Formulairo para ingresar a la empresa directamente con el id --}}
        <form name="paquete" id="paquete" action="{{ URL('/galeria') }}" target="_self" method="post">
            @csrf
            <input type="hidden" name="id_cat" id="id_cat" value="">
        </form>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        function verImg(id) {
            $("#id_cat").val(id);
            $("#paquete").submit();
        }

    </script>

@stop
