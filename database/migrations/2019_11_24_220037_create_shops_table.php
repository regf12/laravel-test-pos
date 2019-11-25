<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');

            $table->string('comercio', 128)->unique();
            $table->string('cliente', 128);

            $table->string('correo', 128);
            $table->string('telefono', 128);

            $table->string('pais', 128);
            $table->string('estado', 128);
            $table->string('ciudad', 128);
            $table->string('direccion', 128);

            $table->string('social', 128)->nullable();

            $table->boolean('active')->default(true);

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
        Schema::dropIfExists('shops');
    }
}
