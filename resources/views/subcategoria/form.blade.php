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

{{-- Subcategoria --}}
<div class="row">
    <div class="form-group col-lg-12 col-m-12 col-12 mt-12 w100">
        <label for="subcategoria">Subcategoria:</label>
        <input type="text" rows="6" name="subcategoria" class="form-control"
            value="{{ isset($subcategoria->subcategoria) ? $subcategoria->subcategoria : old('subcategoria') }}"
            id="subcategoria">
    </div>
</div>

{{-- descripcion --}}
<div class="row">
    <div class="form-group col-lg-12 col-m-12 col-12 mt-12 w100">
        <label for="descripcion">Descripcion:</label>
        <input type="text" rows="6" name="descripcion" class="form-control"
            value="{{ isset($subcategoria->descripcion) ? $subcategoria->descripcion : old('descripcion') }}"
            id="descripcion">
    </div>
</div>

{{-- Categoria --}}
<div class="row">
    <div class="form-group col-lg-12 col-m-12 col-12 mt-12">
        <label for="id_categoria">Escoge una Categoría:</label>
        <select id="id_categoria" name="id_categoria" class="form-control" required value="">
            <option value="">Elige una opción</option>
            @foreach ($categorias as $categoria)
                <option value="{{ isset($categoria->id) ? $categoria->id : old('id') }}">
                    {{ isset($categoria->categorias) ? $categoria->categorias : old('categorias') }}
                </option>
            @endforeach
        </select><br>
    </div>
</div>


{{-- Foto perfil --}}
<div class="row">
    <div class="form-group col-lg-12 col-m-12 col-12 mt-12">
        @if (isset($subcategoria->foto_perfil))
            <img class="foto_perfil" src="{{ asset('storage') . '/' . $subcategoria->foto_perfil }}" width="50px"
                height="auto"><br><br>
        @endif
        <div class="custom-file">
            <input type="file" name="foto_perfil" class="custom-file-input" id="foto_perfil" value=""> <br>
            <label class="custom-file-label" for="foto_perfil">Foto de Perfil</label>
        </div>
    </div>
</div>


<input class="btn btn-success" type="submit" value="{{ $modo }} Subcategoria">

<a href="{{ url('subcategoria') }}" class="btn btn-primary">Regresar</a>
