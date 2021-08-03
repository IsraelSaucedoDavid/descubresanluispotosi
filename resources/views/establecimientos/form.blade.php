@section('css')

@endsection

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
        <label for="nom_esta">Nombre del establecimiento</label>
        <input type="text" rows="6" name="nom_esta" class="form-control" maxlength="1500"
            value="{{ isset($establecimientos->nom_esta) ? $establecimientos->nom_esta : old('nom_esta') }}"
            id="nom_esta">
    </div>


    {{-- Tag --}}
    <div class="form-group col-lg-4 col-m-12 col-12 mt-12">
        <label for="tag">Tag</label>
        <input type="text" rows="6" name="tag" class="form-control"
            value="{{ isset($establecimientos->tag) ? $establecimientos->tag : old('tag') }}" id="tag">
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






<div class="row">
    {{-- Categoría --}}
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
            <option value="{{ isset($categoria->id) ? $categoria->id : old('id') }}">
                {{ isset($categoria->categorias) ? $categoria->categorias : old('categorias') }}
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
                <option value="{{ isset($subcategoria->id) ? $subcategoria->id : old('id') }}">
                    {{ isset($subcategoria->subcategoria) ? $subcategoria->subcategoria : old('subcategoria') }}
                </option>
            @endforeach
        </select>

    </div>
</div>


<div class="row">

    {{-- User Id --}}
    {{-- <div class="form-group col-lg-6 col-m-6 col-6 mt-6">
        <label for="id_user">Usuario:</label>
        <select id="id_user" name="id_user" class="form-control" required value="">
            <option value="">Elige una opción</option>
            @foreach ($usuarios as $usuario)
                <option value="{{ isset($usuario->id) ? $usuario->id : old('id') }}">
                    {{ isset($usuario->name) ? $usuario->name : old('name') }}</option>
            @endforeach
        </select><br>
    </div> --}}

</div>


{{-- Dirección --}}
<div class="row">
    <div class="form-group col-lg-6 col-m-6 col-6 mt-6">
        <label for="direccion">Dirección</label>
        <input type="text" rows="6" name="direccion" class="form-control" maxlength="1500"
            value="{{ isset($establecimientos->direccion) ? $establecimientos->direccion : old('direccion') }}"
            id="direccion">
    </div>

    {{-- Municipio --}}
    <div class="form-group col-lg-6 col-m-6 col-6 mt-6">
        <label for="id_municipio">Escoge un Municipio:</label>
        <select id="id_municipio" name="id_municipio" class="form-control" required value="">
            <option value="">Elige una opción</option>
            @foreach ($municipios as $municipio)
                <option value="{{ isset($municipio->id) ? $municipio->id : old('id') }}">
                    {{ isset($municipio->municipios) ? $municipio->municipios : old('municipios') }}
                </option>
            @endforeach
        </select><br>
    </div>


</div>


{{-- Horario --}}
<div class="row">
    <div class="form-group col-lg-4 col-m-4 col-6 mt-4">
        <label for="horario">Horario</label>
        <input type="text" rows="6" name="horario" class="form-control" maxlength="100"
            value="{{ isset($establecimientos->horario) ? $establecimientos->horario : old('horario') }}"
            id="horario">
    </div>


    {{-- Rango de precios --}}
    <div class="form-group col-lg-4 col-m-4 col-6 mt-4">
        <label for="rango_precios">Rango de precios</label>
        <input type="text" rows="6" name="rango_precios" class="form-control" maxlength="50"
            value="{{ isset($establecimientos->rango_precios) ? $establecimientos->rango_precios : old('rango_precios') }}"
            id="rango_precios">
    </div>


    {{-- Telefono --}}
    <div class="form-group col-lg-4 col-m-4 col-12 mt-4">
        <label for="telefono">Telefono</label>
        <input type="text" rows="6" name="telefono" class="form-control" maxlength="10"
            value="{{ isset($establecimientos->telefono) ? $establecimientos->telefono : old('telefono') }}"
            id="telefono">
    </div>
</div>

{{-- Redes Sociales --}}
{{-- Facebook --}}
<div class="row">
    <div class="form-group col-lg-4 col-m-4 col-6 mt-4">
        <label for="facebook">Facebook URL</label>
        <input type="url" rows="6" name="face" class="form-control" maxlength="1500"
            value="{{ isset($establecimientos->establecimientos) ? $empresa->face_url : old('face') }}" id="face">
    </div>


    {{-- Instagram --}}
    <div class="form-group col-lg-4 col-m-4 col-6 mt-4">
        <label for="instagram">Instagram URL</label>
        <input type="url" rows="6" name="insta" class="form-control" maxlength="1500"
            value="{{ isset($establecimientos->insta) ? $empresa->insta : old('insta') }}" id="insta">
    </div>


    {{-- Sitio web --}}
    <div class="form-group col-lg-4 col-m-4 col-12 mt-4">
        <label for="sitio">Sitio Web</label>
        <input type="url" rows="6" name="sitio" class="form-control" maxlength="1500"
            value="{{ isset($establecimientos->sitio) ? $establecimientos->sitio : old('sitio') }}" id="sitio">
    </div>
