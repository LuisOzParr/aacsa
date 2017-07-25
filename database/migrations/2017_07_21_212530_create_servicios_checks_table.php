<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiciosChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios_checks', function (Blueprint $table) {
            $table->unsignedInteger('servicio_id');
            $table->unsignedInteger('producto_id');
            $table->unsignedInteger('check_id');
            $table->integer('estado');
            $table->string('comentario');
            $table->text('observacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicios_checks');
    }
}
