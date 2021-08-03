<?php

namespace App\Http\Controllers;

use App\seccion;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SeccionController extends Controller
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
        $seccion['seccion'] = seccion::paginate(30);
        return view('seccion.index', $seccion);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('seccion.create');
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
            'seccion' => 'required|string|max:200',
            'descripcion' => 'required|string|max:1500',
            'foto_perfil' => 'required|max:10000|mimes:jpg,jpeg,png'

        ];
        //
        $mensaje = [
            'required' => 'El :attribute es requerido ',
            'foto_perfil.required' => 'La foto de perfil es requerida',
        ];

        $this->validate($request, $campos, $mensaje);


        //Exclusion de token 
        $datoSeccion = request()->except('_token');

        if ($request->hasFile('foto_perfil')) {
            $datoSeccion['foto_perfil'] = $request->file('foto_perfil')->store('uploads', 'public');
        }

        seccion::insert($datoSeccion);
        return redirect('seccion')->with('mensaje', 'Seccion agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function show(seccion $seccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $seccion = seccion::findOrFail($id);

        return view('seccion.edit', compact('seccion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $campos = [
            'seccion' => 'required|string|max:200',
            'descripcion' => 'required|string|max:1500',
        ];
        //
        $mensaje = [
            'required' => 'El :attribute es requerido ',
        ];

        $this->validate($request, $campos, $mensaje);

        $datoSeccion = request()->except(['_token', '_method']);
        //
        if ($request->hasFile('foto_perfil')) {
            $seccion = seccion::findOrFail($id);
            Storage::delete('public/' . $seccion->foto_perfil);
            $datoSeccion['foto_perfil'] = $request->file('foto_perfil')->store('uploads', 'public');
        }


        seccion::where('id', '=', $id)->update($datoSeccion);

        $seccion = seccion::findOrFail($id);
        // return view('categoria.edit', compact('categoria'));
        return redirect('seccion')->with('mensaje', 'La seccion se edito con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $seccion = seccion::findOrFail($id);
        if (Storage::delete('public/' . $seccion->foto_perfil)) {
            seccion::destroy($id);
        }
        //
        seccion::destroy($id);
        return redirect('seccion')->with('mensaje', 'La seccion se borro con éxito');
    }
}
