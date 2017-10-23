<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencias', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('client_id')->unsigned();
          $table->foreign('client_id')->references('id')->on('clients');
          $table->datetime('fecha');
          $table->integer('cantObjetos');
          $table->text('descripcion');
          $table->text('motivo');
          $table->text('tipo');
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
        //Schema::table('incidencia', function (Blueprint $table) {
        Schema::dropIfExists('incidencia');
    }
}
