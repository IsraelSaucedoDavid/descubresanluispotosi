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

    {{-- Secciones.css --}}
    <link rel="stylesheet" href="css/paquetes.css">

    {{-- Icono en la pestana --}}
    <link rel="shortcut icon" href="favicons/logo2slp.png">

    <title>Document</title>
</head>

<body>

    @include('vistas.nav')

    {{-- Logo Ayuda --}}
    @foreach ($config as $conf)
        @if ($conf->btn_ayuda == 1)
            <div class="logo-ayuda">
                <a href="/"> <img src=" favicons/ayuda.png" alt=""></a>
            </div>
        @endif
    @endforeach



    {{-- titulo --}}
    <div class="container-fluid" id="titulo">
        <br>
        <div class="row">
            <div class="col-lg-12 col-m-12 col-12 mt-12">
                <h1>Paquetes</h1>
                <hr color="yellow">
            </div>
        </div>
    </div>

    <br><br>


    <div class="container-fluid">
        <img class="img-car" src="{{ asset('img/imgpaquete1.jpeg') }}">
        <br><br>
        <img class="img-paquete" src="{{ asset('img/paquete1.jpeg') }}" alt="">
        <br><br><br>
        <hr>
        <img class="img-car" src="{{ asset('img/imgpaquete2.jpeg') }}">
        <br>
        <img class="img-paquete" src="{{ asset('img/paquete2.jpeg') }}" alt="">
        <br><br><br>
        <hr>
        <img class="img-car" src="{{ asset('img/imgpaquete3.jpeg') }}">
        <br><br>
        <img class="img-paquete" src="{{ asset('img/paquete3.jpeg') }}" alt="">

    </div>





    {{-- Empieza contenido de los pequetes en general --}}
    <div class="container-fluid">
        @foreach ($paquetes as $paquete)
            <div class="card-paquetes" onclick="verPaquete({{ $paquete->id }})">
                <div class="row">
                    <div class="form-group col-lg-6 col-m-12 col-12 mt-12 w-100" id="img">
                        <img id="imgcarrusel" class="d-block w-100"
                            src="{{ asset('storage') . '/' . $paquete->foto_perfil }}" alt="First slide">
                    </div>
                    <div class="form-group col-lg-6 col-m-12 col-12 mt-12 w-100" id="content">
                        <br><br>
                        <h1>{{ $paquete->paquetes }} </h1>
                        <hr color="yellow">
                        <p class="">{{ $paquete->descripcion }}</p>

                    </div>
                </div>
            </div>
            <br>
            <br>
        @endforeach
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
