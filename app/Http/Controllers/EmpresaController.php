<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Institucion;
use App\Municipios;
use App\tccategoria;
use App\tcsubcategoria;
use App\User;
use App\novedad;
use App\zona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Symfony\Contracts\Service\Attribute\Required;









class EmpresaController extends Controller
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
        //Se manda la informacion obtenida de la base de datos a la pagina principal de iniico de sesion de adminustrador
        //Es un buscador que compara el nombre que se desea buscar con los existentes, no importa si es con mayuscula o no


        $nombre = $request->get('buscador');
        $empresas = DB::table('empresas')->where('nom_empresa', 'like', "%$nombre%")->orderBy('id', 'DESC')->paginate(10);

        //dd($datos);
        return view('empresa.index', compact('empresas'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Mandamos toda la informacion requerida de los modelos para poder consultarlos y utilizarlos
        $empresa = Empresa::all();
        $instituciones = Institucion::all();
        $municipios = Municipios::all();
        $subcategorias = tcsubcategoria::all();
        $categorias = tccategoria::all();
        $usuarios = User::all();
        $novedad = novedad::all();
        $zonas = zona::all();
        return view('empresa.create', compact('instituciones', 'municipios', 'subcategorias', 'categorias', 'usuarios', 'empresa', 'novedad', 'zonas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Apartado de validacion de los campos al momento de crear una empresa
        $campos = [
            'nom_empresa' => 'required|string|max:150',
            //'direccion' => 'required|string|max:300',
            //'telefono' => 'required|string|max:10',
            'foto_perfil' => 'required|max:10000|mimes:jpeg,png,jpg',
            'foto_portada' => 'required|max:10000|mimes:jpeg,png,jpg'
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido ',
            'foto_perfil.required' => 'La foto de perfil es requerida',
            'foto_portada.required' => 'La foto de portada es requerida'
        ];

        $this->validate($request, $campos, $mensaje);

        //exclusion de la llave _token
        $datosEmpresa = request()->except('_token');

        //Apartado de validacion de fotos tanto de perfil como de portada
        if ($request->hasFile('foto_perfil')) {
            $datosEmpresa['foto_perfil'] = $request->file('foto_perfil')->store('uploads', 'public');
        }

        if ($request->hasFile('foto_portada')) {
            $datosEmpresa['foto_portada'] = $request->file('foto_portada')->store('uploads', 'public');
        }

        //return ($datosEmpresa);
        //Mandamos toda la informacion por medio del modelo usando una funcion propia de Laravel
        Empresa::insert($datosEmpresa);
        //return response()->json($datosEmpresa);
        return redirect('empresa')->with('mensaje', 'Empresa agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Se busca la empresa a editar por medio del id
        $empresa = Empresa::findOrFail($id);

        //De igual manera aqui se mandan la informacion de los modelos para poder ser consultados al momento de editarlos
        $instituciones = Institucion::all();
        $municipios = Municipios::all();
        $subcategorias = tcsubcategoria::all();
        $categorias = tccategoria::all();
        $usuarios = User::all();
        $novedad = novedad::all();
        $zonas = zona::all();
        return view('empresa.edit', compact('instituciones', 'municipios', 'subcategorias', 'categorias', 'usuarios', 'empresa', 'novedad', 'zonas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        //Apartado de validacion de los campos al momento de editar una empresa
        $campos = [
            'nom_empresa' => 'required|string|max:150',
            //'direccion' => 'required|string|max:300',
            //'telefono' => 'required|string|max:10',
            'tag' => 'required|string',
            'foto_perfil' => '|mimes:jpeg,png,jpg',
            'foto_portada' => 'mimes:jpeg,png,jpg'
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido ',
        ];

        /*En esta seccion igualmente se hace una validacion para las fotos, 
        //pero en esta ocacion no es obligatorio el cargar otra imagen,
        // solo es cuestion de que si esta vacio o no la selección de la misma
        if ($request->hasFile('foto_perfil')) {
            $campos = ['foto_perfil' => 'required|max:1000|mimes:jpeg,png,jpg'];
            $mensaje = ['foto_perfil.required' => 'La foto de perfil es requerida'];
        }

        if ($request->hasFile('foto_portada')) {
            $campos = ['foto_portada' => 'required|max:1000|mimes:jpeg,png,jpg'];
            $mensaje = ['foto_portada.required' => 'La foto de portada es requerida'];
        }*/


        $this->validate($request, $campos, $mensaje);

        //Igualmente ignoramos el _token y el metodo, 
        //est esta ocacion por la utilizacion del nuevo metodo que utilizamos para actualizar la informacion 
        //Para poder saber que metodo es necesario para cada funcion de aqui se tiene que aplicar el comando de (php artisan r:l "route:list")
        $datosEmpresa = request()->except('_token', '_method');

        if ($request->hasFile('foto_perfil')) {
            $empresa = Empresa::findOrFail($id);
            Storage::delete('public/' . $empresa->foto_perfil);
            $datosEmpresa['foto_perfil'] = $request->file('foto_perfil')->store('uploads', 'public');
        }

        if ($request->hasFile('foto_portada')) {
            $empresa = Empresa::findOrFail($id);
            Storage::delete('public/' . $empresa->foto_portada);
            $datosEmpresa['foto_portada'] = $request->file('foto_portada')->store('uploads', 'public');
        }

        Empresa::where('id', '=', $id)->update($datosEmpresa);

        $empresa = Empresa::findOrFail($id);
        $instituciones = Institucion::all();
        $municipios = Municipios::all();
        $subcategorias = tcsubcategoria::all();
        $categorias = tccategoria::all();
        $usuarios = User::all();
        $novedad = novedad::all();
        $zonas = zona::all();
        //return view('empresa.edit', compact('instituciones', 'municipios', 'subcategorias', 'categorias', 'usuarios', 'empresa'));
        return redirect('empresa')->with('mensaje', 'Empresa editada con éxito', 'instituciones', 'municipios', 'subcategorias', 'categorias', 'usuarios', 'empresa', 'novedad', 'zonas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Simplemente de la misma forma que recuperamos el id para actualizar, se usa para destruir o eliminar, por medio el id

        //Estan funciones sirven para poder eliminar los archivos argados a la carpeta de storage/public/uploads
        $empresa = Empresa::findOrFail($id);
        if (Storage::delete('public/' . $empresa->foto_perfil)) {
            Empresa::destroy($id);
        }

        if (Storage::delete('public/' . $empresa->foto_portada)) {
            Empresa::destroy($id);
        }

        return redirect('empresa')->with('mensaje', 'Empresa borrada con éxito');
    }
}
