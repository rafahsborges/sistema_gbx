<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesObservacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes_observacoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_observacao');
            $table->foreign('id_observacao')
                ->references('id')->on('observacoes')
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
        Schema::table('clientes_observacoes', function (Blueprint $table) {
            $table->dropForeign('clientes_observacoes_id_observacao_foreign');
            $table->dropForeign('clientes_observacoes_id_cliente_foreign');
        });
        Schema::dropIfExists('clientes_observacoes');
    }
}
