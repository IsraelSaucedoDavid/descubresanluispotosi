<?php

namespace App\Http\Controllers;

use App\config;
use App\zona;
use App\Tccategoria;
use App\Tcsubcategoria;
use App\Empresa;
use App\Establecimientos;
use App\Evento;
use App\eventos;
use App\Municipios;
use App\Paquete;
use App\File;
use App\FileEmpresa;
use App\FileEstablecimiento;
use App\Institucion;
use App\Novedad;
use App\seccion;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;

use function GuzzleHttp\Promise\all;

class catController extends Controller
{
    //Ver pagina la vista de todas las secciones
    public function ViewSecciones(Request $request)
    {
        $titulo = "Bienvenidos";
        $paquetes = Paquete::all();
        $eventos = eventos::all();
        $empresas = Empresa::all();
        $municipio = Municipios::all();
        $id_sec = $request->id_sec;
        $files = File::all();
        $establecimientos = Establecimientos::all();
        $config = config::all();
        $zona = zona::where('id_seccion', $id_sec)->get();
        return view('vistas.secciones', compact('zona', 'files', 'paquetes', 'municipio', 'empresas', 'eventos', 'establecimientos', 'titulo', 'config'));
    }

    //Ver pagina la vista de todas las eventos
    public function ViewEventos(Request $request)
    {
        $paquetes = Paquete::all();
        $eventos = eventos::where('id_municipio', $request->id_eventos);
        $empresas = Empresa::all();
        $seccion = seccion::all();
        $files = File::all();
        $config = config::all();
        $municipios = Municipios::find($request->id_eventos);
        $establecimientos = Establecimientos::all();
        return view('vistas.eventos', compact('eventos', 'files', 'seccion', 'paquetes', 'empresas', 'establecimientos', 'config', 'municipios'));
    }

    //Ver pagina la vista de todas las evento
    public function ViewEvento(Request $id)
    {
        $paquetes = Paquete::all();
        $eventos = eventos::find($id);
        $empresas = Empresa::all();
        $evento = Evento::find($id);
        $config = config::all();

        return view('vistas.descripcionevento', compact('evento', 'eventos', 'paquetes', 'empresas', 'config'));
    }

    /*Ver en especifico la zona */
    public function ViewZonas(Request $id)
    {
        $paquetes = Paquete::all();
        $eventos = eventos::all();
        $empresas = Empresa::where('id_zona', $id->id_zona)->get();
        $establecimientos =  Establecimientos::where('id_zona', $id->id_zona)->get();
        $novedad = Novedad::all();
        $files = File::all();
        $categorias = Tccategoria::all();
        $muni = Municipios::all();
        $zona = zona::find($id);
        $config = config::all();

        return view('vistas.zonas', compact('zona', 'muni', 'categorias', 'empresas', 'files', 'novedad', 'paquetes', 'eventos', 'establecimientos', 'config'));
    }

    //Ver la vista de la descripcion de la empresa 
    public function ViewDesEmpresa(Request $id)
    {
        $filesEsta = FileEstablecimiento::where('id_establecimiento', $id->id_establecimiento)->get();
        //$filesEmpresa = FileEmpresa::all();
        $filesEmpresa = FileEmpresa::where('id_empresa', $id->id_esta)->get();
        $paquetes = Paquete::all();
        $eventos = eventos::all();
        $empresas = Empresa::all();
        $establecimientos = Establecimientos::find($id);
        $empresa = Empresa::find($id);
        $config = config::all();

        return view('vistas.descripcionempresa', compact('empresa', 'paquetes', 'eventos', 'empresas', 'establecimientos', 'config', 'filesEmpresa', 'filesEsta'));
    }



    //Prueba de selects dependientes

