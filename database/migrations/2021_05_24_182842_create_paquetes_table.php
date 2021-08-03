<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaquetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquetes', function (Blueprint $table) {
            $table->id();

            $table->string("paquetes", 255);

            $table->string("descripcion", 1500);

            $table->string('destino', 150)->nullable();

            $table->string("tag", 10)->nullable();

            $table->string("direccion", 1500)->nullable();

            $table->string("telefono", 10)->nullable();

            $table->string("sitio", 1500)->nullable();

            $table->string("duracion", 150)->nullable();

            $table->string("precio", 150)->nullable();

            $table->string("pago_tarjeta", 2)->nullable();

            $table->string('foto_perfil', 1500);

            $table->string('hotel', 1000)->nullable();

            $table->string('estrallas_hotel', 2)->nullable();

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
        Schema::dropIfExists('paquetes');
    }
}
