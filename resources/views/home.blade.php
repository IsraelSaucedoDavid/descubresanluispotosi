@extends('adminlte::page')


@section('title', '| Establecimientos ')


@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

    <div class="container">


        {{-- Tabla de Categorias --}}

        <div class="row">
            <div class="col-lg-6 col-m-12 col-12 mt-6">
                <table class="table table-light">
                    <thead class="thead-light">
                        <tr>
                            <th style="text-align: center">#</th>
                            <th style="text-align: center">Clasificaciones ESAT</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categoria as $itemCat)
                            <tr>
                                <td style="text-align: center">{{ $itemCat->id }}</td>
                                <td style="text-align: center">{{ $itemCat->categorias }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            {{-- Tabla de subcategorias --}}

            <div class="col-lg-6 col-m-12 col-12 mt-6">
                <table class="table table-light">
                    <thead class="thead-light">
                        <tr>
                            <th style="text-align: center">#</th>
                            <th style="text-align: center">ESAT</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcategoria as $itemSubCat)
                            <tr>
                                <td style="text-align: center">{{ $itemSubCat->id }}</td>
                                <td style="text-align: center">{{ $itemSubCat->subcategoria }}</td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Tabla de Instituciones --}}
        <div class="row">
            <div class="col-lg-6 col-m-12 col-12 mt-6">
                <table class="table table-light">
                    <thead class="thead-light">
                        <tr>
                            <th style="text-align: center">#</th>
                            <th style="text-align: center">Institucion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($institucion as $itemIns)
                            <tr>
                                <td style="text-align: center">{{ $itemIns->id }}</td>
                                <td style="text-align: center">{{ $itemIns->institucion }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Tabla de Empresas --}}
            <div class="col-lg-6 col-m-12 col-12 mt-6">
                <table class="table table-light">
                    <thead class="thead-light">
                        <tr>
                            <th style="text-align: center">#</th>
                            <th style="text-align: center">Establecimientos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empresa as $itemEmp)
                            <tr>
                                <td style="text-align: center">{{ $itemEmp->id }}</td>
                                <td style="text-align: center">{{ $itemEmp->nom_empresa }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        {{-- Tabla de Seccion --}}
        <div class="row">
            <div class="col-lg-6 col-m-12 col-12 mt-6">
                <table class="table table-light">
                    <thead class="thead-light">
                        <tr>
                            <th style="text-align: center">#</th>
                            <th style="text-align: center">Seccion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($seccion as $itemSec)
                            <tr>
                                <td style="text-align: center">{{ $itemSec->id }}</td>
                                <td style="text-align: center">{{ $itemSec->seccion }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Tabla de zona --}}
            <div class="col-lg-6 col-m-12 col-12 mt-6">
                <table class="table table-light">
                    <thead class="thead-light">
                        <tr>
                            <th style="text-align: center">#</th>
                            <th style="text-align: center">Zona</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($zona as $iteZona)
                            <tr>
                                <td style="text-align: center">{{ $iteZona->id }}</td>
                                <td style="text-align: center">{{ $iteZona->zona }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-sm-12">
            {{ $seccion->links() }}
        </div>
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
