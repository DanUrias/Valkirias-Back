<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('municipio_id')->references('id')->on('municipio');
            $table->foreignId('habitaciones_id')->references('id')->on('habitaciones');
            $table->foreignId('foto_id')->references('id')->on('foto');
            $table->string('nombre',255);
            $table->string('contacto',255);
            $table->string('email',255);
            $table->text('contraseña');
            $table->string('whatsApp',255);
            $table->string('direccion',255);
            $table->string('encargado',255);
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
        Schema::dropIfExists('hotel');
    }
};
