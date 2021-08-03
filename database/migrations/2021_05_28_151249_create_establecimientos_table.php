<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstablecimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establecimientos', function (Blueprint $table) {
            $table->id();
            $table->string('nom_esta', 250);
            $table->string('tag', 10);
            $table->string('descripcion', 1500);

            //Relacion con la tabla de subcategoria 
            $table->unsignedBigInteger('id_subcategoria');
            $table->foreign('id_subcategoria')->references('id')->on('tcsubcategorias')->onDelete('cascade');

            //Relacion con la tabla de Usuarios
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->string('direccion', 1500);

            //Relación con la tabla de municipios
            $table->unsignedBigInteger('id_municipio');
            $table->foreign('id_municipio')->references('id')->on('municipios')->onDelete('cascade');

            //Relacion con la tabla de Novedades
            $table->unsignedBigInteger('id_novedad');
            $table->foreign('id_novedad')->references('id')->on('novedads')->onDelete('cascade');

            //Relacion zonas con establecimientos
            $table->unsignedBigInteger('id_zona');
            $table->foreign('id_zona')->references('id')->on('zonas')->onDelete('cascade');


            $table->string('horario', 200)->nullable();
            $table->string('rango_precios', 250)->nullable();
            $table->string('telefono', 10)->nullable();
            $table->string('face', 1500)->nullable();
            $table->string('insta', 1500)->nullable();
            $table->string('sitio', 1500)->nullable();
            $table->string('estrellas', 1)->nullable();
            $table->string('tipo_comida', 250)->nullable();
            $table->string('pago_tarjeta', 250)->nullable();
            $table->string('estacionamiento', 2)->nullable();
            $table->string('ser_dom', 50)->nullable();
            $table->string('foto_perfil', 1500);
            $table->string('foto_portada', 1500);
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
        Schema::dropIfExists('establecimientos');
    }
}
