<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Establecimientos;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use App\FileEstablecimiento;
use Illuminate\Http\Request;


class FileEstablecimientoController extends Controller
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
    public function index(Request $request)
    {
        $empresas = Empresa::all();
        $esta = Establecimientos::all();
        // $esta = Establecimientos::where('id_establecimiento', $request->id_empresa)->get();
        $files = FileEstablecimiento::where('id_establecimiento', $request->id_establecimiento)->get();
        return view('filesestablecimiento.index', compact('files', 'esta', 'empresas'));
        //return $request;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('filesestablecimiento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Validacion de las imagenes
        $request->validate([
            'file' => 'required|image',
        ]);

        $imagenes = $request->file('file')->store('public/imagenes');

        $id_establecimiento = $request->id_establecimiento;

        $url = Storage::url($imagenes);

        //exclusion de la llave _token
        //$datosEsta = request()->except('_token');

        /*$nombre = Str::random(5) . $request->file('file')->getClientOriginalName();

        $ruta = storage_path() . '\app\public\imagenes/' . $nombre;

        Image::make($request->file('file'))
            ->resize(1080, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save($ruta);*/


        //FileEstablecimiento::insert($datosEsta);

        FileEstablecimiento::insert([
            'id_establecimiento' => $id_establecimiento,
            'url' => $url
            //'url' => '/storage/imagenes/' . $nombre
        ]);

        //return $request;
        return  redirect()->route('establecimientos.index');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($file)
    {
        $file = FileEstablecimiento::where('id', $file)->first();

        $url = str_replace('storage', 'public', $file->url);

        Storage::delete($url);

        $file->delete();

        return redirect()->route('establecimientos.index');
    }
}
