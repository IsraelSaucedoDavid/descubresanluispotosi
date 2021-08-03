<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- iconos fontawesome --}}
    <script src="https://kit.fontawesome.com/51d5db4053.js" crossorigin="anonymous"></script>

    {{-- Bootstrap 4 --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    {{-- css para zona en especifico --}}
    <link rel="stylesheet" href="css/zona.css">

    {{-- icono de la pagina --}}
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


    {{-- Logo regresar --}}
    <div class="logo-regresar">
        <a href="/"> <img src="favicons/regresar3.png" alt=""></a>
    </div>


    {{-- titulo --}}
    <div class="container-fluid" id="titulo">
        <br>
        <div class="row">
            <div class="form-group col-lg-6 col-m-6 col-6 mt-6">
                <h1>Pueblos Mágicos</h1>
            </div>
            <div class="form-group col-lg-6 col-m-6 col-6 mt-6">
                <h3>Tu mejor experiencia</h3>
                <div class="linea"></div>
            </div>
        </div>
    </div>


    <br><br>
    <div class="container carrusel">
        @foreach ($zona as $itemZo)
            {{-- Carrusel header --}}
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" id="imggeneral"
                            src="{{ asset('storage') . '/' . $itemZo->foto_perfil }}" alt="First slide">
                        <div class="carousel-caption d-none d-md-block" id="principal">
                        </div>
                    </div>
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
            <br><br><br>
        @endforeach
    </div>

    {{-- Descripción --}}
    <div class="container" id="descripcion">
        <div class="row ">
            <div class="col-lg-12 col-m-12 col-12 mt-12">
                <h1 class="titulo1">{{ $itemZo->zona }}</h1>
                <div class="linea2"></div>
                <br>
                <p class="des1">{{ $itemZo->descripcion }}</p>
            </div>
        </div>
    </div>
    <br><br>

    {{-- Filtros destino --}}
    <div class="container" id="filtro">
        <div class="row">
            {{-- Seleccionar categoría/giro --}}
            <div class="col-sm-4" id="clasificaciones">
                <div class="input-group-prepend clasificaciones">
                    <span>Clasificaciones</span>
                    <select class="form-control" id="_categoria" onchange="seleccionarSubcat();">
                        <option value="">Seleccionar...</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}"> {{ $categoria->categorias }} </option>
                        @endforeach
                    </select>
                </div>
            </div>


            {{-- Seleccionar lugares --}}
            <div class="col-sm-4" id="lugares">
                <div class="input-group-prepend lugares">
                    <span>Lugares</span>
                    <div id="subcategorias">
                        <select class="form-control" name="filtroEsta" id="_subcategorias"
                            onchange="seleccionarPrecio();">
                            <option value="">Elige</option>
                        </select>
                    </div>
                </div>
            </div>

            {{-- Rango Precios --}}

            <div class="col-sm-5" id="precios">
                <div class="input-group-prepend precios">
                    <span>Precios</span>
                    <div id="rango_precios">
                        <select class="form-control" name="filtroEsta" id="_rango_precios"> </select>
                    </div>
                </div>
            </div>

            {{-- Seleccionar lugares 
        <div class="col-sm-6">
            <div class="input-group-prepend lugares">
                <span>Rangos de Precios</span>
                <div id="empresas">
                    <select class="form-control" name="filtroEsta" id="_rango_precios">
                        <option value="">Elige</option>
                    </select>
                </div>
            </div>
        </div> --}}

            {{-- Este es el mejor filtro a mostrar que el otro
<div class="wrap">
    <h1>Escoge un producto</h1>
    <div class="store-wrapper">
        <div class="category_list">
            <a href="#" class="category_item" category="all">Todo</a>
            @foreach ($categorias as $categoria)
                <a href="#" class="category_item"
                    category="{{ $categoria->id }}">{{ $categoria->categorias }}</a>
            @endforeach
        </div>
        <section class="products-list">
            @foreach ($empresas as $itemEm)
                <div class="product-item" category="{{ $itemEm->id_categoria }}">
                    <img class="" src="{{ asset('storage') . '/' . $itemEm->foto_perfil }}">
                    <a href="#">{{ $itemEm->nom_empresa }}</a>
                </div>
            @endforeach
        </section>
    </div> --}}


            {{-- Boton Buscar --}}
            <div class="col-sm-4">
                <span class="input-group-text" id="buscar" style="cursor: pointer" onclick="verzona()"> <img
                        src="img/png/buscar.png" alt="">
                    &nbsp;Buscar&nbsp;&nbsp;
                </span>
            </div>
        </div>

    </div>

    <br><br>


    {{-- titulo 
    <div class="container establecimientos">
        <br>
        <div class="row ">
            <div class=" col-lg-6 col-m-6 col-6 mt-6">
                <h1 class="titulo2">Establecimientos</h1>
                <div class="linea3"></div>
            </div>
        </div>
    </div> --}}


    {{-- Establecimientos aplicados con el filtro --}}
    <div class="profile-area">
        <div class="container">
            <div class="row">
                @foreach ($empresas as $empresa)
                    <div class="col-lg-3 col-m-4 col-12 mt-6 c empresa_{{ $empresa->id_subcategoria }}">
                        <div class="card" onclick="verEsta({{ $empresa->id }})">
                            <div class="img1"> <img class=""
                                    src="{{ asset('storage') . '/' . $empresa->foto_portada }}">
                            </div>

                            <div class="img2"><img class=""
                                    src="{{ asset('storage') . '/' . $empresa->foto_perfil }}">
                            </div>
                            <div class="main-text">
                                <h2>{{ $empresa->nom_empresa }}</h2>
                                <p>{{ $empresa->direccion }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12"> <br>
                                <br>
                            </div>
                        </div>
                    </div>
                @endforeach

                @foreach ($establecimientos as $establecimiento)
                    <div class="col-lg-3 col-m-4 col-12 mt-6 c empresa_{{ $establecimiento->id_subcategoria }}">
                        <div class="card" onclick="verEstablecimientou({{ $establecimiento->id }})">
                            <div class="img1"> <img class=""
                                    src="{{ asset('storage') . '/' . $establecimiento->foto_portada }}">
                            </div>

                            <div class="img2"><img class=""
                                    src="{{ asset('storage') . '/' . $establecimiento->foto_perfil }}">
                            </div>
                            <div class="main-text">
                                <h2>{{ $establecimiento->nom_esta }}</h2>
                                <p>{{ $establecimiento->direccion }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12"> <br>
                                <br>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Ubicacion --}}
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-m-12 col-12 mt-12">
                <h1 class="titulo2">Ubicación</h1>
                <div class="linea4"></div>
            </div>
            <div class="col-lg-12 col-m-12 col-12 mt-12 ">
                <br>

                <iframe src="{{ $itemZo->localizacion }}" width="100%" height="450px" style="border:15;"
                    allowfullscreen="" loading="lazy"></iframe>


            </div>
        </div>
    </div>
    <hr>


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


    <!--jquery-->
    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/jquery-ui.min.js"></script>

    {{-- Otro filtro --}}
    <script src="js/script.js"></script>
    <script src="js/direcciones.js"></script>

    {{-- gsap --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/ScrollTrigger.min.js"></script>


    <!--Scripts de boostrap-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>


    {{-- Selects dependientes --}}
    <script>
        const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;

        document.getElementById('_categoria').addEventListener('change', (e) => {
            fetch('subcategorias', {
                method: 'POST',
                body: JSON.stringify({
                    texto: e.target.value
                }),
                headers: {
                    'Content-Type': 'application/json',
                    "X-CSRF-Token": csrfToken
                }
            }).then(response => {
                return response.json()
            }).then(data => {
                var opciones = "<option value=''>Elegir</option>";
                for (let i in data.lista) {
                    opciones +=
                        '<option "  value="' + data.lista[i].id + '">' + data.lista[i].subcategoria +
                        '</option>';


                }
                document.getElementById("_subcategorias").innerHTML = opciones;
            }).catch(error => console.error(error));

        })


        document.getElementById('_subcategorias').addEventListener('change', (e) => {
            fetch('empresas', {
                method: 'POST',
                body: JSON.stringify({
                    texto: e.target.value
                }),
                headers: {
                    'Content-Type': 'application/json',
                    "X-CSRF-Token": csrfToken
                }
            }).then(response => {
                return response.json()
            }).then(data => {
                var opciones = "<option value=''>Elegir</option>";

                for (let i in data.lista) {
                    opciones +=

                        '<option "  value="' + data.lista[i].id + '">' + data.lista[i].rango_precios +
                        '</option>';
                }
                document.getElementById("_rango_precios").innerHTML = opciones;
            }).catch(error => console.error(error));

        })
    </script>

    {{-- Para que aparezcas las cartas de los establecimientos --}}
    <script>
        $(function() {

            $('#buscar').on('click', function() {

                var valorOp = document.getElementById('_subcategorias');
                var valOp = _subcategorias.value;
                //var value = $(this).val();

                //Ocultamos todos los establecimientos
                $('.c').hide();

                //Mostramos los establecimientos
                $('.empresa_' + valOp).show();

            });
        });
    </script>

    <script>
        var buscar = document.getElementById("buscar");

        var clasificaciones = document.getElementById("clasificaciones");
        var lugares = document.getElementById("lugares");
        var precios = document.getElementById("precios");

        var _subcategorias = document.getElementById("_subcategorias");
        var _rango_precios = document.getElementById("_rango_precios")


        var anchoVentana = window.innerWidth;



        function seleccionarPrecio() {
            $("#precios").show();

            if (anchoVentana > 640) {
                clasificaciones.style.marginLeft = "150px"
                precios.style.marginLeft = "150px"
                buscar.style.marginLeft = "14%"
            } else {
                clasificaciones.style.marginLeft = "0px"
                precios.style.marginLeft = "0px"
                buscar.style.marginLeft = "35%"
            }
        }


        function seleccionarSubcat() {
            $("#lugares").show();


            if (anchoVentana > 640) {
                lugares.style.marginLeft = "3%"
                clasificaciones.style.marginLeft = "-3%"


            } else {

                _subcategorias.style.marginLeft = "38%"
                _rango_precios.style.marginLeft = "38%"
            }


        }

        /*  function seleccionarPrecio() {
              $("#precios").show();

              if (anchoVentana < 640) {
                  clasificaciones.style.marginLeft = "150px"
                  precios.style.marginLeft = "150px"
                  buscar.style.marginLeft = "14%"
              } else {
                  clasificaciones.style.marginLeft = "0px"
                  precios.style.marginLeft = "0px"
                  buscar.style.marginLeft = "35%"
              }
          }


          function seleccionarSubcat() {
              $("#lugares").show();


              if (anchoVentana < 640) {
                  lugares.style.marginLeft = "3%"
                  clasificaciones.style.marginLeft = "-3%"


              } else {

                  _subcategorias.style.marginLeft = "38%"
                  _rango_precios.style.marginLeft = "38%"
              }


          }*/
    </script>




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



        /*Funcion para ver los establecimientos echos por el admin*/
        function verEsta(id) {
            $("#id_esta").val(id);
            $("#establecimiento").submit();
        }

        /*Funcion para ver los establecimientos echos por el usuario */
        function verEstablecimientou(id) {
            $("#id_establecimiento").val(id);
            $("#establecimientou").submit();
        }

        /*Funcion para redirigirme a la pagina de establecimientos/filtros */
        function verEstable(id) {
            $("#id_esta").val(id);
            $("#establecimientos").submit();
        }
    </script>

</body>

</html>
