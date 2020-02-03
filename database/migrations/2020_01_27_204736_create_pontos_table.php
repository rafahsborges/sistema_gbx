<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePontosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pontos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('logradouro')->nullable();
            $table->string('numero', 15)->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->unsignedBigInteger('id_cidade')->index('fk_pontos_cidades')->nullable();
            $table->foreign('id_cidade', 'fk_pontos_cidades')
                ->references('id')->on('cidades')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->unsignedBigInteger('id_estado')->index('fk_pontos_estados')->nullable();
            $table->foreign('id_estado', 'fk_pontos_estados')
                ->references('id')->on('estados')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->string('cep', 9)->nullable();
            $table->string('estacao')->nullable();
            $table->string('entidade')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('altura')->nullable();
            $table->unsignedBigInteger('id_pontos');
            $table->foreign('id_pontos')
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
        Schema::table('pontos', function (Blueprint $table) {
            $table->dropForeign('pontos_id_cliente_foreign');
            $table->dropForeign('fk_pontos_cidades');
            $table->dropForeign('fk_pontos_estados');
        });
        Schema::dropIfExists('pontos');
    }
}
