<?php

namespace App;

use App\seccion;

use Illuminate\Database\Eloquent\Model;

class zona extends Model
{
    public function seccion()
    {
        //primera variable 'id' es relacionado con el modelo de Categoria
        //Segunda variable 'id_categoria' es relacionado con el modelo de Empresa
        return $this->hasOne(seccion::class, 'id', 'id_seccion');
    }
}
