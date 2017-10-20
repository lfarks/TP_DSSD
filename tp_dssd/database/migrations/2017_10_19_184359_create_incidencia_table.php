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
        Schema::create('incidencia', function (Blueprint $table) {
          $table->increments('id');
          $table->string('numCli');
          $table->datetime('fecha');
          $table->integer('cantObjetos');
          $table->text('descripcion');
          $table->text('motivo');
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
