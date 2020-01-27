<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesPontosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes_pontos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_ponto');
            $table->foreign('id_ponto')
                ->references('id')->on('pontos')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->unsignedBigInteger('id_cliente');
            $table->foreign('id_cliente')
                ->references('id')->on('admin_users')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clientes_pontos', function (Blueprint $table) {
            $table->dropForeign('clientes_pontos_id_ponto_foreign');
            $table->dropForeign('clientes_pontos_id_cliente_foreign');
        });
        Schema::dropIfExists('clientes_pontos');
    }
}
