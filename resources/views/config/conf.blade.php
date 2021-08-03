@extends('adminlte::page')


@section('title', '| Galería')

@section('content_header')
    <div class="container">
        <h1>Configuracion</h1>
    </div>
@stop


@section('content')

    <form action="{{ url('/conf') }}" method="POST">
        @csrf
        {{-- Inlcusion del formulario --}}
        <div class="container">

            {{-- Quitar boton de ayuda --}}
            <div class="form-group col-lg-6 col-m-12 col-12 mt-12">
                <label for="btn_ayuda">Boton de ayuda:</label>
                <select id="btn_ayuda" name="btn_ayuda" class="form-control" value="">
                    <option value="">Elige una opción</option>
                    <option value="1">Agregar</option>
                    <option value="0">Remover</option>
                </select><br>
            </div>

            <input class="btn btn-success" type="submit" value="Aplicar ">

        </div>
    </form>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
