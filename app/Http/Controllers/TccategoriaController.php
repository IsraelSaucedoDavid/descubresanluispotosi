<?php

namespace App\Http\Controllers;

use App\tccategoria;
use App\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class TccategoriaController extends Controller
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
        $files = File::paginate(2);
        $categorias = tccategoria::paginate(5);
        return view('categoria.index', compact('categorias', 'files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categoria.create');
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
            'categorias' => 'required|string|max:50',
            'descripcion' => 'required|string|max:1500',
            'foto_perfil' => 'required|max:10000|mimes:jpeg,png,jpg'
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido ',
            'foto_perfil.required' => 'La foto de perfil es requerida',
        ];

        $this->validate($request, $campos, $mensaje);
        //
        $datoCategoria = request()->except('_token');

        if ($request->hasFile('foto_perfil')) {
            $datoCategoria['foto_perfil'] = $request->file('foto_perfil')->store('uploads', 'public');
        }
        tccategoria::insert($datoCategoria);

        return redirect('categoria')->with('mensaje', 'Categoría agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tccategoria  $tccategoria
     * @return \Illuminate\Http\Response
     */
    public function show(tccategoria $tccategoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tccategoria  $tccategoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $categoria = tccategoria::findOrFail($id);

        return view('categoria.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tccategoria  $tccategoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {

        $campos = [
            'categorias' => 'required|string|max:50',
            'descripcion' => 'required|string|max:1500',
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido ',

        ];

        $this->validate($request, $campos, $mensaje);

        $datoCategoria = request()->except(['_token', '_method']);

        if ($request->hasFile('foto_perfil')) {
            $categoria = tccategoria::findOrFail($id);
            Storage::delete('public/' . $categoria->foto_perfil);
            $datoCategoria['foto_perfil'] = $request->file('foto_perfil')->store('uploads', 'public');
        }

        tccategoria::where('id', '=', $id)->update($datoCategoria);

        $categoria = tccategoria::findOrFail($id);
        // return view('categoria.edit', compact('categoria'));
        return redirect('categoria')->with('mensaje', 'La categoria se edito con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tccategoria  $tccategoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = tccategoria::findOrFail($id);
        if (Storage::delete('public/' . $categoria->foto_perfil)) {
            tccategoria::destroy($id);
        }
        //
        tccategoria::destroy($id);
        return redirect('categoria')->with('mensaje', 'La categoria se borro con éxito');
    }
}
