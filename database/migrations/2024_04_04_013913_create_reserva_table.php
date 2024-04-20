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
        Schema::create('reserva', function (Blueprint $table) {
            $table->id();
            $table->string('nombres',90);
            $table->foreignId('usuario_id')-> references ('id')-> on ('usuarios');
            $table->foreignId('hotel_id')-> references ('id')-> on ('hotel');
            $table->foreignId('factura_id')-> references ('id')-> on ('facturas');
            $table->date('fecha_reserva');
            $table->datetime('check in');
            $table->datetime('check out');
            $table->string('estadoReserva',250);

            
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
