<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSicisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sicis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ano');
            $table->string('mes');
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
            $table->string('fistel');
            $table->unsignedBigInteger('id_cidade');
            $table->foreign('id_cidade')
                ->references('id')->on('cidades')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->unsignedBigInteger('id_estado');
            $table->foreign('id_estado')
                ->references('id')->on('estados')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->decimal('iem1a', 9)->nullable();
            $table->decimal('iem1b', 9)->nullable();
            $table->decimal('iem1c', 9)->nullable();
            $table->decimal('iem1d', 9)->nullable();
            $table->decimal('iem1e', 9)->nullable();
            $table->decimal('iem1f', 9)->nullable();
            $table->decimal('iem1g', 9)->nullable();
            $table->decimal('iem2a', 9)->nullable();
            $table->decimal('iem2b', 9)->nullable();
            $table->decimal('iem2c', 9)->nullable();
            $table->decimal('iem3a', 9)->nullable();
            $table->integer('iem4a')->nullable();
            $table->integer('iem5a')->nullable();
            $table->decimal('iem6a', 9)->nullable();
            $table->decimal('iem7a', 9)->nullable();
            $table->decimal('iem8a', 9)->nullable();
            $table->decimal('iem8b', 9)->nullable();
            $table->decimal('iem8c', 9)->nullable();
            $table->decimal('iem8d', 9)->nullable();
            $table->decimal('iem8e', 9)->nullable();
            $table->decimal('iem9Fa', 9)->nullable();
            $table->decimal('iem9Fb', 9)->nullable();
            $table->decimal('iem9Fc', 9)->nullable();
            $table->decimal('iem9Fd', 9)->nullable();
            $table->decimal('iem9Fe', 9)->nullable();
            $table->decimal('iem9Ja', 9)->nullable();
            $table->decimal('iem9Jb', 9)->nullable();
            $table->decimal('iem9Jc', 9)->nullable();
            $table->decimal('iem9Jd', 9)->nullable();
            $table->decimal('iem9Je', 9)->nullable();
            $table->decimal('iem10Fa', 9)->nullable();
            $table->decimal('iem10Fb', 9)->nullable();
            $table->decimal('iem10Fc', 9)->nullable();
            $table->decimal('iem10Fd', 9)->nullable();
            $table->decimal('iem10Ja', 9)->nullable();
            $table->decimal('iem10Jb', 9)->nullable();
            $table->decimal('iem10Jc', 9)->nullable();
            $table->decimal('iem10Jd', 9)->nullable();
            $table->integer('iau1')->nullable();
            $table->decimal('ipl1a', 9)->nullable();
            $table->decimal('ipl1b', 9)->nullable();
            $table->decimal('ipl1c', 9)->nullable();
            $table->decimal('ipl1d', 9)->nullable();
            $table->decimal('ipl2a', 9)->nullable();
            $table->decimal('ipl2b', 9)->nullable();
            $table->decimal('ipl2c', 9)->nullable();
            $table->decimal('ipl2d', 9)->nullable();
            $table->integer('ipl3Fa')->nullable();
            $table->integer('ipl3Ja')->nullable();
            $table->integer('ipl6im')->nullable();
            $table->integer('qaipl4smAqaipl5sm')->nullable();
            $table->integer('qaipl4smAtotal')->nullable();
            $table->integer('qaipl4smA15')->nullable();
            $table->integer('qaipl4smA16')->nullable();
            $table->integer('qaipl4smA17')->nullable();
            $table->integer('qaipl4smA18')->nullable();
            $table->integer('qaipl4smA19')->nullable();
            $table->integer('qaipl4smBqaipl5sm')->nullable();
            $table->integer('qaipl4smBtotal')->nullable();
            $table->integer('qaipl4smB15')->nullable();
            $table->integer('qaipl4smB16')->nullable();
            $table->integer('qaipl4smB17')->nullable();
            $table->integer('qaipl4smB18')->nullable();
            $table->integer('qaipl4smB19')->nullable();
            $table->integer('qaipl4smCqaipl5sm')->nullable();
            $table->integer('qaipl4smCtotal')->nullable();
            $table->integer('qaipl4smC15')->nullable();
            $table->integer('qaipl4smC16')->nullable();
            $table->integer('qaipl4smC17')->nullable();
            $table->integer('qaipl4smC18')->nullable();
            $table->integer('qaipl4smC19')->nullable();
            $table->integer('qaipl4smDqaipl5sm')->nullable();
            $table->integer('qaipl4smDtotal')->nullable();
            $table->integer('qaipl4smD15')->nullable();
            $table->integer('qaipl4smD16')->nullable();
            $table->integer('qaipl4smD17')->nullable();
            $table->integer('qaipl4smD18')->nullable();
            $table->integer('qaipl4smD19')->nullable();
            $table->integer('qaipl4smEqaipl5sm')->nullable();
            $table->integer('qaipl4smEtotal')->nullable();
            $table->integer('qaipl4smE15')->nullable();
            $table->integer('qaipl4smE16')->nullable();
            $table->integer('qaipl4smE17')->nullable();
            $table->integer('qaipl4smE18')->nullable();
            $table->integer('qaipl4smE19')->nullable();
            $table->integer('qaipl4smFqaipl5sm')->nullable();
            $table->integer('qaipl4smFtotal')->nullable();
            $table->integer('qaipl4smF15')->nullable();
            $table->integer('qaipl4smF16')->nullable();
            $table->integer('qaipl4smF17')->nullable();
            $table->integer('qaipl4smF18')->nullable();
            $table->integer('qaipl4smF19')->nullable();
            $table->integer('qaipl4smGqaipl5sm')->nullable();
            $table->integer('qaipl4smGtotal')->nullable();
            $table->integer('qaipl4smG15')->nullable();
            $table->integer('qaipl4smG16')->nullable();
            $table->integer('qaipl4smG17')->nullable();
            $table->integer('qaipl4smG18')->nullable();
            $table->integer('qaipl4smG19')->nullable();
            $table->integer('qaipl4smHqaipl5sm')->nullable();
            $table->integer('qaipl4smHtotal')->nullable();
            $table->integer('qaipl4smH15')->nullable();
            $table->integer('qaipl4smH16')->nullable();
            $table->integer('qaipl4smH17')->nullable();
            $table->integer('qaipl4smH18')->nullable();
            $table->integer('qaipl4smH19')->nullable();
            $table->integer('qaipl4smIqaipl5sm')->nullable();
            $table->integer('qaipl4smItotal')->nullable();
            $table->integer('qaipl4smI15')->nullable();
            $table->integer('qaipl4smI16')->nullable();
            $table->integer('qaipl4smI17')->nullable();
            $table->integer('qaipl4smI18')->nullable();
            $table->integer('qaipl4smI19')->nullable();
            $table->integer('qaipl4smJqaipl5sm')->nullable();
            $table->integer('qaipl4smJtotal')->nullable();
            $table->integer('qaipl4smJ15')->nullable();
            $table->integer('qaipl4smJ16')->nullable();
            $table->integer('qaipl4smJ17')->nullable();
            $table->integer('qaipl4smJ18')->nullable();
            $table->integer('qaipl4smJ19')->nullable();
            $table->integer('qaipl4smKqaipl5sm')->nullable();
            $table->integer('qaipl4smKtotal')->nullable();
            $table->integer('qaipl4smK15')->nullable();
            $table->integer('qaipl4smK16')->nullable();
            $table->integer('qaipl4smK17')->nullable();
            $table->integer('qaipl4smK18')->nullable();
            $table->integer('qaipl4smK19')->nullable();
            $table->integer('qaipl4smLqaipl5sm')->nullable();
            $table->integer('qaipl4smLtotal')->nullable();
            $table->integer('qaipl4smL15')->nullable();
            $table->integer('qaipl4smL16')->nullable();
            $table->integer('qaipl4smL17')->nullable();
            $table->integer('qaipl4smL18')->nullable();
            $table->integer('qaipl4smL19')->nullable();
            $table->integer('qaipl4smMqaipl5sm')->nullable();
            $table->integer('qaipl4smMtotal')->nullable();
            $table->integer('qaipl4smM15')->nullable();
            $table->integer('qaipl4smM16')->nullable();
            $table->integer('qaipl4smM17')->nullable();
            $table->integer('qaipl4smM18')->nullable();
            $table->integer('qaipl4smM19')->nullable();
            $table->integer('qaipl4smNqaipl5sm')->nullable();
            $table->integer('qaipl4smNtotal')->nullable();
            $table->integer('qaipl4smN15')->nullable();
            $table->integer('qaipl4smN16')->nullable();
            $table->integer('qaipl4smN17')->nullable();
            $table->integer('qaipl4smN18')->nullable();
            $table->integer('qaipl4smN19')->nullable();
            $table->integer('qaipl4smOqaipl5sm')->nullable();
            $table->integer('qaipl4smOtotal')->nullable();
            $table->integer('qaipl4smO15')->nullable();
            $table->integer('qaipl4smO16')->nullable();
            $table->integer('qaipl4smO17')->nullable();
            $table->integer('qaipl4smO18')->nullable();
            $table->integer('qaipl4smO19')->nullable();
            $table->integer('status');
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
        Schema::table('sicis', function (Blueprint $table) {
            $table->dropForeign('sicis_id_cliente_foreign');
            $table->dropForeign('sicis_id_servico_foreign');
            $table->dropForeign('sicis_id_estado_foreign');
            $table->dropForeign('sicis_id_cidade_foreign');
        });
        Schema::dropIfExists('sicis');
    }
}
