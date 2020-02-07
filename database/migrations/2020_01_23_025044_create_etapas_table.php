<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtapasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etapas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->bigInteger('id_servico')->nullable();
            $table->unsignedBigInteger('id_status');
            $table->foreign('id_status')
                ->references('id')->on('status')
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
        Schema::table('etapas', function (Blueprint $table) {
            $table->dropForeign('etapas_id_status_foreign');
        });
        Schema::dropIfExists('etapas');
    }
}
