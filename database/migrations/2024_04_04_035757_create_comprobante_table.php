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
        Schema::create('comprobante', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')-> references ('id')-> on ('usuarios');
            $table->foreignId('metodo_id')-> references ('id')-> on ('metodo_pago');
            $table->foreignId('num_factura')-> references ('id')-> on ('facturas');
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
