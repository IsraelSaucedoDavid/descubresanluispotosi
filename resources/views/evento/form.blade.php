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
    {{-- Titulo del evento --}}
    <div class="form-group col-lg-8 col-m-12 col-12 mt-12">
        <div class="form-group">
            <label for="title">Titulo del Evento </label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" maxlength="1500"
                value="{{ isset($evento->title) ? $evento->title : old('title') }}">
        </div>
    </div>

    {{-- Tag --}}
    <div class="form-group col-lg-4 col-m-12 col-12 mt-12">
        <div class="form-group">
            <label for="tag">TAG</label>
            <input type="text" class="form-control" name="tag" id="tag" aria-describedby="helpId" maxlength="10"
                value="{{ isset($evento->tag) ? $evento->tag : old('tag') }}">
        </div>
    </div>
</div>

{{-- Descripcion --}}
<div class="form-group">
    <label for="descripcion">Descripcion</label>
    <input type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId"
        maxlength="1500" value="{{ isset($evento->descripcion) ? $evento->descripcion : old('descripcion') }}">
</div>

<div class="row">
    {{-- Horaio --}}
    <div class="form-group col-lg-12 col-m-12 col-12 mt-12">
        <div class="form-group">
            <label for="horario">Horario</label>
            <input type="text" class="form-control" name="horario" id="horario" aria-describedby="helpId"
                maxlength="255" value="{{ isset($evento->horario) ? $evento->horario : old('horario') }}">
        </div>
    </div>

    {{-- Fecha de inicio --}}
    <div class="form-group col-lg-6 col-m-12 col-12 mt-12">
        <div class="form-group">
            <label for="start">Fecha de inicio</label>
            <input type="text" class="form-control" name="start" id="start" aria-describedby="helpId"
                value="{{ isset($evento->start) ? $evento->start : old('start') }}">
        </div>
    </div>

    {{-- Fecha de fin --}}
    <div class="form-group col-lg-6 col-m-12 col-12 mt-12">
        <div class="form-group">
            <label for="end">Fecha de fin</label>
            <input type="text" class="form-control" name="end" id="end" aria-describedby="helpId"
                value="{{ isset($evento->end) ? $evento->end : old('end') }}">
        </div>
    </div>
</div>

<div class=" row">
    {{-- Direccion --}}
    <div class="form-group col-lg-6 col-m-12 col-12 mt-12">
        <div class="form-group">
            <label for="direccion">Direccion</label>
            <input type="text" class="form-control" name="direccion" id="direccion" aria-describedby="helpId"
                maxlength="1500" value="{{ isset($evento->direccion) ? $evento->direccion : old('direccion') }}">
        </div>
    </div>

    {{-- Escocge municipio --}}
    <div class=" form-group col-lg-6 col-m-12 col-12 mt-12">
        <label for="id_municipio">Escoge un Municipio:</label>
        <select id="id_municipio" name="id_municipio" class="form-control" value="">
            <option value="">Elige una opción</option>
            @foreach ($municipios as $municipio)
                <option value="{{ isset($municipio->id) ? $municipio->id : old('id') }}">
                    {{ isset($municipio->municipios) ? $municipio->municipios : old('municipios') }}
                </option>
            @endforeach
        </select><br>
    </div>
</div>

<div class="row">
    {{-- Telefono --}}
    <div class="form-group col-lg-5 col-m-12 col-12 mt-12">
        <div class="form-group">
            <label for="telefono">Telefono</label>
            <input type="num" class="form-control" name="telefono" id="telefono" aria-describedby="helpId"
                maxlength="10" value="{{ isset($evento->telefono) ? $evento->telefono : old('telefono') }}">
        </div>
    </div>

    {{-- Sitio --}}
    <div class="form-group col-lg-5 col-m-12 col-12 mt-12">
        <div class="form-group">
            <label for="sitio">Sitio</label>
            <input type="url" class="form-control" name="sitio" id="sitio" aria-describedby="helpId" maxlength="1500"
                value="{{ isset($evento->sitio) ? $evento->sitio : old('sitio') }}">
        </div>
    </div>

    {{-- Estacionamiento --}}
    <div class="form-group col-lg-2 col-m-12 col-12 mt-12">
        <label for="estacionamiento">Estacionamiento:</label>
        <select id="estacionamiento" name="estacionamiento" class="form-control" value="">
            <option value="">Elige una opción</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
        </select><br>
    </div>
</div>

<div class="row">
    {{-- Pago con tarjeta --}}
    <div class="form-group col-lg-6 col-m-12 col-12 mt-12">
        <label for="pago_tarjeta">Pago tarjeta:</label>
        <select id="pago_tarjeta" name="pago_tarjeta" class="form-control" value="">
            <option value="">Elige una opción</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
        </select><br>
    </div>

    {{-- Costos --}}
    <div class="form-group col-lg-6 col-m-12 col-12 mt-12">
        <div class="form-group">
            <label for="costo">Costo</label>
            <input type="text" class="form-control" name="costo" id="costo" aria-describedby="helpId" maxlength="100"
                value="{{ isset($evento->costo) ? $evento->costo : old('costo') }}">
        </div>
    </div>

    {{-- Novedad --}}
    <div class="form-group col-lg-6 col-m-12 col-12 mt-12">
        <label for="id_novedad">Novedad:</label>
        <select id="id_novedad" name="id_novedad" class="form-control" required value="">
            <option value="">Elige una opción</option>
            @foreach ($novedad as $novedad)
                <option value="{{ isset($novedad->id) ? $novedad->id : old('id') }}">
                    {{ isset($novedad->id) ? $novedad->novedad : old('novedad') }}</option>
            @endforeach
        </select><br>
    </div>

    {{-- Giro de evento --}}
    <div class="form-group col-lg-6 col-m-12 col-12 mt-12">
        <label for="giro">Clasificacion:</label>
        <select id="giro" name="giro" class="form-control" required value="">
            <option value="">Elige una opción</option>
            <option value="Deportes">Deportes</option>
            <option value="Conciertos">Conciertos</option>
            <option value="Obras de Teatro">Obras de Teatro</option>
            <option value="Festivales">Festivales</option>
            <option value="Cultura">Cultura</option>
            <option value="Ferias">Ferias</option>
        </select><br>
    </div>
</div>

{{-- Foto perfil --}}
<div class="row">
    <div class="form-group col-lg-12 col-m-12 col-12 mt-12">
        @if (isset($evento->foto_perfil))
            <img class="foto_perfil" src="{{ asset('storage') . '/' . $evento->foto_perfil }}" width="50px"
                height="auto"><br><br>
        @endif
        <div class="custom-file">
            <input type="file" name="foto_perfil" class="custom-file-input" id="foto_perfil" value=""> <br>
            <label class="custom-file-label" for="foto_perfil">Foto de Perfil</label>
        </div>
    </div>
</div>


{{-- url --}}
<div class="form-group col-lg-4 col-m-4 col-6 mt-4">
    <input type="hidden" name="url" id="url" maxlength="150" value="paquetes/">
</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} ">

<a href="{{ url('evento') }}" class="btn btn-primary">Regresar</a>
<br><br><br>
