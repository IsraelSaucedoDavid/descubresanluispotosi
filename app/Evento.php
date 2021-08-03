<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    //
    static $rules = [
        'title' => 'require',
        'descripcion' => 'required',
        /*'tag' => 'required',
        'direccion' => 'reuired',
        'telefono' => 'required',
        'sitio' => 'required',*/
        'start' => 'required',
        'end' => 'required',
        /*'horario' => 'required',
        'pago_tarjeta' => 'required',
        'estacionamiento' => 'required',
        'municipio' => 'required'*/
    ];

    protected $fillable = ['title', 'descripcion',/* 'tag', 'direccion', 'telefono', 'sitio',*/ 'start', 'end'/*, 'horario', 'pago_tarjeta', 'estacionamiento', 'municipio'*/];
}
