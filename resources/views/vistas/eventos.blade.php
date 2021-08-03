<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- iconos fontawesome --}}
    <script src="https://kit.fontawesome.com/51d5db4053.js" crossorigin="anonymous"></script>

    {{-- Bootstrap 4 --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    {{-- Estilo de pagina --}}
    <link rel="stylesheet" href="css/eventos.css">

    {{-- Icono en la pestana --}}
    <link rel="shortcut icon" href="favicons/logo2slp.png">

    <title>Eventos</title>
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <a class="navbar-brand" onclick="paginaInicio()"><img class="logo1" src="favicons/logoslp.PNG"> <img
                class="logo2" src="favicons/logo2slp.PNG"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"> <i class="fa fa-navicon"
                    style="color:#aa1e82; font-size:28px;"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a href="pdf/Paquetes1.pdf" class="btn btnpaquetes mr-auto" style=""><span>Paquetes
                        </span></a>&nbsp;&nbsp;

                </li>
                <li class="nav-item">
                    <a class="btn btnpromotores mr-auto"
                        href="https://www.google.com/maps/d/edit?mid=1sA1O0Anr6fMPVjPYpnjeL2CN295IRA6x&usp=sharing"
                        style="cursor: pointer"><span>Mapa</span></a>&nbsp;&nbsp;
                </li>
                <li class="nav-item ">
                    @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                                <a class="btn btnlogin" href="{{ url('/home') }}" style="cursor: pointer"><span>Mi
                                        Perfil</span></a>
                            @else
                                <a class="btn btnlogin" href="{{ route('login') }}" style="cursor: pointer"><span>Mi
                                        Perfil</span></a>

                                @if (Route::has('register'))
                                    {{-- <a href="{{ route('register') }}"></a> --}}
                                @endif
                            @endauth
                        </div>
                    @endif
                </li>
            </ul>
        </div>
    </nav>


    {{-- titulo --}}
    <div class="container-fluid" id="titulo">
        <br>
        <div class="row">
            <div class="form-group col-lg-6 col-m-6 col-6 mt-6">
                <h1>Eventos</h1>
            </div>
            <div class="form-group col-lg-6 col-m-6 col-6 mt-6">
                <h3>Tu Mejor Experiencia</h3>
                <hr color="yellow" style="height: 5px">
            </div>
        </div>
    </div>

    <br><br>


    {{-- Titulo del lugar --}}
    <div class="container ">
        <p class="tituloMuni">{{ $municipios->municipios }}</p>
    </div>

    <br>
    {{-- Filtros --}}
    <div class="container">
        <div class="titulo3">
            <h1>Buscar Evento</h1>
            <div class="linea"></div>
            <br>
        </div>
    </div>

    <div class="container" id="filtro">
        <div class="container"><br></div>
        <div class="row">
            {{-- Elegir Municipio --}}
            <div class="input-group col-lg-5 col-m-12 ">
                <div class="input-group-prepend">
                    <span>Inicio:</span>
                </div>
                <select class="form-control" style="cursor: pointer">
                    <option value="">Elige una Fecha</option>
                    <option value="todos">Todos</option>
                    @foreach ($eventos as $evento)
                        <option value="{{ $evento->id }}"> {{ $evento->start }} </option>
                    @endforeach
                </select>
            </div>


            <br><br>
            {{-- Seleccionar fecha --}}
            <div class="input-group col-lg-5 col-m-12 ">
                <div class="input-group-prepend">
                    <span>Fin:</span>
                </div>
                <select class="form-control" style="cursor: pointer">
                    <option value="">Elige una Fecha</option>
                    <option value="todos">Todos</option>
                    @foreach ($eventos as $evento)
                        <option value="{{ $evento->id }}"> {{ $evento->end }} </option>
                    @endforeach
                </select>
            </div>
            <br><br>
            {{-- Boton Buscar --}}
            <div class="input-group col-lg-2 col-m-12 col-12 mt-12">
                <div class="input-group-prepend" style="cursor: pointer">
                    <span class="input-group-text" id="buscar"> <img src="img/png/buscar.png" alt="">
                        &nbsp;Buscar&nbsp;&nbsp;
                    </span>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>

    {{-- Empieza seccion de eventos --}}

    <div class="container">
        <div class="row">
            @foreach ($eventos as $evento)
                <div class="col-sm-6 info" style="cursor: pointer" onclick="verEvento({{ $evento->id }})">
                    <img id="imgcarrusel" class="d-block w-100"
                        src="{{ asset('storage') . '/' . $evento->foto_perfil }}" alt="First slide">
                    <br>
                    <br>
                    <h1>{{ $evento->title }} </h1>
                    <div class="linea"></div>
                    <br>
                    <p>Fecha Inicio &nbsp;&nbsp; : &nbsp;&nbsp; Fecha Final</p>
                    <p>{{ $evento->start }}&nbsp;&nbsp; : &nbsp;&nbsp; {{ $evento->end }}</p>

                    <br><br>
                </div>

            @endforeach
        </div>
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

</body>


{{-- Buscador --}}
<script src="js/buscador.js"></script>
<script src="js/direcciones.js"></script>


<!--jquery-->
<script src="js/jquery-3.6.0.js"></script>
<script src="js/jquery-ui.min.js"></script>

<!--Carrusel -->
<script src="js/flickity.pkgd.min.js"></script>
<script src="js/jquerycarousel.js"></script>

<!--Scripts de boostrap-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>


{{-- gsap --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/ScrollTrigger.min.js"></script>

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

</html>
