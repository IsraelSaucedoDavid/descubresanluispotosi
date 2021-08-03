<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

//Ruta para el administrador home
Route::get('/home', 'HomeController@index')->name('home');

//Ruta para el administrador configuracion
Route::get('/conf', 'catController@ViewConf')->name('conf');

//Ruta para el vista de categoria (nivel usuario) 
Route::get('/categorias', 'catController@index');

//Ruta para la pagina de inicio
Route::get('/', 'InicioController');

//Ruta para la pagina de pueblos magivos (no admin)
Route::get('sec', 'catController@ViewSecciones');

//Ruta para la pagina de pueblo magico en especifico  (no admin)
Route::get('zon', 'catController@ViewZonas');

//Ruta para la pagina de empresa en especifico  (no admin)
Route::get('descripcion_empresa', 'catController@ViewDesEmpresa');




/***************************Vamos a hacer la prueba de los selects dependientes para el inicio */


//Ruta para la pagina de empresa en especifico  (no admin)
Route::get('establecimientosi', 'catController@ViewDesEstablecimientos');




Route::post('/subcategorias',          [App\Http\Controllers\catController::class, 'subcategorias']);

Route::post('/empresas',          [App\Http\Controllers\catController::class, 'empresas']);




//Ruta para las vistas de las seciones, zonas, y descripciones 
Route::post('/galeria', 'catController@upImg');

//Ruta para las vistas de las seciones, zonas, y descripciones 
Route::get('/info_eventos', 'catController@ViewEventos');

//Ruta para las vistas de las seciones, zonas, y descripciones 
Route::get('/descripcion_evento', 'catController@ViewEvento');

//Ruta para las vistas de las seciones, zonas, y descripciones 
Route::get('/paquetes', 'catController@ViewPaquetes')->name('paquetes');

//Ruta para las vistas de las seciones, zonas, y descripciones 
Route::get('/paq', 'catController@ViewPaquete');

//Imprimir pdf de paquete
Route::get('/pdf', 'catController@PDF')->name('descargarPDF');

//Ruta para el ver establecimientos nivel usuario
Route::get('/ver', 'catController@ViewEsta');

//Ruta para la convercion de pdf
Route::get('/imprimir-pdf', 'catController@imprimir')->name('imprimir');

/*Rutas para hacer crud de cada una de las secicones del administrador */
//Ruta para entrar a todas las clases del controlador de Files (fotos)
Route::resource('files', FileController::class);

//Ruta para entrar a todas las clases del controlador de Files (fotos)
Route::resource('filesempresa', FileEmpresaController::class);

//Ruta para entrar a todas las clases del controlador de Files (fotos)
Route::resource('filesestablecimiento', FileEstablecimientoController::class);

//Ruta para entrar a todas las clases del controlador de Files (fotos)
Route::resource('filesevento', FileEventoController::class);

//Ruta para entrar a todas las clases del controlador de empresas
Route::resource('empresa', EmpresaController::class);

//Ruta para los establecimientos
Route::resource('establecimientos', EstablecimientosController::class);

//Ruta para los eventos
Route::resource('evento', EventoController::class);

//Ruta para los paquetes
Route::resource('paquete', PaqueteController::class);

//Ruta para entrar a todas las clases del controlador Categoria
Route::resource('categoria', TccategoriaController::class);

//Ruta para entrar a todas las clases del controlador subcategoria
Route::resource('subcategoria', TcsubcategoriaController::class);

//Ruta para entrar a todas las clases del controlador Instituciones
Route::resource('institucion',  InstitucionController::class);

//Ruta para entrar a todas las clases del controlador Zonas
Route::resource('zona', ZonaController::class);

//Ruta para entrar a todas las clases del controlador Seccion
Route::resource('seccion', SeccionController::class);

//Ruta para entrar a todas las clases del controlador Configuracion
Route::resource('conf', ConfigController::class);

//Ruta para entrar a toda slas clases del controlador de Tags
Route::resource('tags', TagsController::class);
