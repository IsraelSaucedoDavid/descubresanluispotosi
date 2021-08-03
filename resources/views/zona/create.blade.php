@extends('adminlte::page')


@section('title', '| Registrar Zona')

@section('content')
    <form action="{{ url('/zona') }}" method="post" enctype="multipart/form-data">
        <div class="container">
            @csrf
            @include('zona.form',['modo'=>'Registrar'])

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
