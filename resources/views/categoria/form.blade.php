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


{{-- Nombre de la categoria --}}
<div class="row">
    <div class="form-group col-lg-12 col-m-12 col-12 mt-12 w100">
        <label for="categorias">Categoria:</label>
        <input type="text" rows="6" name="categorias" class="form-control"
            value="{{ isset($categoria->categorias) ? $categoria->categorias : old('categorias') }}" id="categorias">
    </div>
</div>

{{-- descripcion --}}
<div class="row">
    <div class="form-group col-lg-12 col-m-12 col-12 mt-12 w100">
        <label for="descripcion">Descripcion:</label>
        <input type="text" rows="6" name="descripcion" class="form-control"
            value="{{ isset($categoria->descripcion) ? $categoria->descripcion : old('descripcion') }}"
            id="descripcion">
    </div>
</div>


{{-- Foto perfil --}}
<div class="row">
    <div class="form-group col-lg-12 col-m-12 col-12 mt-12">
        @if (isset($categoria->foto_perfil))
            <img class="foto_perfil" src="{{ asset('storage') . '/' . $categoria->foto_perfil }}" width="50px"
                height="auto"><br><br>
        @endif
        <div class="custom-file">
            <input type="file" name="foto_perfil" class="custom-file-input" id="foto_perfil" value=""> <br>
            <label class="custom-file-label" for="foto_perfil">Foto de Perfil</label>
        </div>
    </div>
</div>



<input class="btn btn-success" type="submit" value="{{ $modo }} Categoria">

<a href="{{ url('categoria') }}" class="btn btn-warning">Regresar</a>
