@extends('adminlte::page')


@section('title', '| Registrar establecimiento')

@section('content')
    <div class="container">

        {{-- Enctype se utiliza por que en el formulario se incluiran fotos --}}
        {{-- Aqui no se modifica el metodo porque asi es indicado por el comando (php artisan r:l "route:list" ) --}}
        <form action="{{ url('/empresa') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- Inlcusion del formulario --}}
            @include('empresa.form', ['modo'=>'Registrar establecimiento'])

        </form>
    </div>
@stop

@section('css')

    <link rel="stylesheet" href="{{ asset('css/formestablecimiento.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

@section('js')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



    <script>
        $('.ejem-select2').select2();
    </script>


@stop
