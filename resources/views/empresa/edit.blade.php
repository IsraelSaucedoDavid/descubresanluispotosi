@extends('adminlte::page')



@section('title', '| Editar establecimiento')

@section('content')
    <div class="container">

        {{-- Enctype se utiliza por que en el formulario se incluiran fotos --}}
        <form action="{{ url('/empresa/' . $empresa->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- Modificacion del metodo por que se mandan los datos al momento de editar la información --}}
            {{ method_field('PATCH') }}
            {{-- Inclusion del formulario --}}
            @include('empresa.form', ['modo'=>'Editar establecimiento '])
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
