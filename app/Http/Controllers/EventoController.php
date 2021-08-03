<?php

namespace App\Http\Controllers;

use App\Evento;
use App\Municipios;
use App\Novedad;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Evento::all();
        return view('evento.evento', compact('eventos'));
        /*Retornar vista del calendario 
        $municipios = Municipios::all();
        return view('evento.index', compact('municipios'));*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $novedad = Novedad::all();
        $evento = Evento::all();
        $municipios = Municipios::all();
        return view('evento.create', compact('municipios', 'evento', 'novedad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos = [
            'title' => 'required|string|max:150',
            'direccion' => 'required|string|max:300',
            'horario' => 'required|string|max:255',
            'tag' => 'required|string|max:10',
            //'telefono' => 'required|string|max:10',
            //'sitio' => 'required|string|max:1500',
            'pago_tarjeta' => 'required|string|max:2',
            //'costo' => 'required|string|max:100',
            'estacionamiento' => 'required|string|max:2',
            'start' => 'required|date',
            'end' => 'required|date',
            'foto_perfil' => 'required|max:10000|mimes:jpeg,png,jpg',
            'id_municipio' => 'required|string|max:20'
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido ',
            'foto_perfil.required' => 'La foto de perfil es requerida',
        ];

        $this->validate($request, $campos, $mensaje);

        //exclusion de la llave _token
        $datosEvento = request()->except('_token');

        //Apartado de validacion de fotos tanto de perfil como de portada
        if ($request->hasFile('foto_perfil')) {
            $datosEvento['foto_perfil'] = $request->file('foto_perfil')->store('uploads', 'public');
        }

        Evento::insert($datosEvento);
        return redirect('evento')->with('mensaje', 'Evento agregada con éxito');

        /*Esto es de la agenda, con el calendario (full calendar)
        request()->validate(Evento::$rules);
        $evento = Evento::create($request->all());*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $novedad = Novedad::all();
        $evento = Evento::findOrFail($id);
        $municipios = Municipios::all();
        return view('evento.edit', compact('municipios', 'evento', 'novedad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $campos = [
            'title' => 'required|string|max:150',
            'direccion' => 'required|string|max:300',
            'horario' => 'required|string|max:255',
            'tag' => 'required|string|max:10',
            //'telefono' => 'required|string|max:10',
            //'sitio' => 'required|string|max:1500',
            'pago_tarjeta' => 'required|string|max:2',
            'estacionamiento' => 'required|string|max:2',
            'start' => 'required|date',
            'end' => 'required|date',
            'foto_perfil' => '|max:10000|mimes:jpeg,png,jpg',
            'id_municipio' => 'required|string|max:20'
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido ',
        ];


        $this->validate($request, $campos, $mensaje);

        $datosEvento = request()->except('_token', '_method');

        if ($request->hasFile('foto_perfil')) {
            $evento = Evento::findOrFail($id);
            Storage::delete('public/' . $evento->foto_perfil);
            $datosEvento['foto_perfil'] = $request->file('foto_perfil')->store('uploads', 'public');
        }

        Evento::where('id', '=', $id)->update($datosEvento);

        return redirect('evento')->with('mensaje', 'Evento editada con éxito',  'municipios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evento = Evento::findOrFail($id);
        if (Storage::delete('public/' . $evento->foto_perfil)) {
            Evento::destroy($id);
        }

        return redirect('evento')->with('mensaje', 'Evento borrada con éxito');
    }
}
