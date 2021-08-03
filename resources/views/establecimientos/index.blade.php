@extends('adminlte::page')


@section('title', '| Empresas')

@section('content_header')
    <h1>Establecimiento</h1>
@stop

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


        <a href="{{ url('establecimientos/create') }}" class="btn btn-success">Registrar nuevo establecimiento</a><br><br>
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Establecimientos</th>
                    <th>Foto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($establecimientos as $establecimiento)
                    <tr>
                        <td>{{ $establecimiento->id }}</td>
                        <td>{{ $establecimiento->nom_esta }}</td>
                        <td> <img class="foto_portada card-img-top"
                                src="{{ asset('storage') . '/' . $establecimiento->foto_perfil }}" style="width: 100px">
                        <td>
                            {{-- <button onclick="verEsta({{ $establecimiento->id }})" class="btn btn-info">
                                Ver</button> --}}

                            <a href="{{ url('/establecimientos/' . $establecimiento->id . '/edit') }}"
                                class="btn btn-warning"> Editar </a>




                            <a class="btn btn-info" onclick="verGaleriaEstablecimiento({{ $establecimiento->id }})">
                                Galeria </a>




                            <form action="{{ url('/establecimientos/' . $establecimiento->id) }}" class="d-inline"
                                method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" class="btn btn-danger"
                                    onclick="return confirm('¿Quieres Borrar el establecimiento?')" value="Borrar">
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <form name="establecimiento" id="establecimiento" action="{{ URL('/ver') }}" target="_self" method="get">
        @csrf
        <input type="hidden" name="id_esta" id="id_esta" value="">
    </form>

    {{-- Formulairo para ingresar a los zonas  con el id --}}
    <form name="filesestablecimiento" id="filesestablecimiento" action="{{ URL('/filesestablecimiento') }}"
        target="_self" method="get">
        @csrf
        <input type="hidden" name="id_establecimiento" id="id_establecimiento" value="">
    </form>
@stop




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>



</body>
@section('css')
@stop

@section('js')

    <script>
        function verGaleriaEstablecimiento(id) {

            $("#id_establecimiento").val(id);
            $("#filesestablecimiento").submit();
        }
    </script>

    <script>
        function verEsta(id) {
            $("#id_esta").val(id);
            $("#establecimiento").submit();
        }
    </script>
@stop
