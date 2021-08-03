<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zonas', function (Blueprint $table) {
            $table->id();

            //Relacion con la tabla de Secciones
            $table->unsignedBigInteger('id_seccion');
            $table->foreign('id_seccion')->references('id')->on('seccions')->onDelete('cascade');

            $table->string('zona', '200');
            $table->string('descripcion', '1500');
            $table->string('foto_perfil');

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
        Schema::dropIfExists('zonas');
    }
}
