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

<div class="row">
    {{-- Paquete --}}
    <div class=" form-group col-lg-8 col-m-12 col-12 mt-12">
        <div class="form-group">
            <label for="paquetes">Paquete</label>
            <input type="text" class="form-control" name="paquetes" id="paquetes" aria-describedby="helpId"
                maxlength="255" value="{{ isset($paquete->paquetes) ? $paquete->paquetes : old('paquetes') }}">
        </div>
    </div>

    {{-- TAG --}}
    <div class=" form-group col-lg-4 col-m-12 col-12 mt-12">
        <div class="form-group">
            <label for="tag">TAG</label>
            <input type="text" class="form-control" name="tag" id="tag" aria-describedby="helpId" maxlength="10"
                value="{{ isset($paquete->tag) ? $paquete->tag : old('tag') }}">
        </div>
    </div>
</div>

<div class="row">
    {{-- Descripcion --}}
    <div class=" form-group col-lg-12 col-m-12 col-12 mt-12">
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <input type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId"
                maxlength="1500"
                value="{{ isset($paquete->descripcion) ? $paquete->descripcion : old('descripcion') }}">
        </div>
    </div>
</div>


<div class="row">
    {{-- Destino --}}
    <div class=" form-group col-lg-6 col-m-12 col-12 mt-12">
        <div class="form-group">
            <label for="destino">Destino</label>
            <input type="text" class="form-control" name="destino" id="destino" aria-describedby="helpId"
                maxlength="150" value="{{ isset($paquete->destino) ? $paquete->destino : old('destino') }}">
        </div>
    </div>

    {{-- Direccion --}}
    <div class=" form-group col-lg-6 col-m-12 col-12 mt-12">
        <div class="form-group">
            <label for="direccion">Direccion</label>
            <input type="text" class="form-control" name="direccion" id="direccion" aria-describedby="helpId"
                maxlength="1500" value="{{ isset($paquete->direccion) ? $paquete->direccion : old('direccion') }}">
        </div>
    </div>
</div>

<div class="row">
    {{-- Municipio --}}
    <div class=" form-group col-lg-12 col-m-12 col-12 mt-12">
        <label for="id_municipio">Escoge un Municipio:</label>
        <select id="id_municipio" name="id_municipio" class="form-control" value="">
            <option value="{{ isset($paquete->id_municipio) ? $paquete->id_municipio : old('id_municipio') }}">Elige
                una opción
            </option>
            @foreach ($municipios as $municipio)
                <option value="{{ isset($municipio->id) ? $municipio->id : old('id') }}">
                    {{ isset($municipio->municipios) ? $municipio->municipios : old('municipios') }}
                </option>
            @endforeach
        </select><br>
    </div>
</div>

<div class="row">
    {{-- Hotel --}}
    <div class=" form-group col-lg-8 col-m-12 col-12 mt-12">
        <div class="form-group">
            <label for="hotel">Hotel</label>
            <input type="text" class="form-control" name="hotel" id="hotel" aria-describedby="helpId" maxlength="1000"
                value="{{ isset($paquete->hotel) ? $paquete->hotel : old('hotel') }}">
        </div>
    </div>

    {{-- Eastrellas del Hotel --}}
    <div class=" form-group col-lg-4 col-m-12 col-12 mt-12">
        <div class="form-group">
            <label for="estrallas_hotel">Estrellas del Hotel</label>
            <input type="text" class="form-control" name="estrallas_hotel" id="estrallas_hotel"
                aria-describedby="helpId" maxlength="2"
                value="{{ isset($paquete->estrallas_hotel) ? $paquete->estrallas_hotel : old('estrellas') }}">
        </div>
    </div>
</div>


<div class="row">
    {{-- Telefono --}}
    <div class=" form-group col-lg-6 col-m-12 col-12 mt-12">
        <div class="form-group">
            <label for="telefono">Telefono</label>
            <input type="text" class="form-control" name="telefono" id="telefono" aria-describedby="helpId"
                maxlength="10" value="{{ isset($paquete->telefono) ? $paquete->telefono : old('telefono') }}">
        </div>
    </div>

    {{-- Sitio --}}
    <div class=" form-group col-lg-6 col-m-12 col-12 mt-12">
        <div class="form-group">
            <label for="sitio">Sitio</label>
            <input type="text" class="form-control" name="sitio" id="sitio" aria-describedby="helpId" maxlength="1500"
                value="{{ isset($paquete->sitio) ? $paquete->sitio : old('sitio') }}">
        </div>
    </div>
</div>

<div class="row">
    {{-- duracion --}}
    <div class=" form-group col-lg-6 col-m-12 col-12 mt-12">
        <div class="form-group">
            <label for="duracion">Duracion</label><br>
            <label for="duracion">Escribe con numeros cuantas horas va a durar</label>
            <input type="text" class="form-control" name="duracion" id="duracion" aria-describedby="helpId"
                maxlength="150" value="{{ isset($paquete->duracion) ? $paquete->duracion : old('duracion') }}">
        </div>
    </div>

    {{-- Sitio --}}
    <div class=" form-group col-lg-6 col-m-12 col-12 mt-12">
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="text" class="form-control" name="precio" id="precio" aria-describedby="helpId" maxlength="1500"
                value="{{ isset($paquete->precio) ? $paquete->precio : old('precio') }}">
        </div>
    </div>
</div>



{{-- Pago con tarjeta --}}
<div class="row">
    <div class="form-group col-lg-12 col-m-12 col-12 mt-12">
        <label for="pago_tarjeta">Pago tarjeta:</label>
        <select id="pago_tarjeta" name="pago_tarjeta" class="form-control" value="">
            <option value="{{ isset($paquete->pago_tarjeta) ? $paquete->pago_tarjeta : old('pago_tarjeta') }}">Elige
                una opción</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
        </select><br>
    </div>
</div>
{{-- Foto perfil --}}
<div class="row">
    <div class="form-group col-lg-12 col-m-12 col-12 mt-12">
        @if (isset($paquete->foto_perfil))
            <img class="foto_perfil" src="{{ asset('storage') . '/' . $paquete->foto_perfil }}" width="50px"
                height="auto"><br><br>
        @endif
        <div class="custom-file">
            <input type="file" name="foto_perfil" class="custom-file-input" id="foto_perfil" value=""> <br>
            <label class="custom-file-label" for="foto_perfil">Foto de Perfil</label>
        </div>
    </div>
</div>


<input class="btn btn-success" type="submit" value="{{ $modo }} ">

<a href="{{ url('paquete') }}" class="btn btn-primary">Regresar</a>
<br><br><br>
