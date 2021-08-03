<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Tags;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tag;

use function GuzzleHttp\Promise\all;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $empresas = Empresa::all();
        $tags = Tags::all();
        return view('tags.index', compact('tags', 'empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $empresas = Empresa::all();
        $tags = Tags::all();
        return view('tags.create', compact('tags', 'empresas'));
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
            'tags' => 'required|string|max:200',
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido ',
        ];

        $this->validate($request, $campos, $mensaje);

        //Exclusion de token 
        $datoTag = request()->except('_token');

        Tags::insert($datoTag);
        return redirect('tags')->with('mensaje', 'Seccion agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function show(Tags $tags)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tags = Tags::findOrFail($id);

        return view('tags.edit', compact('tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $campos = [
            'tags' => 'required|string|max:200',
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido ',
        ];

        $this->validate($request, $campos, $mensaje);

        //Exclusion de token 
        $datoTag = request()->except(['_token', '_method']);

        Tags::where('id', '=', $id)->update($datoTag);


        $tags = Tags::findOrFail($id);
        // return view('categoria.edit', compact('categoria'));
        return redirect('tags')->with('mensaje', 'La seccion se edito con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Tags::destroy($id);
        return redirect('tags')->with('mensaje', 'La seccion se borro con éxito');
    }
}
