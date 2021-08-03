@extends('adminlte::page')


@section('title', '| Crear subcategoría')

@section('content')
    <form action="{{ url('/subcategoria') }}" method="post" enctype="multipart/form-data">
        <div class="container">
            @csrf
            @include('subcategoria.form',['modo'=>'Crear'])

        </div>
    </form>
    <br><br>
    <section>
        <div class="container">
            @include('files.form')
        </div>
        <br><br><br><br><br><br>
    </section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
