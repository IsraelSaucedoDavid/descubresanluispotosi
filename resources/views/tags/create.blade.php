@extends('adminlte::page')


@section('title', '| Crear Tag')

@section('content')
    <form action="{{ url('/tags') }}" method="post" enctype="multipart/form-data">
        <div class="container">
            @csrf
            @include('tags.form',['modo'=>'Crear'])
        </div>
    </form>
    <br><br>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
