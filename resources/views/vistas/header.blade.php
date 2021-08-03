<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    {{-- iconos fontawesome --}}
    <script src="https://kit.fontawesome.com/51d5db4053.js" crossorigin="anonymous"></script>

    {{-- Estilo de pagina --}}
    <link rel="stylesheet" href="css/estyle.css">

    <!--Carrusel-->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">


    <title> TURISMO</title>

</head>


<body class="noselect">



    {{-- Header Principal de todas las paginas --}}
    {{-- <section>
        <div class="container usuario">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a class="nav-link" href="{{ url('/home') }}">MI PERFIL</a>
                    @else
                        <a class="nav-link" href="{{ route('login') }}">INICIAR SESION</a>
                        @if (Route::has('register'))
                             <a href="{{ route('register') }}"></a> 
                        @endif
                    @endauth
                </div>
            @endif
        </div>

         <div id="paquetes">
            <a href="{{ route('paquetes') }}">
                <h1> PAQUETES</h1>
            </a>
        </div> --}}


    {{-- Menu 
        <div class="container-fluid">
            <nav class="menu-navigation-icons">
                <div class="row">
                    <div class="col-sm-4">
                        <a href="#" class="menu-magenta"><span>Explorar el Estado</span></a>
                    </div>
                    <div class="col-sm-4">
                        <a href="#" class="menu-blue"><span>Explorar un Municipio</span></a>
                    </div>
                    <div class="col-sm-4">
                        <a href="#" target="_blank" class="menu-green"><span>Destino
                                Especifíco</span></a>
                    </div>
                </div>
            </nav>
        </div> --}}



    {{-- Buscador --}}
    <div class=" buscador">
        <div id="ctn-bars-search">
            <div class="row">
                <div class="col-1" id="img">
                    <img src="img/png/buscar.png" alt="">
                </div>
                <div class="col-sm-11" id="input">
                    <input type="text" class="form-control" id="inputSearch"
                        placeholder="Eventos, Paquetes, Establecimientos...">
                </div>
            </div>
        </div>
    </div>

    <!--Carrusel principal-->
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
    </div>
    <div class="sombreado"> </div>
    </section>

    <br><br><br><br>

    {{-- Aquí agrego el foreach para las paginas usando la url que recibo de los formularios --}}
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

    {{-- Termina el header principal --}}
