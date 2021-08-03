@extends('adminlte::page')


@section('title', '| Establecimiento ')

@section('content_header')
    <h1>Establecimiento</h1>
@stop

@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="css/descripcion.css">

    <body class="noselect">


        <!--contenido -->
        <div class="container">
            <div class="row">

                @foreach ($establecimientos as $establecimiento)
                    <div class="col-sm-12" id="logodes">
                        <img class="logo" src="{{ asset('storage') . '/' . $establecimiento->foto_perfil }}">
                    </div>
                    <div class="col-sm-12"><br></div>
                    <!-- Carrusel -->
                    <div class="col-sm-6" id="carruseldes">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>

                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img id="imgcarrusel" class="d-block w-100"
                                        src="{{ asset('storage') . '/' . $establecimiento->foto_portada }}"
                                        alt="First slide">
                                </div>

                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <div class="col-sm-12"><br></div>
                        <!-- Redes Sociales-->
                        <div class="row" id="redessociales">

                            <div class="socials col-sm-12">
                                <!--Facebook  -->
                                @if ($establecimiento->face != null)
                                    <a href="{{ $establecimiento->face }}" target="_blank"> <i
                                            class="fab fa-facebook"></i>
                                    </a>
                                @endif
                                &nbsp;
                                <!--Instagram -->
                                @if ($establecimiento->insta != null)
                                    <a href="{{ $establecimiento->insta }}" target="_blank"> <i
                                            class="fab fa-instagram"></i></a>
                                @endif
                                &nbsp;
                                <!--Pagina web-->
                                @if ($establecimiento->sitio != null)
                                    <a href="{{ $establecimiento->sitio }}" target="_blank"> <i
                                            class="fab fa-chrome"></i></a>
                                @endif
                                &nbsp;
                            </div>
                            <div class="col-sm-12">
                                <div><br><br><br></div>
                            </div>
                        </div>

                    </div>

                    <!--Termina carrusel-->


                    <!--Contenido -->
                    <div class="col-sm-6">
                        <div class="col-sm-12" id="nomdes">
                            <!--Nombre -->
                            <h4>{{ $establecimiento->nom_esta }} </h4>
                        </div>
                        <hr>
                        <div id="line">
                            <!--Telefono -->
                            @if ($establecimiento->telefono != null)
                                <a href="tel:{{ $establecimiento->telefono }}">
                                    <img class="redes" src="img/png/phone-32.png" />
                                    <p class="font-weight-normal">{{ $establecimiento->telefono }}</p>
                                </a>
                            @endif

                            <hr>

                            <!--Descripcion -->
                            @if ($establecimiento->descripcion != null)
                                <div class="row">
                                    <div class="col-lg-1  col-2 mt-4">
                                        <img class="redes" src="img/png/024-file.png" />
                                    </div>
                                    <div class="col-lg-11  col-10 mt-4">
                                        <p class="font-weight-normal">{{ $establecimiento->descripcion }} </p>
                                    </div>
                                </div>
                            @endif

                            <hr>
                            <!--Direccion -->
                            @if ($establecimiento->direccion != null)
                                <div class="row">
                                    <div class="col-lg-1  col-2 mt-4">
                                        <img class="redes" src="img/png/006-pin.png" />
                                    </div>
                                    <div class="col-lg-11  col-10 mt-4">
                                        <p class="font-weight-normal">{{ $establecimiento->direccion }} </p>
                                    </div>
                                </div>
                            @endif

                            <hr>
                            <!--Rango precios-->
                            @if ($establecimiento->rango_precios != null)
                                <div class="row">
                                    <div class="col-lg-1  col-2 mt-4">
                                        <img class="redes" src="img/png/money.png" />
                                    </div>
                                    <div class="col-lg-11  col-10 mt-4">
                                        <p class="font-weight-normal">{{ $establecimiento->rango_precios }} </p>
                                    </div>
                                </div>
                            @endif
                            <hr>
                            <!--tipo de comida-->
                            @if ($establecimiento->tipo_comida != null)
                                <div class="row">
                                    <div class="col-lg-1  col-2 mt-4">
                                        <img class="redes" src="img/png/comida.png" />
                                    </div>
                                    <div class="col-lg-11  col-10 mt-4">
                                        <p class="font-weight-normal">{{ $establecimiento->tipo_comida }} </p>
                                    </div>
                                </div>
                            @endif

                            <hr>
                            <!--Horairos -->
                            @if ($establecimiento->horario != null)
                                <div class="row">
                                    <div class="col-lg-1  col-2 mt-4">
                                        <img class="redes" src="img/png/horario.png" />
                                    </div>
                                    <div class="col-lg-11  col-10 mt-4">
                                        <p class="font-weight-normal">{{ $establecimiento->horario }} </p>
                                    </div>
                                </div>
                            @endif

                            <hr>
                            <!-- Pago tarjeta-->
                            @if ($establecimiento->pago_tarjeta != null)
                                <div class="row">
                                    <div class="col-lg-1  col-2 mt-4">
                                        <img class="redes" src="img/png/pagotarjeta.png" />
                                    </div>
                                    <div class="col-lg-11  col-10 mt-4">
                                        <p class="font-weight-normal">{{ $establecimiento->pago_tarjeta }}</p>
                                    </div>
                                </div>
                            @endif

                            <hr>
                            <!--Estacionamiento -->
                            @if ($establecimiento->estacionamiento != null)
                                <div class="row">
                                    <div class="col-lg-1  col-2 mt-4">
                                        <img class="redes" src="img/png/estacionamiento.png" />
                                    </div>
                                    <div class="col-lg-11  col-10 mt-4">
                                        <p class="font-weight-normal">{{ $establecimiento->estacionamiento }}</p>
                                    </div>
                                </div>
                            @endif

                            <hr>
                            <!--Servicio domicilio-->
                            @if ($establecimiento->ser_dom != null)
                                <div class="row">
                                    <div class="col-lg-1  col-2 mt-4">
                                        <img class="redes" src="img/png/serdom.png" />
                                    </div>
                                    <div class="col-lg-11  col-10 mt-4">
                                        <p class="font-weight-normal">{{ $establecimiento->ser_dom }} </p>
                                    </div>
                                </div>
                            @endif

                            <hr>
                            <iframe class="mapa"
                                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14782.38981809307!2d-100.96939749999999!3d22.141318700000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2smx!4v1616688291752!5m2!1ses-419!2smx"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                        <hr>
                    </div>
                @endforeach
            </div>
            <br>
        </div>




    @stop




    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="js/dotdotdot.js"></script>



</body>
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');

    </script>
@stop
