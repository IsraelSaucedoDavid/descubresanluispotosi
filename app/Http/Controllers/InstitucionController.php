<?php

namespace App\Http\Controllers;

use App\Institucion;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class InstitucionController extends Controller
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
        $institucion['institucion'] = Institucion::paginate(30);
        return view('institucion.index', $institucion);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('institucion.create');
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
            'institucion' => 'required|string|max:50',
            'descripcion' => 'required|string|max:1500',
            'foto_perfil' => 'required|max:10000|mimes:jpeg,png,jpg'
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido ',
            'foto_perfil.required' => 'La foto de perfil es requerida',
        ];

        $this->validate($request, $campos, $mensaje);


        //Exclusion de token 
        $datoInstitucion = request()->except('_token');

        if ($request->hasFile('foto_perfil')) {
            $datoInstitucion['foto_perfil'] = $request->file('foto_perfil')->store('uploads', 'public');
        }

        Institucion::insert($datoInstitucion);
        //return response()->json($datoCategoria);
        //dd($datoInstitucion);
        return redirect('institucion')->with('mensaje', 'Institucion agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $institucion = Institucion::findOrFail($id);

        return view('institucion.edit', compact('institucion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $campos = [
            'institucion' => 'required|string|max:50',
            'descripcion' => 'required|string|max:1500',
        ];

        $mensaje = [
            'required' => ':attribute es requerido ',
        ];

        $this->validate($request, $campos, $mensaje);

        $datoInstitucion = request()->except(['_token', '_method']);
        //
        if ($request->hasFile('foto_perfil')) {
            $institucion = Institucion::findOrFail($id);
            Storage::delete('public/' . $institucion->foto_perfil);
            $datoInstitucion['foto_perfil'] = $request->file('foto_perfil')->store('uploads', 'public');
        }


        Institucion::where('id', '=', $id)->update($datoInstitucion);

        $institucion = Institucion::findOrFail($id);
        // return view('categoria.edit', compact('categoria'));
        return redirect('institucion')->with('mensaje', 'La institucion se edito con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $institucion = Institucion::findOrFail($id);
        if (Storage::delete('public/' . $institucion->foto_perfil)) {
            Institucion::destroy($id);
        }
        //
        Institucion::destroy($id);
        return redirect('institucion')->with('mensaje', 'La institucion se borro con éxito');
    }
}
