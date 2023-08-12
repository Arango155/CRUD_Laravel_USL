<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatedraticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catedraticos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 10);
            $table->string('apellido', 10);
            $table->string('telefono', 10);
            $table->string('email', 30);
            $table->string('direccion', 30);


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
        Schema::dropIfExists('catedraticos');
    }
}
