<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumno_id');
            $table->unsignedBigInteger('sucursal_id');
            $table->unsignedBigInteger('grado_id');
            $table->unsignedBigInteger('curso1_id');
            $table->integer('nota1');
            $table->unsignedBigInteger('curso2_id');
            $table->integer('nota2');


            $table->timestamps();

            $table->foreign('sucursal_id')->references('id')->on('sucursals');
            $table->foreign('grado_id')->references('id')->on('grados');
            $table->foreign('curso1_id')->references('id')->on('cursos');
            $table->foreign('curso2_id')->references('id')->on('cursos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas');
    }
}
