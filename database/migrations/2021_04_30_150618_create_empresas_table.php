<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();

            //Relacion con la tabla de categoría
            $table->unsignedBigInteger('id_categoria');
            $table->foreign('id_categoria')->references('id')->on('tccategorias')->onDelete('cascade');

            //Relacion con la tabla de subcategoria 
            $table->unsignedBigInteger('id_subcategoria');
            $table->foreign('id_subcategoria')->references('id')->on('tcsubcategorias')->onDelete('cascade');

            //Relación con la tabla de municipios
            $table->unsignedBigInteger('id_municipio');
            $table->foreign('id_municipio')->references('id')->on('municipios')->onDelete('cascade');

            //Relacion con la tabla de instituciones
            $table->unsignedBigInteger('id_institucion');
            $table->foreign('id_institucion')->references('id')->on('institucions')->onDelete('cascade');

            //Relacion con la tabla de Usuarios
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');

            //Relacion con la tabla de Novedades
            $table->unsignedBigInteger('id_novedad');
            $table->foreign('id_novedad')->references('id')->on('novedads')->onDelete('cascade');

            //Relacion zonas con empresas
            $table->unsignedBigInteger('id_zona');
            $table->foreign('id_zona')->references('id')->on('zonas')->onDelete('cascade');


            $table->string('descripcion', '1500')->nullable();
            $table->string('tag', '10');
            $table->string('direccion', '1500');
            $table->string('telefono', '10');
            $table->string('face_url', '1500')->nullable();
            $table->string('insta_url', '1500')->nullable();
            $table->string('sitio', '1500')->nullable();
            $table->string('horario', '100')->nullable();
            $table->string('pago_tarjeta', '2')->nullable();
            $table->string('estacionamiento', '2')->nullable();
            $table->string('estrellas', '2')->nullable();
            $table->string('nom_empresa', '250');
            $table->string('foto_perfil', '1000');
            $table->string('tipo_comida', '1000')->nullable();
            $table->string('ser_dom', '25')->nullable();
            $table->string('rango_precios', '50')->nullable();
            $table->string('foto_portada', '1000');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
