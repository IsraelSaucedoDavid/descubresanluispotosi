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



{{-- tags --}}
<div class="row">
    <div class="form-group col-lg-12 col-m-12 col-12 mt-12 w100">
        <label for="subcategoria">Tag:</label>
        <input type="text" rows="6" name="tags" id="tags" class="form-control"
            value="{{ isset($tags->tags) ? $tags->tags : old('tags') }}">
    </div>
</div>



<input class="btn btn-success" type="submit" value="{{ $modo }} Tags">

<a href="{{ url('tags') }}" class="btn btn-primary">Regresar</a>
