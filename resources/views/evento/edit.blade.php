@extends('adminlte::page')


@section('title', '| Editar Evento')

@section('content')
    <div class="container">

        {{-- Enctype se utiliza por que en el formulario se incluiran fotos --}}
        <form action="{{ url('/evento/' . $evento->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- Modificacion del metodo por que se mandan los datos al momento de editar la información --}}
            {{ method_field('PATCH') }}
            {{-- Inclusion del formulario --}}
            @include('evento.form', ['modo'=>'Editar Evento '])
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="css/prueba.css">
@stop

@section('js')
    <script>
        console.log('A que dij0?')

    </script>
@stop
