<?php

namespace App\Http\Controllers;

use App\Establecimientos;
use App\Municipios;
use App\Novedad;
use App\Tccategoria;
use App\Tcsubcategoria;
use App\User;
use App\zona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function GuzzleHttp\Promise\all;

class EstablecimientosController extends Controller
{
    //Metodo de seguridad 
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

        $categorias = Tccategoria::all();
        $subcategorias = Tcsubcategoria::all();
        $establecimientos = Establecimientos::all();
        return view('establecimientos.index', compact('establecimientos', 'subcategorias', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Tccategoria::all();
        $subcategorias = Tcsubcategoria::all();
        $establecimientos = Establecimientos::all();
        $usuarios = User::all();
        $municipios = Municipios::all();
        $novedad = Novedad::all();
        $zonas = zona::all();
        return view('establecimientos.create', compact('establecimientos', 'subcategorias', 'usuarios', 'municipios', 'novedad', 'zonas', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Apartado de validacion de los campos al momento de crear una establecimientos
        $campos = [
            'nom_esta' => 'required|string|max:250',
            'tag' => 'required|string|max:10',
            'descripcion' => 'required|string|max:1500',
            'direccion' => 'required|string|max:300',
            //'horario' => 'required|string|max:200',
            //'rango_precios' => 'required|string|max:250',
            //'telefono' => 'required|string|max:10',
            //'face' => 'required|string|max:1500',
            //'insta' => 'required|string|max:1500',
            //'sitio' => 'required|string|max:1500',
            'estacionamiento' => 'required|string|max:2',
            'ser_dom' => 'required|string|max:50',
            'foto_perfil' => 'required|max:10000|mimes:jpeg,png,jpg',
            'foto_portada' => 'required|max:10000|mimes:jpeg,png,jpg'
        ];

        $mensaje = [
            'required' => ':attribute es requerido ',
            'foto_perfil.required' => 'La foto de perfil es requerida',
            'foto_portada.required' => 'La foto de portada es requerida'
        ];

        $this->validate($request, $campos, $mensaje);

        //exclusion de la llave _token
        $datosEsta = request()->except('_token');

        //Apartado de validacion de fotos tanto de perfil como de portada
        if ($request->hasFile('foto_perfil')) {
            $datosEsta['foto_perfil'] = $request->file('foto_perfil')->store('uploads', 'public');
        }

        if ($request->hasFile('foto_portada')) {
            $datosEsta['foto_portada'] = $request->file('foto_portada')->store('uploads', 'public');
        }

        Establecimientos::insert($datosEsta);

        return redirect('establecimientos.index')->with('mensaje', 'Establecimiento agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Establecimientos  $establecimientos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Establecimientos  $establecimientos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias = Tccategoria::all();
        $establecimientos = Establecimientos::find($id);
        $subcategorias = Tcsubcategoria::all();
        $usuarios = User::all();
        $municipios = Municipios::all();
        $novedad = Novedad::all();
        $zonas = zona::all();
        return view('establecimientos.edit', compact('establecimientos', 'subcategorias', 'usuarios', 'municipios', 'novedad', 'zonas', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Establecimientos  $establecimientos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //Apartado de validacion de los campos al momento de crear una establecimientos
        $campos = [
            'nom_esta' => 'required|string|max:250',
            'tag' => 'required|string|max:10',
            'descripcion' => 'required|string|max:1500',
            'direccion' => 'required|string|max:300',
            //'horario' => 'required|string|max:200',
            //'rango_precios' => 'required|string|max:250',
            //'telefono' => 'required|string|max:10',
            //'face' => 'required|string|max:1500',
            //'insta' => 'required|string|max:1500',
            //'sitio' => 'required|string|max:1500',
            'estacionamiento' => 'required|string|max:2',
            'ser_dom' => 'required|string|max:50',

        ];

        $mensaje = [
            'required' => ':attribute es requerido '
        ];

        $this->validate($request, $campos, $mensaje);

        $datosEsta = request()->except('_token', '_method');

        if ($request->hasFile('foto_perfil')) {
            $establecimientos = Establecimientos::findOrFail($id);
            Storage::delete('public/' . $establecimientos->foto_perfil);
            $datosEsta['foto_perfil'] = $request->file('foto_perfil')->store('uploads', 'public');
        }

        if ($request->hasFile('foto_portada')) {
            $establecimientos = Establecimientos::findOrFail($id);
            Storage::delete('public/' . $establecimientos->foto_portada);
            $datosEsta['foto_portada'] = $request->file('foto_portada')->store('uploads', 'public');
        }

        Establecimientos::where('id', '=', $id)->update($datosEsta);

        $establecimientos = Establecimientos::findOrFail($id);

        $categorias = Tccategoria::all();
        $subcategorias = Tcsubcategoria::all();
        $establecimientos = Establecimientos::all();
        $usuarios = User::all();
        $municipios = Municipios::all();
        $novedad = Novedad::all();
        $zonas = zona::all();
        return view('establecimientos')->with('mensaje', 'establecimientos', 'subcategorias', 'usuarios', 'municipios', 'novedad', 'zonas', 'categorias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Establecimientos  $establecimientos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Estan funciones sirven para poder eliminar los archivos argados a la carpeta de storage/public/uploads
        $establecimientos = Establecimientos::findOrFail($id);
        if (Storage::delete('public/' . $establecimientos->foto_perfil)) {
            Establecimientos::destroy($id);
        }

        if (Storage::delete('public/' . $establecimientos->foto_portada)) {
            Establecimientos::destroy($id);
        }

        return redirect('establecimientos')->with('mensaje', 'Establecimiento borrada con éxito');
    }
}
