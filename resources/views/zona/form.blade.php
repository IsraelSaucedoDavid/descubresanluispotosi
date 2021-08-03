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

{{-- Nombre de la institución --}}
<div class="row">
    <div class="form-group col-lg-12 col-m-12 col-12 mt-12 w100">
        <label for="zona">Zona:</label>
        <input type="text" rows="6" name="zona" class="form-control"
            value="{{ isset($zona->zona) ? $zona->zona : old('zona') }}" id="zona">
    </div>
</div>

{{-- descripcion --}}
<div class="row">
    <div class="form-group col-lg-12 col-m-12 col-12 mt-12 w100">
        <label for="descripcion">Descripcion:</label>
        <input type="text" rows="6" name="descripcion" class="form-control"
            value="{{ isset($zona->descripcion) ? $zona->descripcion : old('descripcion') }}" id="descripcion">
    </div>
</div>

{{-- Localizacion --}}
<div class="row">
    <div class="form-group col-lg-12 col-m-12 col-12 mt-12">
        <label for="localizacion">Localizacion</label>
        <input type="text" rows="6" name="localizacion" class="form-control" maxlength="1500"
            value="{{ isset($empresa->localizacion) ? $empresa->localizacion : old('localizacion') }}"
            id="localizacion">
    </div>
</div>

{{-- escoger seccion a cual va a pertenecer la zona --}}
<div class="row">
    <div class="form-group col-lg-12 col-m-12 col-12 mt-12">
        <label for="id_seccion">Escoge una Sección:</label>
        <select id="id_seccion" name="id_seccion" class="form-control" required value="">
            <option value="">Elige una opción</option>
            @foreach ($seccion as $sec)
                <option value="{{ isset($sec->id) ? $sec->id : old('id') }}">
                    {{ isset($sec->seccion) ? $sec->seccion : old('itemsEC') }}
                </option>
            @endforeach
        </select><br>
    </div>
</div>


{{-- Foto perfil --}}
<div class="row">
    <div class="form-group col-lg-12 col-m-12 col-12 mt-12">
        @if (isset($zona->foto_perfil))
            <img class="foto_portada" src="{{ asset('storage') . '/' . $zona->foto_perfil }}" width="50px"
                height="auto"><br><br>
        @endif
        <div class="custom-file">
            <input type="file" name="foto_perfil" class="custom-file-input" id="foto_perfil" value=""> <br>
            <label class="custom-file-label" for="foto_perfil">Foto de Perfil</label>
        </div>
    </div>
</div>





<input class="btn btn-success" type="submit" value="{{ $modo }} zona">

<a href="{{ url('zona') }}" class="btn btn-primary">Regresar</a>
