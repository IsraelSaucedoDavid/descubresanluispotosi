@extends('adminlte::page')


@section('title', '| Eventos')

@section('content')
    <div class="container">
        <div id="agenda">

        </div>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#evento">
        Launch
    </button>

    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="evento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- Formulario que va adentro del Modal --}}
                    <form action="">
                        {!! csrf_field() !!}
                        {{-- ID del evento --}}
                        <div class="form-group">
                            <label for="id">ID</label>
                            <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId"
                                placeholder="">
                        </div>

                        <div class="row">
                            {{-- Titulo --}}
                            <div class="form-group col-lg-6 col-m-6 col-6 mt-6">
                                <label for="title">Evento</label>
                                <input type="text" rows="6" name="title" id="title" class="form-control">
                            </div>

                            {{-- Tipo de comida 
                            <div class="form-group col-lg-6 col-m-6 col-6 mt-6">
                                <label for="tag">Tag</label>
                                <input type="text" rows="6" name="tag" id="tag" class="form-control">
                            </div>
                        </div> --}}
                            {{-- Descripcion --}}
                            <div class="form-group">
                                <label for="descripcion ">Descripción</label>
                                <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                            </div>
                            {{-- Direccion 
                        <div class="form-group">
                            <label for="direccion">Direccion del evento</label>
                            <input type="text" class="form-control" name="direccion" id="direccion"
                                aria-describedby="helpId" placeholder="">
                        </div> --}}

                            <div class="row">
                                {{-- Telefono 
                            <div class="form-group col-lg-6 col-m-6 col-6 mt-6">
                                <label for="telefono">Telefono de contacto</label>
                                <input type="text" class="form-control" name="telefono" id="telefono"
                                    aria-describedby="helpId" placeholder="">
                            </div> --}}
                                {{-- Sitio 
                            <div class="form-group col-lg-6 col-m-6 col-6 mt-6">
                                <label for="sitio">Sitio para comprar boletos</label>
                                <input type="text" class="form-control" name="sitio" id="sitio" aria-describedby="helpId"
                                    placeholder="">
                            </div> --}}
                            </div>
                            {{-- Fecha Inicial --}}
                            <div class="form-group">
                                <label for="start">Start Fecha de inicio</label>
                                <input type="text" class="form-control" name="start" id="start" aria-describedby="helpId"
                                    placeholder="">
                            </div>
                            {{-- Fecha final --}}
                            <div class="form-group">
                                <label for="end">End Fecha final</label>
                                <input type="text" class="form-control" name="end" id="end" aria-describedby="helpId"
                                    placeholder="">
                            </div>
                            {{-- Horario 
                            <div class="form-group">
                                <label for="horario">Horario</label>
                                <input type="text" class="form-control" name="horario" id="horario"
                                    aria-describedby="helpId" placeholder="">
                            </div> --}}
                            {{-- Pago tarjeta 
                            <div class="form-group">
                                <label for="pago_tarjeta">Pago tarjeta:</label>
                                <select id="pago_tarjeta" name="pago_tarjeta" class="form-control" required value="">
                                    <option value="">Elige una opción</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                </select>
                            </div> --}}
                            {{-- estacionamiento 
                            <div class="form-group">
                                <label for="estacionamiento">Estacionamiento:</label>
                                <select id="estacionamiento" name="estacionamiento" class="form-control" required value="">
                                    <option value="">Elige una opción</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                </select>
                            </div> --}}
                            {{-- Municipio 
                            <div class="form-group">
                                <label for="id_municipio">Escoge un Municipio:</label>
                                <select id="id_municipio" name="id_municipio" class="form-control" required value="">
                                    <option value="">Elige una opción</option>
                                    @foreach ($municipios as $municipio)
                                        <option value="{{ $municipio->id }}"> {{ $municipio->municipios }} </option>
                                    @endforeach
                                </select><br>
                            </div> --}}
                    </form>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
                    <button type="button" class="btn btn-warning" id="btnModificar">Modificar</button>
                    <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    {{-- FullCalendar --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/main.css">

@stop

@section('js')

    {{-- FullCalendar --}}
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/locales-all.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/agenda.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--Scripts de boostrap-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
@stop
