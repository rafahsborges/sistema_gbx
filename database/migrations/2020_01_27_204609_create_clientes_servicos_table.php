<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes_servicos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_servico');
            $table->foreign('id_servico')
                ->references('id')->on('servicos')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->unsignedBigInteger('id_cliente');
            $table->foreign('id_cliente')
                ->references('id')->on('admin_users')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->decimal('desconto', 9)->nullable();
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
        Schema::table('clientes_servicos', function (Blueprint $table) {
            $table->dropForeign('clientes_servicos_id_servico_foreign');
            $table->dropForeign('clientes_servicos_id_cliente_foreign');
        });
        Schema::dropIfExists('clientes_servicos');
    }
}
