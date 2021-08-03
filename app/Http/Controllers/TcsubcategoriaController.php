<?php

namespace App\Http\Controllers;

use App\Tccategoria;
use App\tcsubcategoria;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class TcsubcategoriaController extends Controller
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
        $categorias = Tccategoria::all();
        $subcategorias = tcsubcategoria::paginate(5);
        return view('subcategoria.index', compact('categorias', 'subcategorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorias = Tccategoria::all();
        return view('subcategoria.create', compact('categorias'));
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
            'subcategoria' => 'required|string|max:50',
            'descripcion' => 'required|string|max:1500',
            'foto_perfil' => 'required|max:10000|mimes:jpg,jpeg,png',
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido ',
            'foto_perfil.required' => 'La foto de perfil es requerida',
        ];

        $this->validate($request, $campos, $mensaje);
        //
        $datoSubcategoria = request()->except('_token');

        if ($request->hasFile('foto_perfil')) {
            $datoSubcategoria['foto_perfil'] = $request->file('foto_perfil')->store('uploads', 'public');
        }

        tcsubcategoria::insert($datoSubcategoria);

        return redirect('subcategoria')->with('mensaje', 'Subcategoría agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tcsubcategoria  $tcsubcategoria
     * @return \Illuminate\Http\Response
     */
    public function show(tcsubcategoria $tcsubcategoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tcsubcategoria  $tcsubcategoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $subcategoria = tcsubcategoria::findOrFail($id);
        $categorias = Tccategoria::all();

        return view('subcategoria.edit', compact('subcategoria', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tcsubcategoria  $tcsubcategoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $campos = [
            'subcategoria' => 'required|string|max:50',
            'descripcion' => 'required|string|max:1500',
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido ',
        ];

        $this->validate($request, $campos, $mensaje);

        $datoSubcategoria = request()->except(['_token', '_method']);

        if ($request->hasFile('foto_perfil')) {
            $subcategoria = tcsubcategoria::findOrFail($id);
            Storage::delete('public/' . $subcategoria->foto_perfil);
            $datoSubcategoria['foto_perfil'] = $request->file('foto_perfil')->store('uploads', 'public');
        }

        tcsubcategoria::where('id', '=', $id)->update($datoSubcategoria);

        $subcategoria = tcsubcategoria::findOrFail($id);
        // return view('categoria.edit', compact('categoria'));
        return redirect('subcategoria')->with('mensaje', 'La categoria se edito con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tcsubcategoria  $tcsubcategoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategoria = tcsubcategoria::findOrFail($id);
        if (Storage::delete('public/' . $subcategoria->foto_perfil)) {
            tcsubcategoria::destroy($id);
        }
        //
        tcsubcategoria::destroy($id);
        return redirect('subcategoria')->with('mensaje', 'La categoria se borro con éxito');
    }
}
