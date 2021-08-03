<?php

namespace App\Http\Controllers;

use App\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use App\FileEmpresa;
use Illuminate\Support\Facades\DB;

class FileEmpresaController extends Controller
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
        //$empresas = Empresa::all();

        $empresas = DB::table('empresas')
            ->orderBy('id', 'DESC')
            ->get();

        $files = FileEmpresa::where('id_empresa', $request->id_empresa)->get();

        return view('filesempresa.index', compact('files', 'empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('filesempresa.create');
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
        $id_empresa = $request->id_empresa;

        $url = Storage::url($imagenes);

        /*$nombre = Str::random(5) . $request->file('file')->getClientOriginalName();

        $ruta = storage_path() . '\app\public\imagenes/' . $nombre;

        Image::make($request->file('file'))
            ->resize(1080, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save($ruta);*/

        FileEmpresa::insert([
            'id_empresa' => $id_empresa,
            'url' => $url
            //'url' => '/storage/imagenes/' . $nombre
        ]);

        return  redirect()->route('filesempresa.index');
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
        $file = FileEmpresa::where('id', $file)->first();

        $url = str_replace('storage', 'public', $file->url);

        Storage::delete($url);

        $file->delete();

        return redirect()->route('filesempresa.index');
    }
}
