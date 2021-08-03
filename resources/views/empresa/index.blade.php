@extends('adminlte::page')


@section('title', '| Empresas')

@section('content_header')
    <h1>Establecimiento</h1>
@stop

@section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.0.45/css/materialdesignicons.min.css"
        integrity="sha256-nRyVCcVDSlWN9d68r9M+rKBLE4k9Cp1j3XSY/umjvvU=" crossorigin="anonymous" />
    {{-- CSS --}}
    <link rel="stylesheet" href="css/gacss.css">


    <body class="noselect">

        {{-- Mensaje de éxito para crear o actualizar o eliminar --}}
        @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ Session::get('mensaje') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif




        {{-- Tabla contenedora de los datos --}}
        <div class="container-fluid">
            <a href="{{ url('empresa/create') }}" class="btn btn-success">Registrar nuevo
                establecimiento</a>
            <nav class="navbar navbar-light bg-light float-right">
                <form class="form-inline">
                    <input name="buscador" class="form-control mr-sm-2" type="search" placeholder="Buscar"
                        aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>
            </nav>
            <br><br>
            {{-- Aquí se carga la paginacion que ya se establecio en el controlador --}}
            {{ $empresas->links() }}
            <table class="table table-light table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th> # </th>
                        <th>Nombre</th>
                        <th>tag</th>
                        <th>Municipio</th>
                        <th>Foto perfil</th>
                        <th>Foto Portada</th>
                        <th>Acciones</th>

                    </tr>
                </thead>

                <tbody>
                    <!-- Utilizacion de foreach para cargar los datos de la base de datos -->
                    @foreach ($empresas as $empresa)
                        <tr>
                            <td id="id_emp" value={{ $empresa->id }}>{{ $empresa->id }}</td>
                            <td>{{ $empresa->nom_empresa }}</td>
                            <td>{{ $empresa->tag }}</td>
                            <td>{{ $empresa->id_municipio }}</td>
                            <td><img class="foto_portada" src="{{ asset('storage') . '/' . $empresa->foto_perfil }}"
                                    style="width: 60px;"></td>
                            <td><img class="foto_perfil" src="{{ asset('storage') . '/' . $empresa->foto_portada }} "
                                    style="width: 60px;"></td>
                            <td>
                                <a href="{{ url('/empresa/' . $empresa->id . '/edit') }}" class="btn btn-warning">
                                    Editar </a>



                                <a class="btn btn-info" onclick="verGaleriaEmpresa({{ $empresa->id }})"> Galeria </a>

                                <form action="{{ url('/empresa/' . $empresa->id) }}" class="d-inline" method="post">
                                    @csrf
                                    {{ @method_field('DELETE') }}
                                    <input class="btn btn-danger" type="submit"
                                        onclick="return confirm('¿Quieres borrar la empresa?')" value="Borrar">
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Formulairo para ingresar a los zonas  con el id --}}
        <form name="filesempresa" id="filesempresa" action="{{ URL('/filesempresa') }}" target="_self" method="get">
            @csrf
            <input type="hidden" name="id_empresa" id="id_empresa" value="">
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
    <script src="js/dotdotdot.js"></script>





</body>
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>


    <script>

    </script>

    <script>
        function verGaleriaEmpresa(id) {

            $("#id_empresa").val(id);
            $("#filesempresa").submit();
        }
    </script>
@stop
