<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesRepresentantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes_representantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_representante');
            $table->foreign('id_representante')
                ->references('id')->on('representantes')
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
        Schema::table('clientes_representantes', function (Blueprint $table) {
            $table->dropForeign('clientes_representantes_id_representante_foreign');
            $table->dropForeign('clientes_representantes_id_cliente_foreign');
        });
        Schema::dropIfExists('clientes_representantes');
    }
}
