@extends('adminlte::page')


@section('title', '| Categorías')


@section('content')
    <div class="container">
        @include('files.form')
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css">

@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>

    <script>
        // "myAwesomeDropzone" is the camelized version of the HTML element's ID
        Dropzone.options.myAwesomeDropzone = {
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },

            dictDefaultMessage: "Arrastra las imagenes que deseas guardar",
            acceptedFiles: "image/jpeg, image/png, image/gif, image/jpg",

        };

    </script>
@stop
