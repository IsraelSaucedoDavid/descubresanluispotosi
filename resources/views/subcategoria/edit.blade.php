@extends('adminlte::page')


@section('title', '| Editar subcategoría')

@section('content')
    <div class="container">
        <form action="{{ url('/subcategoria/' . $subcategoria->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('subcategoria.form', ['modo'=>'Editar'])
        </form>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');

    </script>
@stop
