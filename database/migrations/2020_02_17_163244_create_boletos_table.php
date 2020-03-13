<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoletosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boletos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descricao');
            $table->decimal('valor', 9);
            $table->date('vencimento');
            $table->decimal('dias_vencimento', 2, 0)->nullable();
            $table->decimal('parcelas', 2, 0)->nullable();
            $table->decimal('desconto', 9)->nullable();
            $table->decimal('dias_desconto', 2, 0)->nullable();
            $table->decimal('juros', 5)->nullable();
            $table->decimal('multa', 5)->nullable();
            $table->decimal('valor_pago', 9)->nullable();
            $table->date('pagamento')->nullable();
            $table->unsignedBigInteger('id_cliente');
            $table->foreign('id_cliente')
                ->references('id')->on('admin_users')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->unsignedBigInteger('id_servico');
            $table->foreign('id_servico')
                ->references('id')->on('servicos')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->boolean('gerar');
            $table->boolean('notificar');
            $table->boolean('status');
            $table->string('juno_id')->nullable();
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
        Schema::table('boletos', function (Blueprint $table) {
            $table->dropForeign('boletos_id_cliente_foreign');
            $table->dropForeign('boletos_id_servico_foreign');
        });
        Schema::dropIfExists('boletos');
    }
}
