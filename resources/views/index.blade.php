<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- iconos fontawesome --}}
    <script src="https://kit.fontawesome.com/51d5db4053.js" crossorigin="anonymous"></script>

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!--Css-->
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/flickity.css">

    {{-- Icono en la pestaña --}}
    <link rel="shortcut icon" href="favicons/logo2slp.png">

    <title>Inicio</title>
</head>

<body class="noselect" onclick="ocultar_buscador()">



    @include('vistas.nav')

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            @foreach ($files as $file)
                <div class="carousel-item @if ($loop->first) active @endif">
                    <img class="d-block colorear w-100" src="{{ asset($file->url) }}" alt="First
                slide">
                    <div class="carousel-caption d-none d-md-block" id="principal">
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

        {{-- Logo pagina principal --}}
        <div id="lo-pri">
            <a href="/#"> <img src="favicons/logotipo.png" alt=""></a>
        </div>

        {{-- Buscador
        <div id="buscador">
            <div class="input-bus">
                <input type="text" id="inputSearch" placeholder=" Buscar...">
            </div>
        </div> --}}


        {{-- Buscador --}}
        <div class="container" id="buscador">
            <div class="img-bus">
                <div id="img-search">
                    <img src="img/png/buscar.png" alt="">
                </div>
            </div>
            <div class="input-bus">
                <div class="input-search" id="input">
                    <input type="text" class="form-control" id="inputSearch" placeholder="Buscar...">
                </div>
            </div>
        </div>

    </div>

    {{-- Arreglos para le buscador --}}
    <div class="header-content">
        <ul id="box-search">
            @foreach ($empresas as $empresa)
                <li><a onclick="verEsta({{ $empresa->id }})"><i class=" fas fa-search"></i>{{ $empresa->tag }}</a>
                </li>
                <li><a onclick="verEsta({{ $empresa->id }})"><i
                            class=" fas fa-search"></i>{{ $empresa->nom_empresa }}</a>
                </li>
            @endforeach
            @foreach ($eventos as $evento)
                <li><a onclick="verEvento({{ $evento->id }})"><i class="fas fa-search"></i>{{ $evento->tag }}</a>
                </li>
                <li><a onclick="verEvento({{ $evento->id }})"><i class="fas fa-search"></i>{{ $evento->title }}</a>
                </li>
            @endforeach
            @foreach ($paquetes as $paquete)
                <li><a onclick="verPaquete({{ $paquete->id }})"><i
                            class="fas fa-search"></i>{{ $paquete->tag }}</a>
                </li>
                <li><a onclick="verPaquete({{ $paquete->id }})"><i
                            class="fas fa-search"></i>{{ $paquete->paquetes }}</a>
                </li>
            @endforeach
            @foreach ($establecimientos as $esta)
                <li><a onclick="verEstable({{ $esta->id }})"><i class="fas fa-search"></i>{{ $esta->tag }}</a>
                </li>
                <li><a onclick="verEstable({{ $esta->id }})"><i
                            class="fas fa-search"></i>{{ $esta->nom_esta }}</a>
                </li>
            @endforeach
            @foreach ($zonas as $zona)
                <li><a onclick="verZona({{ $zona->id }})"><i class="fas fa-search"></i>{{ $zona->zona }}</a>
                </li>
            @endforeach


        </ul>
    </div>


    <!--secciones-->

    <div class="container" id="primer-titulo">
        <div class="titulo2">
            <h1>¿Cuál es tu Interés?</h1>
            <div class="linea"></div>
            <br>
        </div>
    </div>

    <section>
        <div class="container-fluid" id="secciones">
            <div class="row">
                @foreach ($seccion as $itemSec)
                    <div class="col-sm-4">
                        <div class="card 1" onclick="verSeccion({{ $itemSec->id }})">
                            <div class="card_image"> <img
                                    src="{{ asset('storage') . '/' . $itemSec->foto_perfil }}" />
                            </div>
                            <div class="card_title title-white">
                                <p style="opacity: 90%; color:white;">
                                    {{ $itemSec->seccion }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <br><br><br><br>
    {{-- Filtros municipio --}}
    <div class="container" id="filtro-municipio">
        <div class="row">
            {{-- Elegir Municipio --}}
            <div class=" col-lg-2  col-4 mt-3">
                <div class="input-group-prepend">
                    <span>Municipio</span>
                </div>
            </div>
            <div class=" col-lg-6  col-6 mt-3" id="muni1">
                <select class="form-control municipios1" id="municipios1">
                    <option value="">Selecciona...</option>
                    <option value="todos">Todos</option>
                    @foreach ($municipios as $municipio)
                        <option value="{{ $municipio->id }}"> {{ $municipio->municipios }} </option>
                    @endforeach
                </select>
            </div>
            {{-- Boton Buscar --}}

            <div class="col-lg-3  col-12 mt-3" id="buscarFil">
                <div class="input-group-prepend" style="cursor: pointer" onclick="verEstable()">
                    <span class="input-group-text" id="buscar"> <img src="img/png/buscar.png" alt="">
                        &nbsp;Buscar&nbsp;&nbsp;
                    </span>
                </div>

            </div>
        </div>
    </div>



    {{-- Eventos --}}
    <div class="container" id="titulo-evento">
        <div class="titulo2">
            <h1>Próximos Eventos</h1>
            <div class="linea"></div>
        </div>
    </div>

    {{-- Filtros evento --}}
    <div class="container" id="filtro-evento">
        <div class="row">
            <div class="col-sm-4">
                <div class="row">
                    {{-- Elegir Municipio --}}
                    <div class=" col-lg-2 col-m-1 col-3 mt-3">
                        <div class="input-group-prepend">
                            <span>Municipio</span>
                        </div>
                    </div>
                    <div class=" col-lg-10 col-m-1 col-9 mt-3" id="muni2">
                        <select class="form-control  municipios2" id="municipios2">
                            <option value="">Selecciona...</option>
                            <option value="todos">Todos</option>
                            @foreach ($municipios as $municipio)
                                <option value="{{ $municipio->id }}"> {{ $municipio->municipios }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    {{-- Seleccionar evento --}}
                    <div class=" col-lg-2 col-m-1 col-3 mt-3">
                        <div class="input-group-prepend">
                            <span>Inicio</span>
                        </div>
                    </div>
                    <div class=" col-lg-6 col-m-1 col-9 mt-3">
                        <input type="date" id="start" max="2030-01-01">
                        {{-- <select class="form-control">
                        <option value="">Elige una Opción</option>
                        <option value="todos">Todos</option>
                        @foreach ($eventos as $evento)
                            <option value="{{ $evento->id }}"> {{ $evento->start }} </option>
                        @endforeach
                    </select> --}}
                    </div>
                    <br><br>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    {{-- Seleccionar evento --}}
                    <div class=" col-lg-2 col-m-1 col-3 mt-3">
                        <div class="input-group-prepend">
                            <span>Fin</span>
                        </div>
                    </div>
                    <div class=" col-lg-6 col-m-1 col-9 mt-3">
                        <input type="date" id="end" max="2030-01-01">
                        {{-- <select class="form-control" style="cursor: pointer">
                        <option value="">Elige una Opción</option>
                        <option value="todos">Todos</option>
                        @foreach ($eventos as $evento)
                            <option value="{{ $evento->id }}"> {{ $evento->end }} </option>
                        @endforeach
                    </select> --}}
                    </div>
                </div>
            </div>
            {{-- Boton Buscar --}}
            <div class="col-lg-12 col-m-1 col-9 mt-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="buscar" style="cursor: pointer" onclick="verEventos()"> <img
                            src="img/png/buscar.png" alt="">
                        &nbsp;Buscar&nbsp;&nbsp;
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Carrusel de eventos -->
    <section id="carrusel-eventos">
        <div class="container text-center">
            <div class="main-carousel cell-index" data-flickity='{ "cellAlign": "left", "contain": true }'>
                @foreach ($eventos as $evento)
                    <div class="carousel-cell" onclick="verEvento({{ $evento->id }})">
                        <div class="cell"><img class="carrusel"
                                src="{{ asset('storage') . '/' . $evento->foto_perfil }}" alt="">
                        </div>
                        <p style="color: rgb(24, 23, 23);">{{ $evento->eventos }} </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


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
                        <ul class="footer" style="cursor: pointer"><i class=" fas fa-circle"></i>&nbsp;&nbsp;
                            Eventos
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

    {{-- Formulairo para ingresar a los zonas  con el id --}}
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
        <input type="hidden" name="id_emp" id="id_emp" value="">
    </form>

    {{-- Formulairo para ingresar a los estableciomientos por el admin  con el id --}}
    <form name="estable" id="empresas" action="{{ URL('/establecimientosi') }}" target="_self" method="get">
        @csrf
        <input type="hidden" name="id_emp" id="id_emp" value="">
    </form>




    <script>
        var getin = prompt("Pon la contraseña")
        if (getin != "PaginaProtegidaPorSeguridadEstatal")

        {
            location.href = 'https://sitio.sanluis.gob.mx/VisitaSLP/'
        } else

        {
            alert('Contraseña Incorrecta, contacte al propietario')
        }
    </script>

    {{-- Buscador --}}
    <script src="js/buscador.js"></script>

    <!--jquery-->
    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/jquery-ui.min.js"></script>

    <!--Carrusel -->
    <script src="js/flickity.pkgd.min.js"></script>
    <script src="js/jquerycarousel.js"></script>


    <!--Bootstrap scripts-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
    </script>
</body>

{{-- gsap --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/ScrollTrigger.min.js"></script>

{{-- Scripts paginas --}}
<script>
    function verEventos() {
        $("#id_eventos").val(id);
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
</script>

<script>
    function verEstable(id) {

        var municipios1 = document.getElementById('municipios1');
        var idmuni = municipios1.value;

        $("#id_emp").val(idmuni);
        $("#establecimientos").submit();
    }

    function verEventos(id) {

        var municipios2 = document.getElementById('municipios2');
        var id_eventos = municipios2.value;

        //console.log(id_eventos);

        $("#id_eventos").val(id_eventos);
        $("#eventos").submit();
    }
</script>


</html>
