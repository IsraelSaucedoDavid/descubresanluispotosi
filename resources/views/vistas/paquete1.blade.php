<link rel="shortcut icon" href="favicons/logo2slp.png">


@include('vistas.header')
<link rel="stylesheet" href="css/paquete.css">
<br>


<div id="element">

    {{-- titulo --}}
    <div class="container-fluid" id="titulo">
        <br>
        <div class="row">
            <div class="form-group col-lg-6 col-m-6 col-6 mt-6">
                @foreach ($paquete as $itemPaq)
                    <h1>{{ $itemPaq->paquetes }} </h1>
                @endforeach
            </div>
            <div class="form-group col-lg-6 col-m-6 col-6 mt-6">
                <h3>Tu Mejor Experiencia</h3>
                <hr color="yellow">
            </div>
        </div>
    </div>
    <br><br>
    {{-- Empieza contenido de los pequetes en general --}}
    @foreach ($paquete as $itemPaq)
        <div class="container-fluid">
            <div class="card-paquetes">
                <div class="row">
                    <div class="form-group col-lg-12 col-m-12 col-12 mt-12" id="img">
                        <img class="d-block w-100" src="{{ asset('storage') . '/' . $itemPaq->foto_perfil }}"
                            alt="First slide">
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <hr>
        <div class="container" id="contenido">
            <div class="row">
                {{-- Aqui va la descripcion de los paquetes y contenido --}}
                <div class="form-group col-lg-6 col-m-12 col-12 mt-12">
                    <h1>{{ $itemPaq->paquetes }}</h1>
                    <br>
                    <p class="ubicacion">{{ $itemPaq->direccion }}</p>
                    <p class="des">{{ $itemPaq->descripcion }}</p>
                </div>
                <div class="form-group col-lg-6 col-m-12 col-12 mt-12">
                    <img class="d-block w-100" src="{{ asset('storage') . '/' . $itemPaq->foto_perfil }}"
                        alt="First slide">
                </div>
            </div>
        </div>

        <div class="container" id="contenido">
            <div class="row">
                {{-- Aqui va la descripcion de los paquetes y contenido --}}
                <div class="form-group col-lg-6 col-m-12 col-12 mt-12">
                    <h1>¿Qué Incluye?</h1>
                    <br>
                    <ul class="list-group list-group-flush" id="incluye" style="text-align: justify">
                        @if ($itemPaq->destino != null)
                            <li class="list-group-item">Destino: {{ $itemPaq->destino }}</li>
                        @endif

                        @if ($itemPaq->hotel != null)
                            <li class="list-group-item">Hotel: {{ $itemPaq->hotel }}</li>
                        @endif

                        @if ($itemPaq->estrellas_hotel != null)
                            <li class="list-group-item">Estrellas: {{ $itemPaq->estrellas_hotel }}</li>
                        @endif

                        @if ($itemPaq->duracion != null)
                            <li class="list-group-item">Duracion: {{ $itemPaq->duracion }} </li>
                        @endif

                        @if ($itemPaq->telefono != null)
                            <li class="list-group-item">Telefono: {{ $itemPaq->telefono }}</li>
                        @endif

                        @if ($itemPaq->sitio != null)
                            <li class="list-group-item">Pagina web: {{ $itemPaq->sitio }}</li>
                        @endif

                        @if ($itemPaq->precio != null)
                            <li class="list-group-item">Precio: {{ $itemPaq->precio }}</li>
                        @endif

                        @if ($itemPaq->Paog_tarjeta != null)
                            <li class="list-group-item"> Pago con Tarjeta: {{ $itemPaq->Paog_tarjeta }}</li>
                        @endif
                    </ul>
                </div>
                <div class="form-group col-lg-6 col-m-12 col-12 mt-12">
                    <img class="d-block w-100" src="{{ asset('storage') . '/' . $itemPaq->foto_perfil }}"
                        alt="First slide">
                </div>
            </div>
        </div>
    @endforeach

    {{-- titulo 2 --}}
    <div class="container-fluid" id="ubicacion">
        <br>
        <div class="row">
            <div class="form-group col-lg-12 col-m-12 col-12 mt-12">
                <h1>Ubicación</h1>
            </div>
            <div class="form-group col-lg-12 col-m-12 col-12 mt-12">
                <iframe class="mapa"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14782.38981809307!2d-100.96939749999999!3d22.141318700000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2smx!4v1616688291752!5m2!1ses-419!2smx"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>

</div>
<br><br><br>

{{-- html2pdf --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>

<script>
    var element = document.getElementById("element")

    /*html2pdf(element, {
         margin: 5,
         filename: 'document.pdf',
         image: {
             type: 'jpeg, png, jpeg',
             quality: 0.98,
         },
         html2canvas: {
             scale: 4,
             logging: true,
             dpi: 192,
             letterRendering: true
         },
         jsPDF: {
             unit: 'mm',
             format: 'b3',
             orientation: 'landscape'
         }
     });*/
</script>

@include('vistas.footer')
