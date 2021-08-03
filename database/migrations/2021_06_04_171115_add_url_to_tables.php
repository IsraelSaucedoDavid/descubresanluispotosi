<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUrlToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empresas', function (Blueprint $table) {
            $table->string('url', 150)->nullable();
        });

        Schema::table('eventos', function (Blueprint $table) {
            $table->string('url', 150)->nullable();
        });

        Schema::table('paquetes', function (Blueprint $table) {
            $table->string('url', 150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empresas', function (Blueprint $table) {
            $table->dropColumn('url');
        });

        Schema::table('eventos', function (Blueprint $table) {
            $table->dropColumn('url');
        });

        Schema::table('paquetes', function (Blueprint $table) {
            $table->dropColumn('url');
        });
    }
}
