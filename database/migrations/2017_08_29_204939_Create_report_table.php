<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_suplente');
            $table->string('puesto');
            $table->string('servicio');
            $table->string('unidad');
            $table->string('fecha_inicio');
            $table->string('fecha_final');
            $table->integer('qna');
            $table->integer('num_empleado_trabajador');
            $table->string('cod_incidencia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reports');
    }
}