    //Ver la vista de la descripcion de la empresa 
    public function ViewDesEstablecimientos(Request  $id)
    {

        $categorias = Tccategoria::all();
        $municipios = Municipios::find($id->id_emp);

        $paquetes = Paquete::all();
        $eventos = eventos::all();

        $filesEmpresa = FileEmpresa::all();

        $empresas = Empresa::where('id_municipio', $id->id_emp)->get();
        $establecimientos = Establecimientos::where('id_municipio', $id->id_emp)->get();

        $config = config::all();

        return view('vistas.establecimientosi', compact('empresas', 'paquetes', 'eventos', 'empresas', 'establecimientos', 'config', 'municipios', 'categorias', 'filesEmpresa'));
    }

    public function subcategorias(Request $request)
    {
        if (isset($request->texto)) {
            $subcategorias = tcsubcategoria::whereid_categoria($request->texto)->get();
            return response()->json(
                [
                    'lista' => $subcategorias,
                    'success' => true
                ]
            );
        } else {
            return response()->json(
                [
                    'success' => false
                ]
            );
        }
    }

    public function empresas(Request $request)
    {
        if (isset($request->texto)) {
            $empresa = empresa::whereid_subcategoria($request->texto)->get();
            return response()->json(
                [
                    'lista' => $empresa,
                    'success' => true
                ]
            );
        } else {
            return response()->json(
                [
                    'success' => false
                ]
            );
        }
    }





























    //retornar datos enviados galeria
    public function upImg(Request $request)
    {
        return view('vistas.galeria');
    }

    //retornar vista de paquetes
    public function ViewPaquetes(Request $id)
    {

        $eventos = eventos::all();
        $empresas = Empresa::all();
        $files = File::all();
        $paquetes = Paquete::all();
        $establecimientos = Establecimientos::all();
        $config = config::all();
        $zonas = zona::all();

        return view('vistas.paquetes', compact('paquetes', 'files', 'eventos', 'empresas', 'establecimientos', 'config', 'zonas'));
    }

    //retornar vista de paquete
    public function ViewPaquete(Request $id)
    {
        $paquetes = Paquete::all();
        $eventos = Evento::all();
        $empresas = Empresa::all();
        $files = File::all();
        $establecimientos = Establecimientos::all();
        $config = config::all();
        $zonas = zona::all();
        $paquete = Paquete::find($id);
        return view('vistas.paquete', compact('paquete', 'files', 'empresas', 'eventos', 'paquetes', 'establecimientos', 'config', 'zonas'));
    }

    //Metodo para retornar la vista de establecimiento nivel usuario
    public function ViewEsta(Request $id)
    {
        $establecimientos = Establecimientos::find($id);
        $paquetes = Paquete::all();
        $eventos = eventos::all();
        $empresas = Empresa::find($id);
        $config = config::all();

        return view('establecimientos.ver', compact('establecimientos', 'paquetes', 'eventos', 'empresas', 'establecimientos', 'config'));
    }

    //Metodo para retornar la vista de establecimiento nivel usuario
    public function ViewEstable(Request $id)
    {
        $municipios = Municipios::all();
        $paquetes = Paquete::all();
        $eventos = eventos::all();
        $establecimientos =  Establecimientos::find($id);
        $config = config::all();

        return view('establecimientos.ver', compact('establecimientos', 'paquetes', 'eventos', 'empresas', 'establecimientos', 'config', 'municipios'));
    }

    public function ViewNav(Request $id)
    {
        $config = config::all();
        return view('vistas.nav', compact('config'));
    }


    public function ViewConfig(Request $id)
    {
        $config = config::all();
        return view('config.conf', compact('config'));
    }

    //Funcion para generar pdf con dompdf
    /* function imprimir(Request $id)
    {
        $paquetes = Paquete::all();
        $paquete = Paquete::all();
        $eventos = eventos::all();
        $empresas = Empresa::all();
        $novedad = Novedad::all();
        $files = File::all();
        $categorias = Tccategoria::all();
        $muni = Municipios::all();
        $establecimientos = Establecimientos::all();
        $zona = zona::all();
        $pdf = \PDF::loadView('vistas.pdf', compact(
            'paquete',
            'paquetes',
            'eventos',
            'empresas',
            'novedad',
            'files',
            'categorias',
            'muni',
            'establecimientos',
            'zona'
        ));
        return $pdf->stream('prueba.pdf');
    }*/
}
