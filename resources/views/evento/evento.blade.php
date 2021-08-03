@extends('adminlte::page')


@section('title', '| Eventos')


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


        <a href="{{ url('evento/create') }}" class="btn btn-success">Crear nueva Evento</a>
        <br><br>
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Evento</th>
                    <th>TAG</th>
                    <th>Foto perfil</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($eventos as $evento)
                    <tr>
                        <td>{{ $evento->id }}</td>
                        <td>{{ $evento->title }}</td>
                        <td>{{ $evento->tag }}</td>
                        <td> <img class="foto_portada card-img-top"
                                src="{{ asset('storage') . '/' . $evento->foto_perfil }}" style="width: 100px">
                        </td>



                        <td>
                            <a href="{{ url('/evento/' . $evento->id . '/edit') }}" class="btn btn-warning">Editar</a>



                            <a class="btn btn-info" onclick="verGaleriaEvento({{ $evento->id }})"> Galeria </a>

                            <form action="{{ url('/evento/' . $evento->id) }}" class="d-inline" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" class="btn btn-danger"
                                    onclick="return confirm('¿Quieres Borrar las Categoría?')" value="Borrar">
                            </form>


                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Formulairo para ingresar a los zonas  con el id --}}
        <form name="filesevento" id="filesevento" action="{{ URL('/filesevento') }}" target="_self" method="get">
            @csrf
            <input type="hidden" name="id_evento" id="id_evento" value="">
        </form>

    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

    <script>
        function verGaleriaEvento(id) {

            $("#id_evento").val(id);
            $("#filesevento").submit();
        }
    </script>
@stop
