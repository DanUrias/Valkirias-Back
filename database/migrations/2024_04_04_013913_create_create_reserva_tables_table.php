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
        Schema::create('create_reserva_tables', function (Blueprint $table) {
            $table->id();
            $table->string('nombres',90);
            $table->foreignId('id_usuario')-> references ('id')-> on ('usuario');
            $table->foreignId('id_hotel')-> references ('id')-> on ('hotel');
            $table->foreignId('factura')-> references ('N°_factura')-> on ('factura');
            $table->date('fecha_reserva');
            $table->datetime('check in');
            $table->datetime('check out');
            $table->string('estadoReserva');

            
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
        Schema::dropIfExists('create_reserva_tables');
    }
};
