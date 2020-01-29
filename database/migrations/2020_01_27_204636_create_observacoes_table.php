<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObservacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observacoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('descricao');
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
        Schema::table('observacoes', function (Blueprint $table) {
            $table->dropForeign('observacoes_id_cliente_foreign');
        });
        Schema::dropIfExists('observacoes');
    }
}
