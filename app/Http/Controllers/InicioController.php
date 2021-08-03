<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Establecimientos;
use App\Evento;
use App\File;
use App\Tcsubcategoria;
use App\Tccategoria;
use App\Institucion;
use App\Municipios;
use App\Paquete;
use App\seccion;
use App\zona;
use App\config;

class InicioController extends Controller
{
    //
    public function  __invoke()
    {
        $files = File::all();
        $eventos =  Evento::all();
        $municipios = Municipios::all();
        $institucion = Institucion::all();
        $subcategoria = tcsubcategoria::all();
        $categorias = tccategoria::all();
        $empresas = Empresa::all();
        $seccion = seccion::all();
        $zonas = zona::all();
        $paquetes = Paquete::all();
        $establecimientos = Establecimientos::all();
        $config = config::all();
        return view('index', compact('files', 'categorias', 'subcategoria', 'institucion', 'empresas', 'seccion', 'zonas', 'municipios', 'eventos', 'paquetes', 'establecimientos', 'config'));
    }
}
