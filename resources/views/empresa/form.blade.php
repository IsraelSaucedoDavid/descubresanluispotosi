{{-- Inidcar el titulo de toda la pagina con variables entre vistas --}}
<h1>{{ $modo }}</h1>

{{-- Captura de errores --}}
@if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>

@endif
<br>


<div class="row">
    {{-- Nombre del establecimiento --}}
    <div class="form-group col-lg-8 col-m-12 col-12 mt-12">
        <label for="nom_empresa">Nombre del establecimiento</label>
        <input type="text" rows="6" name="nom_empresa" class="form-control" maxlength="1500"
            value="{{ isset($empresa->nom_empresa) ? $empresa->nom_empresa : old('nom_empresa') }}" id="nom_empresa">
    </div>


    {{-- Tag --}}
    <div class="form-group col-lg-4 col-m-12 col-12 mt-12">
        <label for="tag">Tag</label>
        <input type="text" rows="6" name="tag" class="form-control" required
            value="{{ isset($empresa->tag) ? $empresa->tag : old('tag') }}" id="tag">
    </div>

</div>

{{-- Descripción --}}
<div class="row">
    <div class="form-group col-lg-12 col-m-12 col-12 mt-12">
        <label for="descripcion">Descripción</label>

        <textarea class="form-control" name="descripcion" id="descripcion" maxlength="1500" cols="153"
            rows="5">{{ isset($empresa->descripcion) ? $empresa->descripcion : old('descripcion') }}</textarea>
    </div>
</div>

{{-- Categoría --}}
<div class="row">
    <div class="form-group col-lg-6 col-m-6 col-6 mt-6">
        <label for="categoria" id="categoria">Escoge una Categoria:</label><br>
        {{-- <select id="id_categoria" name="id_categoria" class="form-control" required>
            <option value="">Elige una opción</option>
            @foreach ($categorias as $categoria)
                <option value="{{ isset($categoria->id) ? $categoria->id : old('id') }}">
                    {{ isset($categoria->categorias) ? $categoria->categorias : old('categorias') }}
                </option>
            @endforeach
        </select><br> --}}

        <select class="ejem-select2 form-control" name="id_categoria" required ">
            <option value="">Seleccionar...</option>                                                                         
                              @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}"
                {{ isset($empresa->id_categoria) ? ($categoria->id == $empresa->id_categoria ? 'selected' : '') : '' }}>
                {{ $categoria->categorias }}
            </option>
            @endforeach
        </select>

    </div>



    {{-- Subcategoría --}}
    <div class="form-group col-lg-6 col-m-6 col-6 mt-6">
        <label for="subcategoria" id="subcategoria">Escoge una Subcategoria:</label><br>
        {{-- <div class="form-group col-lg-6 col-m-6 col-6 mt-6">
        <label for="id_subcategoria">Escoge una Subcategoría:</label>
        <select id="id_subcategoria" name="id_subcategoria" class="form-control" required value="">
            <option value="">Elige una opción</option> 
        @foreach ($subcategorias as $subcategoria)
            <option value="{{ isset($subcategoria->id) ? $subcategoria->id : old('id') }}" selected>
                {{ isset($subcategoria->subcategoria) ? $subcategoria->subcategoria : old('subcategoria') }}
            </option>
        @endforeach
        </select><br>
    </div> --}}
        <select class="ejem-select2 form-control" name="id_subcategoria" id="id_subcategoria" onchange="addPrecios()"
            required>
            <option value="">Seleccionar...</option>
            @foreach ($subcategorias as $subcategoria)
                <option value="{{ $subcategoria->id }}"
                    {{ isset($empresa->id_subcategoria) ? ($subcategoria->id == $empresa->id_subcategoria ? 'selected' : '') : '' }}>
                    {{ $subcategoria->subcategoria }}
                </option>
            @endforeach
        </select>

    </div>


</div>


