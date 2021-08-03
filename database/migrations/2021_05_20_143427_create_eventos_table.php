<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();

            $table->string("title", 255);
            $table->string("descripcion", 1500);
            $table->string("horario", 255)->nullable();
            $table->string("tag", 10)->nullable();
            $table->string("direccion", 1500)->nullable();
            $table->string("telefono", 10)->nullable();
            $table->string("sitio", 1500)->nullable()->nullable();
            $table->string("pago_tarjeta", 2)->nullable();
            $table->string("estacionamiento", 2)->nullable();
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('foto_perfil', 1500);

            //Relacion con la tabla de Novedades
            $table->unsignedBigInteger('id_novedad');
            $table->foreign('id_novedad')->references('id')->on('novedads')->onDelete('cascade');

            $table->string('costo', 100)->nullable();
            //Relación con la tabla de municipios
            $table->unsignedBigInteger('id_municipio');
            $table->foreign('id_municipio')->references('id')->on('municipios')->onDelete('cascade');


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
        Schema::dropIfExists('eventos');
    }
}
