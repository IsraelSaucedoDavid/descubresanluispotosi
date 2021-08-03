<?php

namespace App\Http\Controllers;

use App\Evento;
use App\FileEvento;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class FileEventoController extends Controller
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

        $evento = Evento::all();
        $files = FileEvento::where('id_evento', $request->id_evento)->get();
        return view('filesevento.index', compact('files', 'evento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('filesevento.create');
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

        $id_evento = $request->id_evento;

        $url = Storage::url($imagenes);

        /* $nombre = Str::random(5) . $request->file('file')->getClientOriginalName();

        $ruta = storage_path() . '\app\public\imagenes/' . $nombre;

        Image::make($request->file('file'))
            ->resize(1080, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save($ruta);

        FileEvento::create([
            // 'id_empresa' => $id_empresa,
            'url' => '/storage/imagenes/' . $nombre

        ]);*/

        FileEvento::insert([
            'id_evento' => $id_evento,
            'url' => $url
            //'url' => '/storage/imagenes/' . $nombre
        ]);


        return  redirect()->route('evento.index');
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
        $file = FileEvento::where('id', $file)->first();

        $url = str_replace('storage', 'public', $file->url);

        Storage::delete($url);

        $file->delete();

        return redirect()->route('evento.index');
    }
}