<div class="row">

    {{-- mandar por formulario post @csrf --}}

    {{-- Institución --}}
    <div class="col-lg-12 col-m-12 col-12 mt-12">
        <label for="id_institucion">Escoge una Institucion</label>
        {{-- <div class="form-group col-lg-6 col-m-6 col-6 mt-6">
        <select id="id_institucion" name="id_institucion" class="form-control" required value="">
            <option value="">Elige una opción</option>
            @foreach ($instituciones as $institucion)
                <option value="{{ isset($institucion->id) ? $institucion->id : old('id') }}" selected>
                    {{ isset($institucion->institucion) ? $institucion->institucion : old('institucion') }}
                </option>
            @endforeach
        </select><br>
    </div> --}}
        <select class="ejem-select2  form-control" name="id_institucion">
            <option value="">Seleccionar...</option>
            @foreach ($instituciones as $institucion)
                <option value="{{ $institucion->id }}"
                    {{ isset($empresa->id_institucion) ? ($institucion->id == $empresa->id_institucion ? 'selected' : '') : '' }}>
                    {{ $institucion->institucion }}
                </option>
            @endforeach
        </select>

    </div>






    {{-- User Id --}}



    {{-- Usuario 
    <div class="form-group col-lg-6 col-m-6 col-6 mt-6">
        <label for="id_user">Usuario:</label>
        {{-- <div class="form-group col-lg-6 col-m-6 col-6 mt-6">
       
        <select id="id_user" name="id_user" class="form-control" required value="">
            <option value="">Elige una opción</option>
            @foreach ($usuarios as $usuario)
                <option value="{{ isset($usuario->id) ? $usuario->id : old('id') }}" selected>
                    {{ isset($usuario->name) ? $usuario->name : old('name') }}</option>
            @endforeach
        </select><br>
    </div> --}}
    {{-- <select class="ejem-select2 form-control" name="id_user" style="height: 20%">
            <option value="">Seleccionar...</option>
            @foreach ($usuarios as $usuario)
                <option value="{{ isset($usuario->id) ? $usuario->id : old('id') }}">
                    {{ isset($usuario->name) ? $usuario->name : old('name') }}</option>
            @endforeach
        </select>

    </div> --}}


    {{-- mandar por formulario post @csrf --}}

</div>

<br>

{{-- Dirección --}}
<div class="row">
    <div class="form-group col-lg-6 col-m-6 col-6 mt-6">
        <label for="direccion">Dirección</label>
        <input type="text" rows="6" name="direccion" class="form-control" maxlength="1500"
            value="{{ isset($empresa->direccion) ? $empresa->direccion : old('direccion') }}" id="direccion">
    </div>

    {{-- Localizacion --}}
    <div class="form-group col-lg-6 col-m-6 col-6 mt-6">
        <label for="localizacion">Geolocalizacion</label>
        <input type="text" rows="6" name="localizacion" class="form-control" maxlength="1500"
            value="{{ isset($empresa->localizacion) ? $empresa->localizacion : old('localizacion') }}"
            id="localizacion">
    </div>

    {{-- Municipio --}}

    <div class="form-group col-lg-6 col-m-12 col-6 mt-12">
        <label for="id_municipio">Escoge un Municipio:</label>
        {{-- <div class="form-group col-lg-6 col-m-6 col-6 mt-6">
       
        <select id="id_municipio" name="id_municipio" class="form-control" required value="">
            <option value="">Elige una opción</option>
            @foreach ($municipios as $municipio)
                <option value="{{ isset($municipio->id) ? $municipio->id : old('id') }}" selected>
                    {{ isset($municipio->municipios) ? $municipio->municipios : old('municipios') }}
                </option>
            @endforeach
        </select><br>
    </div> --}}
        <select class="ejem-select2 form-control" name="id_municipio" required>
            <option value="">Seleccionar...</option>
            @foreach ($municipios as $municipio)
                <option value="{{ $municipio->id }}"
                    {{ isset($empresa->id_municipio) ? ($municipio->id == $empresa->id_municipio ? 'selected' : '') : '' }}>
                    {{ $municipio->municipios }}
                </option>
            @endforeach
        </select>


    </div>


    {{-- Zona --}}


    <div class="form-group col-lg-6 col-m-12 col-6 mt-12">
        <label for="id_zona">Zona:</label>
        {{-- <div class="form-group col-lg-6 col-m-6 col-6 mt-6">
     
        <select id="id_zona" name="id_zona" class="form-control" value="">
            <option value="">Seleccionar...</option>
            @foreach ($zonas as $zona)
                <option value="{{ isset($zona->id) ? $zona->id : old('id') }}" selected>
                    {{ isset($zona->id) ? $zona->zona : old('zona') }}</option>
            @endforeach
        </select><br>
    </div> --}}
        <select class="ejem-select2 form-control" name="id_zona" required>
            <option value="">Seleccionar...</option>
            @foreach ($zonas as $zona)

                <option value="{{ $zona->id }}"
                    {{ isset($empresa->id_zona) ? ($zona->id == $empresa->id_zona ? 'selected' : '') : '' }}>
                    {{ $zona->zona }}</option>
            @endforeach
        </select>

    </div>



</div>
<br><br>

{{-- Horario --}}
<div class="row">
    <label for="">Horario</label>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Día</th>
                <th scope="col">Abierto</th>
                <th scope="col">Cerrado</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">Lunes</th>
                <td> <input type="time" class="form-control" name="luneshi" id="luneshi"
                        value="{{ isset($empresa->luneshi) ? $empresa->luneshi : old('luneshi') }}"></td>
                <td> <input type="time" class="form-control" name="luneshf" id="luneshf"
                        value="{{ isset($empresa->luneshf) ? $empresa->luneshf : old('luneshf') }}"></td>

            </tr>
            <tr>
                <th scope="row">Martes</th>
                <td> <input type="time" class="form-control" name="marteshi" id="marteshi"
                        value="{{ isset($empresa->marteshi) ? $empresa->marteshi : old('marteshi') }}"></td>
                <td> <input type="time" class="form-control" name="marteshf" id="marteshf"
                        value="{{ isset($empresa->marteshf) ? $empresa->marteshf : old('marteshf') }}"></td>

            </tr>
            <tr>
                <th scope="row">Miercoles</th>
                <td> <input type="time" class="form-control" name="miercoleshi" id="miercoleshi"
                        value="{{ isset($empresa->miercoleshi) ? $empresa->miercoleshi : old('miercoleshi') }}"></td>
                <td> <input type="time" class="form-control" name="miercoleshf" id="miercoleshf"
                        value="{{ isset($empresa->miercoleshf) ? $empresa->miercoleshf : old('miercoleshf') }}"></td>
            </tr>
            <tr>
                <th scope="row">Jueves</th>
                <td> <input type="time" class="form-control" name="jueveshi" id="jueveshi"
                        value="{{ isset($empresa->jueveshi) ? $empresa->jueveshi : old('jueveshi') }}"></td>
                <td> <input type="time" class="form-control" name="jueveshf" id="jueveshf"
                        value="{{ isset($empresa->jueveshf) ? $empresa->jueveshf : old('jueveshf') }}"></td>
            </tr>
            <tr>
                <th scope="row">Viernes</th>
                <td> <input type="time" class="form-control" name="vierneshi" id="vierneshi"
                        value="{{ isset($empresa->vierneshi) ? $empresa->vierneshi : old('vierneshi') }}"></td>
                <td> <input type="time" class="form-control" name="vierneshf" id="vierneshf"
                        value="{{ isset($empresa->vierneshf) ? $empresa->vierneshf : old('vierneshf') }}"></td>
            </tr>
            <tr>
                <th scope="row">Sabado</th>
                <td> <input type="time" class="form-control" name="sabadohi" id="sabadohi"
                        value="{{ isset($empresa->sabadohi) ? $empresa->sabadohi : old('sabadohi') }}"></td>
                <td> <input type="time" class="form-control" name="sabadohf" id="sabadohf"
                        value="{{ isset($empresa->sabadohf) ? $empresa->sabadohf : old('sabadohf') }}"></td>
            </tr>
            <tr>
                <th scope="row">Domingo</th>
                <td> <input type="time" class="form-control" name="domingohi" id="domingohi"
                        value="{{ isset($empresa->domingohi) ? $empresa->domingohi : old('domingohi') }}"></td>
                <td> <input type="time" class="form-control" name="domingohf" id="domingohf"
                        value="{{ isset($empresa->domingohf) ? $empresa->domingohf : old('domingohf') }}"></td>
            </tr>
        </tbody>
    </table>

</div>

<br><br>
<div class="row">
    {{-- <div class="form-group col-lg-12 col-m-12 col-12 mt-12">
        <label for="horario">Horario</label>
        <textarea name="horario" id="horario" class="form-control" maxlength="255" cols="153" rows="5">
            {{ isset($empresa->horario) ? $empresa->horario : old('horario') }}
        </textarea>
    </div> --}}


    {{-- Rango de precios --}}
    <div class="form-group col-lg-4 col-m-12 col-4 mt-12 rango_precios">
        <label for="rango_precios">Rango de precios</label>
        <div class="form-group">
            <select class="form-control" name="rango_precios" id="rango_precios">
                <option value="" selected>Seleccionar...</option>
                <option value="0-100"> $50 a $150</option>
                <option value="100-250">$150 a $350</option>
                <option value="250-500">$350 a $1000</option>
            </select>
        </div>
    </div>

    {{-- Tipo de comida --}}
    <div class="form-group col-lg-4 col-m-12 col-4 mt-12 tipo_comida">
        <label for="tipo_comida">Tipo de comida</label>
        <div class="form-group">
            <select class="form-control" name="tipo_comida" id="tipo_comida">
                <option>Seleccionar...</option>
                <option value="Comida de mar">Comida de mar</option>
                <option value="Cortes">Cortes</option>
                <option value="Comida Mexicana">Comida Mexicana</option>
                <option value="Comida Italiana">Comida Italiana</option>
                <option value="Comida China">Comida China</option>
                <option value="Comida Japonesa">Comida Japonesa</option>
                <option value="Comida Arabe">Comida Arabe</option>
                <option value="Comida Americana">Comida Americana</option>
                <option value="Comida Vegana">Comida Vegana</option>
                <option value="Cafetería">Cafetería</option>
            </select>
        </div>
    </div>

    {{-- Servicio a domicilio --}}
    <div class=" col-lg-4 col-m-12 col-4 mt-12 ser_dom">
        <label for="ser_dom">Servicio a domicilio:</label>
        <select id="ser_dom" name="ser_dom" class=" form-control" value="">
            <option value="" selected>Seleccionar...</option>
            <option value="Solo por plataforma">Solo por plataforma</option>
            <option value="Local y Por plataforma">Local y Por plataforma</option>
            <option value="Local">Local</option>
            <option value="No">No</option>
        </select><br>
    </div>


    {{-- Rango de precios --}}
    <div class="form-group col-lg-6 col-m-6 col-6 mt-6 rango_precios_hoteles">
        <label for="rango_precios_hoteles">Rango de precios hotel</label>
        <div class="form-group">
            <select class="form-control" name="rango_precios_hoteles" id="rango_precios_hoteles">
                <option value="" selected>Seleccionar...</option>
                <option value="200-400"> $200 - $400</option>
                <option value="400-1000"> $400 -$1000</option>
                <option value="1000-3000">$1000 a $3000</option>
            </select>
        </div>
    </div>

    <div class="form-group col-lg-6 col-m-6 col-6 mt-6 estrellas">

        <div class="form-group">
            <label for="estrellas">Estrellas</label>
            <select class="form-control" name="estrellas" id="estrellas">
                <option value="">Seleccionar...</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
        </div>
    </div>

</div>


{{-- Pago tarjeta --}}
<div class="row">
    <div class=" col-lg-4 col-m-12 col-4 mt-12">
        <label for="pago_tarjeta">Pago tarjeta:</label>
        <select id="pago_tarjeta" name="pago_tarjeta" class="form-control" value="" required>
            <option value="" selected>Seleccionar...</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
        </select><br>
    </div>


    {{-- Estacionamiento --}}
    <div class="col-lg-4 col-m-12 col-4 mt-12">
        <label for="estacionamiento">Estacionamiento:</label>
        <select id="estacionamiento" name="estacionamiento" class="form-control" value="">
            <option value="" selected>Seleccionar...</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
        </select><br>
    </div>

    {{-- Telefono --}}
    <div class="form-group col-lg-4 col-m-12 col-4 mt-12">
        <label for="telefono">Telefono</label>
        <input type="text" rows="6" name="telefono" class="form-control" maxlength="10"
            value="{{ isset($empresa->telefono) ? $empresa->telefono : old('telefono') }}" id="telefono">
    </div>


    {{-- Novedad 
    <div class="form-group col-lg-6 col-m-6 col-6 mt-6">
        <label for="id_novedad">Novedad:</label>
        <select id="id_novedad" name="id_novedad" class="form-control" value="">
            <option value="">Elige una opción</option>
            @foreach ($novedad as $novedad)
                <option value="1">
                    {{ isset($novedad->id) ? $novedad->novedad : old('novedad') }}</option>
            @endforeach
        </select><br>
    </div> --}}

</div>


{{-- Redes Sociales --}}
{{-- Facebook --}}
<div class="row">
    <div class="form-group col-lg-4 col-m-4 col-6 mt-4">
        <label for="facebook">Facebook URL</label>
        <input type="url" rows="6" name="face_url" class="form-control" maxlength="1500"
            value="{{ isset($empresa->face_url) ? $empresa->face_url : old('face_url') }}" id="face_url">
    </div>


    {{-- Instagram --}}
    <div class="form-group col-lg-4 col-m-4 col-6 mt-4">
        <label for="instagram">Instagram URL</label>
        <input type="url" rows="6" name="insta_url" class="form-control" maxlength="1500"
            value="{{ isset($empresa->insta_url) ? $empresa->insta_url : old('insta_url') }}" id="insta_url">
    </div>


    {{-- Sitio web --}}
    <div class="form-group col-lg-4 col-m-4 col-12 mt-4">
        <label for="sitio">Sitio Web</label>
        <input type="url" rows="6" name="sitio" class="form-control" maxlength="1500"
            value="{{ isset($empresa->sitio) ? $empresa->sitio : old('sitio') }}" id="sitio">
    </div>
</div>



<br>

{{-- Foto perfil --}}
<div class="row">
    <div class="form-group col-lg-6 col-m-6 col-12 mt-6">
        <label for="foto_perfil">Foto de Perfil</label>
        <br>
        @if (isset($empresa->foto_perfil))
            <img class="foto_perfil" src="{{ asset('storage') . '/' . $empresa->foto_perfil }}"><br><br>
        @endif
        <div class="custom-file">
            <input type="file" name="foto_perfil" class="custom-file-input" id="foto_perfil" value=""> <br>
            <label class="custom-file-label" for="foto_perfil">Foto de Perfil</label>
        </div>
    </div>


    {{-- Foto portada --}}

    <div class="form-group col-lg-6 col-m-6 col-12 mt-6">
        <label for="foto_portada">Foto de Portada</label><br>
        @if (isset($empresa->foto_portada))
            <img class="foto_portada" src="{{ asset('storage') . '/' . $empresa->foto_portada }}"><br> <br>
        @endif

        <div class="custom-file">
            <input type="file" name="foto_portada" class="custom-file-input" id="foto_portada" value=""><br>
            <label class="custom-file-label" for="foto_portada">Foto de Portada</label>
        </div>
    </div>
</div>


{{-- url --}}
<div class="form-group col-lg-4 col-m-4 col-6 mt-4">
    <input type="hidden" name="url" id="url" maxlength="150" value="descripcion_empresa/">
</div>

<a href="{{ url('empresa') }}" class="btn btn-primary">Regresar</a>

<input class="btn btn-success" type="submit" value="{{ $modo }} ">


<br><br><br>

@section('css')
    <link rel="stylesheet" href="{{ asset('css/formempresa.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@stop

@section('js')
    <script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <script>
        $('.ejem-select2').select2();

        $(document).ready(function() {
            addPrecios();
        })
    </script>




    <script>
        function addPrecios() {
            var $id_subcategoria = document.getElementById('id_subcategoria');
            var $id_subcat = $id_subcategoria.value;

            console.log($id_subcat);

            /************* Condicional para restaurantes ****************/


            if ($id_subcat == 18) {
                $('.rango_precios').show();
            } else {
                $('.rango_precios').hide();
            }

            if ($id_subcat == 18) {
                $('.tipo_comida').show();
            } else {
                $('.tipo_comida').hide();
            }

            if ($id_subcat == 18) {
                $('.ser_dom').show();
            } else {
                $('.ser_dom').hide();
            }

            /******* Condicional para hoteles **************/

            if ($id_subcat == 10) {
                $('.rango_precios_hoteles').show();
            } else {
                $('.rango_precios_hoteles').hide();
            }

            if ($id_subcat == 10) {
                $('.estrellas').show();
            } else {
                $('.estrellas').hide();
            }

        }
    </script>




@endsection
