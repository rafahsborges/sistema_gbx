<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCidadesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cidades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('ibge_code', 20)->nullable();
            $table->unsignedBigInteger('id_estado')->index('fk_cidades_estados');
            $table->foreign('id_estado', 'fk_cidades_estados')
                ->references('id')->on('estados')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->boolean('enabled')->default(true);
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
        Schema::table('cidades', function (Blueprint $table) {
            $table->dropForeign('fk_cidades_estados');
        });
        Schema::drop('cidades');
    }

}
