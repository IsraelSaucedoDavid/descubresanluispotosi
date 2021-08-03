@extends('adminlte::page')


@section('title', '| Editar Tags')

@section('content')
    <div class="container">
        <form action="{{ url('/tags/' . $tags->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('tags.form', ['modo'=>'Editar'])
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
