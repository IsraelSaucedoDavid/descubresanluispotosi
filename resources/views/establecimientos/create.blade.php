@extends('adminlte::page')


@section('title', '| Registrar establecimiento')

@section('content')
    <div class="container">

        {{-- Enctype se utiliza por que en el formulario se incluiran fotos --}}
        {{-- Aqui no se modifica el metodo porque asi es indicado por el comando (php artisan r:l "route:list" ) --}}
        <form action="{{ url('/establecimientos') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- Inlcusion del formulario --}}
            @include('establecimientos.form', ['modo'=>'Registrar establecimiento'])

        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>S
@stop
