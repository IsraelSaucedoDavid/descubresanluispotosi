@extends('adminlte::page')


@section('title', '| Crear categoría')


@section('content')
    <form action="{{ url('/categoria') }}" method="post" enctype="multipart/form-data">
        <div class="container">
            @csrf
            @include('categoria.form',['modo'=>'Crear'])
        </div>
    </form>
    <br><br><br>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')


@stop
