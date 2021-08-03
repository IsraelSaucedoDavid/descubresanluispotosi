<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/descripcion.css">

    {{-- Libreria para los carruseles --}}
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

    {{-- iconos fontawesome --}}
    <script src="https://kit.fontawesome.com/51d5db4053.js" crossorigin="anonymous"></script>

    {{-- Bootstrap 4 --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    {{-- Icono en la pestana --}}
    <link rel="shortcut icon" href="favicons/logo2slp.png">



    @foreach ($empresa as $itemEm)
        <title>{{ $itemEm->nom_empresa }}</title>
    @endforeach
    @foreach ($establecimientos as $esta)
        <title>{{ $esta->nom_esta }}</title>
    @endforeach


</head>

<body class="noselect">

    @include('vistas.nav')

    {{-- Logo regresar --}}
    <div class="logo-regresar">
        <a href="/"> <img src="favicons/regresar3.png" alt=""></a>
    </div>

    <br><br><br>
    <!--contenido -->
    <div class="container">
        <div class="row">

            @foreach ($empresa as $itemEm)
                <div class="col-sm-12" id="logodes">
                    <img class="logodes" src="{{ asset('storage') . '/' . $itemEm->foto_perfil }}">
                </div>
                <div class="col-sm-12"><br></div>
                <!-- Carrusel -->
                <div class="col-sm-6" id="carruseldes">

                    <div class="carousel-pri">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                @foreach ($filesEmpresa as $filesemp)
                                    <div class="carousel-item @if ($loop->first) active @endif carousel-cell" >
                                        <img class="card-img-top" src="{{ asset($filesemp->url) }}" alt="">
                                        <div class="carousel-caption d-none d-md-block" id="principal">
                                        </div>
                                    </div>
                                @endforeach
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
                    </div>

                    <div class="col-sm-12"><br><br>
                    </div>
                    <!-- Redes Sociales-->
                    <div class="row" id="redessociales">

                        <div class="socials col-sm-12">
                            <!--Facebook  -->
                            @if ($itemEm->face_url != null)
                                <a href="{{ $itemEm->face_url }}" target="_blank"> <i class="fab fa-facebook"></i>
                                </a>
                            @endif
                            &nbsp;
                            <!--Instagram -->
                            @if ($itemEm->insta_url != null)
                                <a href="{{ $itemEm->insta_url }}" target="_blank"> <i
                                        class="fab fa-instagram"></i></a>
                            @endif
                            &nbsp;
                            <!--Pagina web-->
                            @if ($itemEm->sitio != null)
                                <a href="{{ $itemEm->sitio }}" target="_blank"> <i class="fab fa-chrome"></i></a>
                            @endif
                            &nbsp;
                        </div>
                        <div class="col-sm-12">
                            <div><br><br><br></div>
                        </div>
                    </div>

                </div>

                <!--Termina carrusel-->


                <hr>

                <!--Contenido -->
                <div class="col-sm-6">
                    <div class="col-sm-12" id="nomdes">
                        <!--Nombre -->
                        <h4>{{ $itemEm->nom_empresa }} </h4>
                    </div>
                    <hr color="#AA1E82 " style="height: 2px">
                    <div id="line">
                        <!--Telefono -->

                        @if ($itemEm->telefono != null)
                            <div class="row">
                                <div class="col-lg-1  col-2 mt-4">
                                    <img class="redes" src="img/png/phone-32.png" />
                                </div>
                                <div class="col-lg-11  col-10 mt-4">
                                    <p class="font-weight-normal">{{ $itemEm->telefono }}</p>
                                </div>
                            </div>
                            <hr color="#AA1E82 " style="height: 2px">
                        @endif

                        {{-- Descripcion --}}
                        @if ($itemEm->descripcion != null)
                            <div class="row">
                                <div class="col-lg-1  col-2 mt-4">
                                    <img class="redes" src="img/png/024-file.png" />
                                </div>
                                <div class="col-lg-11  col-10 mt-4">
                                    <p class="font-weight-normal">{{ $itemEm->descripcion }} </p>
                                </div>
                            </div>
                            <hr color="#AA1E82 " style="height: 2px">
                        @endif


                        <!--Direccion -->
                        {{-- @if ($itemEm->direccion != null)
                            <div class="row">
                                <div class="col-lg-1  col-2 mt-4">
                                    <img class="redes" src="img/png/006-pin.png" />
                                </div>
                                <div class="col-lg-11  col-10 mt-4">
                                    <p class="font-weight-normal">{{ $itemEm->direccion }} </p>
                                </div>
                            </div>
                            <hr color="#AA1E82 " style="height: 2px">
                        @endif --}}


                        <!--Rango precios-->
                        @if ($itemEm->rango_precios != null)
                            <div class="row">
                                <div class="col-lg-1  col-2 mt-4">
                                    <img class="redes" src="img/png/money.png" />
                                </div>
                                <div class="col-lg-11  col-10 mt-4">
                                    <p class="font-weight-normal">{{ $itemEm->rango_precios }} </p>
                                </div>
                            </div>
                            <hr color="#AA1E82 " style="height: 2px">
                        @endif

                        <!--tipo de comida-->
                        @if ($itemEm->tipo_comida != null)
                            <div class="row">
                                <div class="col-lg-1  col-2 mt-4">
                                    <img class="redes" src="img/png/comida.png" />
                                </div>
                                <div class="col-lg-11  col-10 mt-4">
                                    <p class="font-weight-normal">{{ $itemEm->tipo_comida }} </p>
                                </div>
                            </div>
                            <hr color="#AA1E82 " style="height: 2px">
                        @endif


                        <!--Horairos -->
                        @if ($itemEm->horario != null)
                            <div class="row">
                                <div class="col-lg-1  col-2 mt-4">
                                    <img class="redes" src="img/png/horario.png" />
                                </div>
                                <div class="col-lg-11  col-10 mt-4">
                                    <p class="font-weight-normal">{{ $itemEm->horario }} </p>
                                </div>
                            </div>
                            <hr color="#AA1E82 " style="height: 2px">
                        @endif


                        <!-- Pago tarjeta-->
                        @if ($itemEm->pago_tarjeta != null)
                            <div class="row">
                                <div class="col-lg-1  col-2 mt-4">
                                    <img class="redes" src="img/png/pagotarjeta.png" />
                                </div>
                                <div class="col-lg-11  col-10 mt-4">
                                    <p class="font-weight-normal">{{ $itemEm->pago_tarjeta }}</p>
                                </div>
                            </div>
                            <hr color="#AA1E82 " style="height: 2px">
                        @endif


                        <!--Estacionamiento -->
                        @if ($itemEm->estacionamiento != null)
                            <div class="row">
                                <div class="col-lg-1  col-2 mt-4">
                                    <img class="redes" src="img/png/estacionamiento.png" />
                                </div>
                                <div class="col-lg-11  col-10 mt-4">
                                    <p class="font-weight-normal">{{ $itemEm->estacionamiento }}</p>
                                </div>
                            </div>
                            <hr color="#AA1E82 " style="height: 2px">
                        @endif


                        <!--Servicio domicilio-->
                        @if ($itemEm->ser_dom != null)
                            <div class="row">
                                <div class="col-lg-1  col-2 mt-4">
                                    <img class="redes" src="img/png/serdom.png" />
                                </div>
                                <div class="col-lg-11  col-10 mt-4">
                                    <p class="font-weight-normal">{{ $itemEm->ser_dom }} </p>
                                </div>
                            </div>
                            <hr color="#AA1E82 " style="height: 2px">
                        @endif

                        <iframe class="mapa" src="{{ $itemEm->localizacion }}" width="600" height="450"
                            style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            @endforeach



            @foreach ($establecimientos as $establecimiento)
                <div class="col-sm-12" id="logodes">
                    <img class="logodes" src="{{ asset('storage') . '/' . $establecimiento->foto_perfil }}">
                </div>
                <div class="col-sm-12"><br></div>
                <!-- Carrusel -->
                <div class="col-sm-6" id="carruseldes">
                    <div class="carousel-pri">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                @foreach ($filesEsta as $filesesta)
                                    <div class="carousel-item @if ($loop->first) active @endif carousel-cell" >
                                        <img class="card-img-top" src="{{ asset($filesesta->url) }}" alt="">
                                        <div class="carousel-caption d-none d-md-block" id="principal">
                                        </div>
                                    </div>
                                @endforeach
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
                    </div>
                    <div class="col-sm-12"><br><br>
                    </div>
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
                            @if ($establecimiento->insta_url != null)
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


                <hr>

                <!--Contenido -->
                <div class="col-sm-6">
                    <div class="col-sm-12" id="nomdes">
                        <!--Nombre -->
                        <h4>{{ $establecimiento->nom_esta }} </h4>
                    </div>
                    <hr color="#AA1E82 " style="height: 2px">
                    <div id="line">
                        <!--Telefono -->

                        @if ($establecimiento->telefono != null)
                            <div class="row">
                                <div class="col-lg-1  col-2 mt-4">
                                    <img class="redes" src="img/png/phone-32.png" />
                                </div>
                                <div class="col-lg-11  col-10 mt-4">
                                    <p class="font-weight-normal">{{ $establecimiento->telefono }}</p>
                                </div>
                            </div>
                            <hr color="#AA1E82 " style="height: 2px">
                        @endif

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
                            <hr color="#AA1E82 " style="height: 2px">
                        @endif


                        {{-- Direccion 
                        @if ($establecimiento->direccion != null)
                            <div class="row">
                                <div class="col-lg-1  col-2 mt-4">
                                    <img class="redes" src="img/png/006-pin.png" />
                                </div>
                                <div class="col-lg-11  col-10 mt-4">
                                    <p class="font-weight-normal">{{ $establecimiento->direccion }} </p>
                                </div>
                            </div>
                            <hr color="#AA1E82 " style="height: 2px">
                        @endif --}}


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
                            <hr color="#AA1E82 " style="height: 2px">
                        @endif

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
                            <hr color="#AA1E82 " style="height: 2px">
                        @endif


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
                            <hr color="#AA1E82 " style="height: 2px">
                        @endif


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
                            <hr color="#AA1E82 " style="height: 2px">
                        @endif


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
                            <hr color="#AA1E82 " style="height: 2px">
                        @endif


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
                            <hr color="#AA1E82 " style="height: 2px">
                        @endif


                        <iframe src="{{ $establecimiento->direccion }}" width="600" height="450" style="border:0;"
                            allowfullscreen="" loading="lazy"></iframe>
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
