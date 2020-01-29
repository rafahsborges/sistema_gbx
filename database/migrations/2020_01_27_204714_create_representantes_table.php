<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepresentantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('representantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('email');
            $table->string('telefone', 10)->nullable();
            $table->string('celular', 11)->nullable();
            $table->string('cargo');
            $table->unsignedBigInteger('id_cliente');
            $table->foreign('id_cliente')
                ->references('id')->on('admin_users')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['email', 'deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('representantes', function (Blueprint $table) {
            $table->dropForeign('representantes_id_cliente_foreign');
        });
        Schema::dropIfExists('representantes');
    }
}
