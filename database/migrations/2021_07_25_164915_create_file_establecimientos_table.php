<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileEstablecimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_establecimientos', function (Blueprint $table) {
            $table->id();

            //Relacion entre usuario y galeria 
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');

            //Relacion zonas con empresas
            $table->unsignedBigInteger('id_establecimiento');
            $table->foreign('id_establecimiento')->references('id')->on('establecimientos');

            $table->string('url', '500');

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
        Schema::dropIfExists('file_establecimientos');
    }
}
