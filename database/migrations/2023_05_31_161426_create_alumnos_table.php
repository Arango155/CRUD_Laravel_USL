<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->unsignedBigInteger('sucursal_id');
            $table->unsignedBigInteger('grado_id');
            $table->unsignedBigInteger('curso1_id');
            $table->unsignedBigInteger('curso2_id');




            $table->date('fecha_registro');
            //$table->string('sucursal', 50);

            $table->timestamps();

            $table->foreign('grado_id')->references('id')->on('grados');
            $table->foreign('curso1_id')->references('id')->on('cursos');
            $table->foreign('curso2_id')->references('id')->on('cursos');
            $table->foreign('sucursal_id')->references('id')->on('sucursals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
