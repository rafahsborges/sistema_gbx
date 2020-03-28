<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->decimal('valor', 9)->nullable();
            $table->string('orgao')->nullable();
            $table->text('descricao');
            $table->unsignedBigInteger('id_etapa')->nullable();
            $table->foreign('id_etapa')
                ->references('id')->on('etapas')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->unsignedBigInteger('id_status');
            $table->foreign('id_status')
                ->references('id')->on('status')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->text('observacao')->nullable();
            $table->boolean('documento')->default(false);
            $table->boolean('valido')->default(false);
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
        Schema::table('servicos', function (Blueprint $table) {
            $table->dropForeign('servicos_id_etapa_foreign');
            $table->dropForeign('servicos_id_status_foreign');
        });
        Schema::dropIfExists('servicos');
    }
}
