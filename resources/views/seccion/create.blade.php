@extends('adminlte::page')


@section('title', '| Registrar Seccion')

@section('content')
    <form action="{{ url('/seccion') }}" method="post" enctype="multipart/form-data">
        <div class="container">
            @csrf
            @include('seccion.form',['modo'=>'Registrar'])

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
