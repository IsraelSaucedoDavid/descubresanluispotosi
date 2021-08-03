@extends('adminlte::page')


@section('title', '| Registrar institución')

@section('content')
    <form action="{{ url('/institucion') }}" method="post" enctype="multipart/form-data">
        <div class="container">
            @csrf
            @include('institucion.form',['modo'=>'Registrar'])

        </div>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
    <script>
        console.log('Hi!');

    </script>
@stop
