<?php

namespace App;

use App\Municipios;
use App\Institucion;
use App\Tccategoria;
use App\Tcsubcategoria;
use App\User;

//use App\institucion;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    //Recuperar datos de la relación 

    public function categoria()
    {
        //primera variable 'id' es relacionado con el modelo de Categoria
        //Segunda variable 'id_categoria' es relacionado con el modelo de Empresa
        return $this->hasOne(tccategoria::class, 'id', 'id_categoria');
    }

    public function subcategoria()
    {
        //primera variable 'id' es relacionado con el modelo de subcategoria
        //Segunda variable 'id_subcategoria' es relacionado con el modelo de Empresa
        return $this->hasOne(tcsubcategoria::class, 'id', 'id_subcategoria');
    }

    public function municipio()
    {
        //primera variable 'id' es relacionado con el modelo de municipio
        //Segunda variable 'id_municipip' es relacionado con el modelo de Empresa
        return  $this->hasOne(municipios::class, 'id', 'id_municipio');
    }

    public function institucion()
    {
        //primera variable 'id' es relacionado con el modelo de institucion
        //Segunda variable 'id_institucion' es relacionado con el modelo de Empresa
        return $this->hasOne(Institucion::class, 'id', 'id_institucion');
    }

    public function user()
    {
        //primera variable 'id' es relacionado con el modelo de User
        //Segunda variable 'id_user' es relacionado con el modelo de Empresa
        return $this->hasOne(User::class, 'id', 'id_user');
    }
}
