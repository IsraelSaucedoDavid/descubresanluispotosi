<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

use PhpParser\Node\Expr\Empty_;

class FileController extends Controller
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
        $files = File::where('id_user', auth()->user()->id)->paginate(10);
        return view('files.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*Validacion de las imagenes
        $request->validate([
            'file' => 'required|image',

        ]);

        $imagenes =  $request->file('file')->store('public/galeria');
        $url = Storage::url($imagenes);

        File::create([
            'url' => $url
        ]);*/

        //Validacion de las imagenes
        $request->validate([
            'file' => 'required|image',

        ]);

        $nombre = Str::random(5) . $request->file('file')->getClientOriginalName();

        $ruta = storage_path() . '\app\public\galeria/' . $nombre;

        Image::make($request->file('file'))
            ->resize(1080, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save($ruta);

        File::create([
            'id_user' => auth()->user()->id,
            'url' => '/storage/galeria/' . $nombre
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
        $url = str_replace('storage', 'public', $file->url);
        Storage::delete($url);

        $file->delete();
        return redirect()->route('files.index')->with('eliminar', $file);
    }
}