</div>



<div class="row">
    {{-- <div class="form-group col-lg-6 col-m-6 col-6 mt-6">
        <label for="estrellas">Estrellas</label>
        <input type="text" rows="6" name="estrellas" class="form-control" maxlength="1"
            value="{{ isset($empresa->estrellas) ? $empresa->estrellas : old('estrellas') }}" id="estrellas">
    </div> --}}

    {{-- Tipo de comida --}}
    <div class="form-group col-lg-6 col-m-6 col-6 mt-6">
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
</div>

{{-- Pago tarjeta --}}
<div class="row">
    <div class="form-group col-lg-6 col-m-6 col-6 mt-6">
        <label for="pago_tarjeta">Pago tarjeta:</label>
        <select id="pago_tarjeta" name="pago_tarjeta" class="form-control" required value="">
            <option value="">Elige una opción</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
        </select><br>
    </div>


    {{-- Estacionamiento --}}
    <div class="form-group col-lg-6 col-m-6 col-6 mt-6">
        <label for="estacionamiento">Estacionamiento:</label>
        <select id="estacionamiento" name="estacionamiento" class="form-control" required value="">
            <option value="">Elige una opción</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
        </select><br>
    </div>


    {{-- Servicio a domicilio --}}
    <div class="form-group col-lg-6 col-m-6 col-6 mt-6">
        <label for="ser_dom">Ser. domicilio:</label>
        <select id="ser_dom" name="ser_dom" class="form-control" required value="">
            <option value="">Elige una opción</option>
            <option value="Solo por plataforma">Solo por plataforma</option>
            <option value="Local y Por plataforma">Local y Por plataforma</option>
            <option value="Local">Local</option>
            <option value="No">No</option>
        </select><br>
    </div>

    {{-- Novedad 
    <div class="form-group col-lg-6 col-m-6 col-6 mt-6">
        <label for="id_novedad">Novedad:</label>
        <select id="id_novedad" name="id_novedad" class="form-control" required value="">
            <option value="">Elige una opción</option>
            @foreach ($novedad as $novedad)
                <option value="{{ isset($novedad->id) ? $novedad->id : old('id') }}">
                    {{ isset($novedad->id) ? $novedad->novedad : old('novedad') }}</option>
            @endforeach
        </select><br>
    </div> --}}



    {{-- Zona --}}
    <div class="form-group col-lg-6 col-m-6 col-6 mt-6">
        <label for="id_zona">Zona:</label>
        <select id="id_zona" name="id_zona" class="form-control" required value="">
            <option value="">Selecciona...</option>
            @foreach ($zonas as $zona)
                <option value="{{ isset($zona->id) ? $zona->id : old('id') }}">
                    {{ isset($zona->id) ? $zona->zona : old('zona') }}</option>
            @endforeach
        </select><br>
    </div>
</div>


{{-- Foto perfil --}}
<div class="row">
    <div class="form-group col-lg-12 col-m-12 col-12 mt-12">
        @if (isset($establecimientos->foto_perfil))
            <img class="foto_perfil" src="{{ asset('storage') . '/' . $establecimientos->foto_perfil }}" width="50px"
                height="auto"><br><br>
        @endif
        <div class="custom-file">
            <input type="file" name="foto_perfil" class="custom-file-input" id="foto_perfil" value=""> <br>
            <label class="custom-file-label" for="foto_perfil">Foto de Perfil</label>
        </div>
    </div>
</div>

{{-- Foto portada --}}
<div class="row">
    <div class="form-group col-lg-12 col-m-12 col-12 mt-12">
        @if (isset($establecimientos->foto_portada))
            <img class="foto_portada" src="{{ asset('storage') . '/' . $establecimientos->foto_portada }}"
                width="50px" height="auto"><br> <br>
        @endif

        <div class="custom-file">
            <input type="file" name="foto_portada" class="custom-file-input" id="foto_portada" value=""><br>
            <label class="custom-file-label" for="foto_portada">Foto de Portada</label>
        </div>
    </div>
</div>



<input class="btn btn-success" type="submit" value="{{ $modo }} ">

<a href="{{ url('establecimientos') }}" class="btn btn-primary">Regresar</a>
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
