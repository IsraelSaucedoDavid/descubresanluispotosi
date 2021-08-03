<?php

namespace App\Http\Controllers;

use App\seccion;
use App\zona;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ZonaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $seccion = seccion::all();
        $zona = zona::paginate(10);
        return view('zona.index', compact('zona', 'seccion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $seccion = seccion::all();
        return view('zona.create', compact('seccion'));
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
            'zona' => 'required|string|max:200',
            'descripcion' => 'required|string|max:1500',
            'foto_perfil' => 'required|max:10000|mimes:jpeg,png,jpg'
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido ',
            'foto_perfil.required' => 'La foto de perfil es requerida',
        ];

        $this->validate($request, $campos, $mensaje);


        //Exclusion de token 
        $datoZona = request()->except('_token');

        if ($request->hasFile('foto_perfil')) {
            $datoZona['foto_perfil'] = $request->file('foto_perfil')->store('uploads', 'public');
        }

        zona::insert($datoZona);
        return redirect('zona')->with('mensaje', 'Zona agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\zona  $zona
     * @return \Illuminate\Http\Response
     */
    public function show(zona $zona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\zona  $zona
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $zona = zona::findOrFail($id);
        $seccion = seccion::all();
        return view('zona.edit', compact('zona', 'seccion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\zona  $zona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $campos = [
            'zona' => 'required|string|max:200',
            'descripcion' => 'required|string|max:1500',
        ];

        $mensaje = [
            'required' => ':attribute es requerido ',
        ];

        $this->validate($request, $campos, $mensaje);


        $datoZona = request()->except(['_token', '_method']);
        //
        if ($request->hasFile('foto_perfil')) {
            $zona = zona::findOrFail($id);
            Storage::delete('public/' . $zona->foto_perfil);
            $datoZona['foto_perfil'] = $request->file('foto_perfil')->store('uploads', 'public');
        }


        zona::where('id', '=', $id)->update($datoZona);

        $zona = zona::findOrFail($id);
        // return view('categoria.edit', compact('categoria'));
        return redirect('zona')->with('mensaje', 'La zona se edito con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\zona  $zona
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $zona = zona::findOrFail($id);
        if (Storage::delete('public/' . $zona->foto_perfil)) {
            zona::destroy($id);
        }
        //
        zona::destroy($id);
        return redirect('zona')->with('mensaje', 'La zona se borro con éxito');
    }
}
