@extends('adminlte::page')


@section('title', '| Galería')

@section('content_header')
    <div class="container">
        <h1>Galeria</h1>
    </div>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Subir imagenes</h1>
                <form action="" method="">
                    @csrf
                    <div class="form-group">
                        <input type="file" name="" id=""> <br>
                    </div>
                    @foreach ($categorias as $categoria)
                        <button type="submit" onclick="guardarFotos({{ $categoria->id }})">Subir imagenes</button>
                    @endforeach
                </form>
            </div>
        </div>
    </div>

    <form name="categoria" id="categoria" action="{{ URL('/sec') }}" target="_self" method="get">
        @csrf
        <input type="hidden" name="id_categoria" id="id_categoria" value="">
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        function guardarFotos(id) {
            $("#id_categoria").val(id);
            $("#categoria").submit();
        }

    </script>


@stop
