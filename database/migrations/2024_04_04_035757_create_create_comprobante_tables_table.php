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
        Schema::create('create_comprobante_tables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')-> references ('id')-> on ('usuario');
            $table->foreignId('metodo_pago')-> references ('id')-> on ('metodoPago');
            $table->string('tipo_comprobante',50);
            $table->string('estado',20);
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
        Schema::dropIfExists('create_comprobante_tables');
    }
};
