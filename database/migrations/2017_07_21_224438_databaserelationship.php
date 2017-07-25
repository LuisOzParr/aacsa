<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Databaserelationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->foreign('rol_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('restrict');
        });
        Schema::table('clientes', function(Blueprint $table) {
            $table->foreign('usuario_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
        });
        Schema::table('ranchos', function(Blueprint $table) {
            $table->foreign('cliente_id')->references('id')->on('clientes')->onUpdate('cascade')->onDelete('restrict');
        });
        Schema::table('productos', function(Blueprint $table) {
            $table->foreign('modelo_id')->references('id')->on('modelos')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('usuario_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('rancho_id')->references('id')->on('ranchos')->onUpdate('cascade')->onDelete('restrict');
        });
        Schema::table('tipos_productos', function(Blueprint $table) {
            $table->foreign('modelo_id')->references('id')->on('modelos')->onUpdate('cascade')->onDelete('restrict');
        });
        Schema::table('caracteristicas_productos', function(Blueprint $table) {
            $table->foreign('caracteristica_id')->references('id')->on('caracteristicas')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('tipo_producto_id')->references('id')->on('tipos_productos')->onUpdate('cascade')->onDelete('restrict');
        });
        Schema::table('caracteristicas', function(Blueprint $table) {
            $table->foreign('unidad_id')->references('id')->on('unidades')->onUpdate('cascade')->onDelete('restrict');
        });
        Schema::table('modelos', function(Blueprint $table) {
            $table->foreign('marca_id')->references('id')->on('marcas')->onUpdate('cascade')->onDelete('restrict');
        });
        Schema::table('servicios', function(Blueprint $table) {
            $table->foreign('producto_id')->references('id')->on('productos')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('usuario_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
        });
        Schema::table('servicios_checks', function(Blueprint $table) {
            $table->foreign('servicio_id')->references('id')->on('servicios')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('producto_id')->references('id')->on('productos')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('check_id')->references('id')->on('checks')->onUpdate('cascade')->onDelete('restrict');
        });
        Schema::table('servicios_piezas', function(Blueprint $table) {
            $table->foreign('servicio_id')->references('id')->on('servicios')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('pieza_id')->references('id')->on('piezas')->onUpdate('cascade')->onDelete('restrict');
        });
        Schema::table('piezas_modelos', function(Blueprint $table) {
            $table->foreign('pieza_id')->references('id')->on('piezas')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('modelo_id')->references('id')->on('modelos')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropForeign(['rol_id']);
        });
        Schema::table('clientes', function(Blueprint $table) {
            $table->dropForeign(['usuario_id']);
        });
        Schema::table('ranchos', function(Blueprint $table) {
            $table->dropForeign(['cliente_id']);
        });
        Schema::table('productos', function(Blueprint $table) {
            $table->dropForeign(['modelo_id']);
            $table->dropForeign(['usuario_id']);
            $table->dropForeign(['rancho_id']);
        });
        Schema::table('tipos_productos', function(Blueprint $table) {
            $table->dropForeign(['modelo_id']);
        });
        Schema::table('caracteristicas_productos', function(Blueprint $table) {
            $table->dropForeign(['caracteristica_id']);
            $table->dropForeign(['tipo_producto_id']);
        });
        Schema::table('caracteristicas', function(Blueprint $table) {
            $table->dropForeign(['unidad_id']);
        });
        Schema::table('modelos', function(Blueprint $table) {
            $table->dropForeign(['marca_id']);
        });
        Schema::table('servicios', function(Blueprint $table) {
            $table->dropForeign(['producto_id']);
            $table->dropForeign(['usuario_id']);
        });
        Schema::table('servicios_checks', function(Blueprint $table) {
            $table->dropForeign(['servicio_id']);
            $table->dropForeign(['producto_id']);
            $table->dropForeign(['check_id']);
        });
        Schema::table('servicios_piezas', function(Blueprint $table) {
            $table->dropForeign(['servicio_id']);
            $table->dropForeign(['pieza_id']);
        });
        Schema::table('piezas_modelos', function(Blueprint $table) {
            $table->dropForeign(['pieza_id']);
            $table->dropForeign(['modelo_id']);
        });    
    }
}
