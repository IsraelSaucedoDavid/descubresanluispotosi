<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Institucion;
use App\tccategoria;
use App\tcsubcategoria;
use App\Empresa;
use App\User;
use App\seccion;
use App\zona;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $institucion = Institucion::paginate('5');
        $subcategoria = tcsubcategoria::paginate('5');
        $categoria = tccategoria::paginate('5');
        $empresa = Empresa::paginate('5');
        $users = User::paginate('5');
        $seccion = seccion::paginate('5');
        $zona = zona::paginate('5');
        return view('home', compact('categoria', 'subcategoria', 'institucion', 'empresa', 'users', 'seccion', 'zona'));
    }
}
