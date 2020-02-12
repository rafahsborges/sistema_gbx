<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrcamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orcamentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('tipo')->default(false);
            $table->string('nome')->nullable();
            $table->string('razao_social')->nullable();
            $table->string('cpf', 14)->nullable();
            $table->string('cnpj', 18)->nullable();
            $table->string('email');
            $table->string('email2')->nullable();
            $table->string('email3')->nullable();
            $table->string('telefone', 14)->nullable();
            $table->string('celular', 15)->nullable();
            $table->unsignedBigInteger('id_cidade')->nullable();
            $table->foreign('id_cidade')
                ->references('id')->on('cidades')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->unsignedBigInteger('id_estado')->nullable();
            $table->foreign('id_estado')
                ->references('id')->on('estados')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->string('assunto');
            $table->text('conteudo');
            $table->boolean('agendar')->default(false);
            $table->timestamp('agendamento')->nullable();
            $table->boolean('enviado')->default(false);
            $table->timestamp('envio')->nullable();
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
        Schema::table('orcamentos', function (Blueprint $table) {
            $table->dropForeign('orcamentos_id_estado_foreign');
            $table->dropForeign('orcamentos_id_cidade_foreign');
        });
        Schema::dropIfExists('orcamentos');
    }
}
