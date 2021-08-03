<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="css/descripcion.css">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

    <link rel="shortcut icon" href="favicons/logo2slp.png">


    @foreach ($eventos as $evento)
        <title>{{ $evento->tittle }}</title>
    @endforeach



</head>

<body class="noselect">

    @include('vistas.nav')

    <br><br><br>
    <!--contenido -->
    <div class="container">
        <div class="row">

            @foreach ($eventos as $evento)

                <div class="col-sm-12"><br></div>
                <!-- Carrusel -->
                <div class="col-sm-6" id="carruseldes">
                    <div class="container-slides">
                        <div class="main-carousel">
                            <div class="carousel-cell">
                                <img src="{{ asset('storage') . '/' . $evento->foto_perfil }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12"><br><br>
                    </div>
                    <!-- Redes Sociales-->
                    <div class="row" id="redessociales">

                        <div class="socials col-sm-12">
                            <!--Pagina web-->
                            @if ($evento->sitio != null)
                                <a href="{{ $evento->sitio }}" target="_blank"> <i class="fab fa-chrome"></i></a>
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
                        <h4>{{ $evento->title }} </h4>
                    </div>
                    <hr color="#AA1E82 " style="height: 2px">
                    <div id="line">
                        <!--Telefono -->

                        @if ($evento->telefono != null)
                            <a href="tel:{{ $evento->telefono }}">
                                <div class="row">
                                    <div class="col-lg-1  col-2 mt-4">
                                        <img class="redes" src="img/png/024-file.png" />
                                    </div>
                                    <div class="col-lg-11  col-10 mt-4">
                                        <p class="font-weight-normal">{{ $evento->telefono }}</p>
                                    </div>
                                </div>
                            </a>
                            <hr color="#AA1E82 " style="height: 2px">
                        @endif

                        <!--Descripcion -->
                        @if ($evento->descripcion != null)
                            <div class="row">
                                <div class="col-lg-1  col-2 mt-4">
                                    <img class="redes" src="img/png/024-file.png" />
                                </div>
                                <div class="col-lg-11  col-10 mt-4">
                                    <p class="font-weight-normal">{{ $evento->descripcion }} </p>
                                </div>
                            </div>
                            <hr color="#AA1E82 " style="height: 2px">
                        @endif


                        <!--Direccion -->
                        @if ($evento->direccion != null)
                            <div class="row">
                                <div class="col-lg-1  col-2 mt-4">
                                    <img class="redes" src="img/png/006-pin.png" />
                                </div>
                                <div class="col-lg-11  col-10 mt-4">
                                    <p class="font-weight-normal">{{ $evento->direccion }} </p>
                                </div>
                            </div>
                            <hr color="#AA1E82 " style="height: 2px">
                        @endif

                        <!--Horairos -->
                        @if ($evento->horario != null)
                            <div class="row">
                                <div class="col-lg-1  col-2 mt-4">
                                    <img class="redes" src="img/png/horario.png" />
                                </div>
                                <div class="col-lg-11  col-10 mt-4">
                                    <p class="font-weight-normal">{{ $evento->horario }} </p>
                                </div>
                            </div>
                            <hr color="#AA1E82 " style="height: 2px">
                        @endif


                        <!-- Pago tarjeta-->
                        @if ($evento->pago_tarjeta != null)
                            <div class="row">
                                <div class="col-lg-1  col-2 mt-4">
                                    <img class="redes" src="img/png/pagotarjeta.png" />
                                </div>
                                <div class="col-lg-11  col-10 mt-4">
                                    <p class="font-weight-normal">{{ $evento->pago_tarjeta }}</p>
                                </div>
                            </div>
                            <hr color="#AA1E82 " style="height: 2px">
                        @endif


                        <!--Estacionamiento -->
                        @if ($evento->estacionamiento != null)
                            <div class="row">
                                <div class="col-lg-1  col-2 mt-4">
                                    <img class="redes" src="img/png/estacionamiento.png" />
                                </div>
                                <div class="col-lg-11  col-10 mt-4">
                                    <p class="font-weight-normal">{{ $evento->estacionamiento }}</p>
                                </div>
                            </div>
                            <hr color="#AA1E82 " style="height: 2px">
                        @endif



                        <iframe class="mapa"
                            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14782.38981809307!2d-100.96939749999999!3d22.141318700000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2smx!4v1616688291752!5m2!1ses-419!2smx"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            @endforeach
        </div>
        <br>
    </div>



    {{-- Footer --}}
    <section id="contactos">
        <div class="container-fluid" id="footer">
            <div class="row">
                <div class="sol-sm 12"><br></div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <ul class="footer" style="cursor: pointer"><i class="fas fa-circle"></i>&nbsp;&nbsp; Explorar un
                        Estado
                    </ul>
                    <ul class="footer" style="cursor: pointer"><i class="fas fa-circle"></i>&nbsp;&nbsp; Explorar un
                        Municipio </ul>

                    <ul class="footer" style="cursor: pointer"><i class="fas fa-circle"></i>&nbsp;&nbsp; Destino en
                        Especifico
                    </ul>
                </div>
                <div class="col-sm-3">
                    {{-- <ul class="footer" style="cursor: pointer" onclick="verPaquetes()"><i
                        class="fas fa-circle"></i>&nbsp;&nbsp; PAQUETES
                </ul> --}}
                    <ul class="footer" style="cursor: pointer"><i class="fas fa-circle"></i>&nbsp;&nbsp; Turismo y
                        Convenciones</ul>
                    <a href="info_eventos">
                        <ul class="footer" style="cursor: pointer"><i class=" fas fa-circle"></i>&nbsp;&nbsp; Eventos
                        </ul>
                    </a>
                </div>
                <div class="col-sm-3">
                </div>
                <div class="col-sm-3">
                    {{-- <ul class="footer" style="cursor: pointer" onclick="verEstablecimientos()"><i
                        class="fas fa-circle"></i>&nbsp;&nbsp;
                    Establecimientos</ul> --}}
                    <ul class="footer" style="cursor: pointer" onclick=""><i class="fas fa-circle"></i>&nbsp;&nbsp;
                        Descargar PDF</ul>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12" id="redes">
                    <br>
                    <img src="img/png/facebook.png" alt=""
                        style="cursor: pointer">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="img/png/twitter.png" alt=""
                        style="cursor: pointer">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="img/png/instagram.png" alt=""
                        style="cursor: pointer">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="img/png/youtube.png" alt=""
                        style="cursor: pointer">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <br>
                </div>
            </div>
        </div>
    </section>



    {{-- Formulairo para ingresar a los evento --}}
    <form name="eventos" id="eventos" action="{{ URL('/info_eventos') }}" target="_self" method="get">
        @csrf
        <input type="hidden" name="id_eventos" id="id_eventos" value="">
    </form>

    {{-- Formulairo para ingresar a la empresa directamente con el id --}}
    <form name="evento" id="evento" action="{{ URL('/descripcion_evento') }}" target="_self" method="get">
        @csrf
        <input type="hidden" name="id_evento" id="id_evento" value="">
    </form>

    {{-- Formulairo para ver contenido de las secciones con el id --}}
    <form name="seccion" id="seccion" action="{{ URL('/sec') }}" target="_self" method="get">
        @csrf
        <input type="hidden" name="id_sec" id="id_sec" value="">
    </form>

    {{-- Formulairo para ingresar a los paquetes  con el id --}}
    <form name="paquetes" id="paquetes" action="{{ URL('/paquetes') }}" target="_self" method="get">
        @csrf
        <input type="hidden" name="id_paquetes" id="id_paquetes" value="">
    </form>

    {{-- Formulairo para ingresar a los paquetes  con el id --}}
    <form name="paquete" id="paquete" action="{{ URL('/paq') }}" target="_self" method="get">
        @csrf
        <input type="hidden" name="id_paq" id="id_paq" value="">
    </form>

    {{-- Formulairo para ingresar a los zonas  con el id --}}s
    <form name="zonas" id="zonas" action="{{ URL('/zon') }}" target="_self" method="get">
        @csrf
        <input type="hidden" name="id_zona" id="id_zona" value="">
    </form>

    {{-- Formulairo para ingresar a los estblecimiento  con el id --}}
    <form name="esta" id="establecimiento" action="{{ URL('/descripcion_empresa') }}" target="_self" method="get">
        @csrf
        <input type="hidden" name="id_esta" id="id_esta" value="">
    </form>

    {{-- Formulairo para ingresar a los establecimientos por parte del ususario  con el id --}}
    <form name="estable" id="establecimientos" action="{{ URL('/establecimientosi') }}" target="_self" method="get">
        @csrf
        <input type="hidden" value="">
    </form>

    {{-- Formulairo para ingresar a los estableciomientos por el admin  con el id --}}
    <form name="estable" id="empresas" action="{{ URL('/establecimientosi') }}" target="_self" method="get">
        @csrf
        <input type="hidden" name="id_emp" id="id_emp" value="">
    </form>



    <script src="js/direcciones.js"></script>



    <!--Scripts Bootstrap-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <!--Font awesome-->
    <script src="https://kit.fontawesome.com/51d5db4053.js" crossorigin="anonymous"></script>


    {{-- gsap --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/ScrollTrigger.min.js"></script>

    {{-- Carrusel --}}
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="js/carouseldescripcion.js"></script>

    {{-- Scripts paginas --}}
    <script>
        function verEventos() {
            $("#eventos").submit();
        }

        function verEvento(id) {
            $("#id_evento").val(id);
            $("#evento").submit();
        }

        function verSeccion(id) {
            $("#id_sec").val(id);
            $("#seccion").submit();
        }

        function verPaquetes() {
            $("#paquetes").submit();
        }

        function verPaquete(id) {
            $("#id_paq").val(id);
            $("#paquete").submit();
        }

        function verZona(id) {
            $("#id_zona").val(id);
            $("#zonas").submit();
        }

        function verEsta(id) {
            $("#id_esta").val(id);
            $("#establecimiento").submit();
        }

        function verEstable(id) {
            $("#id_esta").val(id);
            $("#establecimientos").submit();
        }
    </script>

</body>

</html>
