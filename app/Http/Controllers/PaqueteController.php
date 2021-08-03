<?php

namespace App\Http\Controllers;

use App\Municipios;
use App\Paquete;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PaqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $paquetes = Paquete::all();
        return view('paquete.index', compact('paquetes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $paquetes = Paquete::all();
        $municipios = Municipios::all();
        return view('paquete.create', compact('paquetes', 'municipios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $campos = [
            'paquetes' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1500',
            'destino' => 'required|string|max:150',
            'tag' => 'required|string|max:10',
            'direccion' => 'required|string|max:1500',
            //'telefono' => 'required|string|max:10',
            //'sitio' => 'required|string|max:1500',
            'pago_tarjeta' => 'required|string|max:2',
            'foto_perfil' => 'required|max:10000|mimes:jpeg,png,jpg',
            //'hotel' => 'required|string|max:1000',
            //'estrallas_hotel' => 'required|string|max:2',
            'id_municipio' => 'required|string|max:20',
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido ',
            'foto_perfil.required' => 'La foto de perfil es requerida',
        ];

        $this->validate($request, $campos, $mensaje);

        //exclusion de la llave _token
        $datosPaquete = request()->except('_token');

        //Apartado de validacion de fotos tanto de perfil como de portada
        if ($request->hasFile('foto_perfil')) {
            $datosPaquete['foto_perfil'] = $request->file('foto_perfil')->store('uploads', 'public');
        }

        Paquete::insert($datosPaquete);
        return redirect('paquete')->with('mensaje', 'Paquete agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paquete  $paquete
     * @return \Illuminate\Http\Response
     */
    public function show(Paquete $paquete)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paquete  $paquete
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paquete = Paquete::findOrFail($id);
        $municipios = Municipios::all();
        return view('paquete.edit', compact('municipios', 'paquete'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paquete  $paquete
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $campos = [
            'paquetes' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1500',
            'destino' => 'required|string|max:150',
            'tag' => 'required|string|max:10',
            'direccion' => 'required|string|max:1500',
            //'telefono' => 'required|string|max:10',
            //'sitio' => 'required|string|max:1500',
            'pago_tarjeta' => 'required|string|max:2',
            //'foto_perfil' => 'required|string|max:1500',
            //'hotel' => 'required|string|max:1000',
            //'estrallas_hotel' => 'required|string|max:2',
            'id_municipio' => 'required|string|max:20',
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido ',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosPaquete = request()->except('_token', '_method');

        if ($request->hasFile('foto_perfil')) {
            $paquete = Paquete::findOrFail($id);
            Storage::delete('public/' . $paquete->foto_perfil);
            $datosPaquete['foto_perfil'] = $request->file('foto_perfil')->store('uploads', 'public');
        }

        Paquete::where('id', '=', $id)->update($datosPaquete);

        return redirect('paquete')->with('mensaje', 'Paquete editado con éxito',  'municipios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paquete  $paquete
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $paquete = Paquete::findOrFail($id);
        if (Storage::delete('public/' . $paquete->foto_perfil)) {
            Paquete::destroy($id);
        }

        return redirect('paquete')->with('mensaje', 'Paquete borrado con éxito');
    }
}
