<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAdminUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        DB::transaction(static function () {
            Schema::create('admin_users', static function (Blueprint $table) {
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
                $table->string('logradouro')->nullable();
                $table->string('numero', 15)->nullable();
                $table->string('complemento')->nullable();
                $table->string('bairro')->nullable();
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
                $table->string('cep', 9)->nullable();
                $table->date('vencimento')->nullable();
                $table->decimal('valor', 9)->nullable();
                $table->date('ini_contrato')->nullable();
                $table->date('fim_contrato')->nullable();
                $table->string('fistel', 11)->nullable();
                $table->boolean('is_admin')->default(false);
                $table->boolean('activated')->default(false);
                $table->boolean('forbidden')->default(false);
                $table->string('language', 2)->default('pt');
                $table->boolean('enabled')->default(true);
                $table->string('password');
                $table->bigInteger('id_servico')->nullable();
                $table->decimal('desconto', 9)->nullable();
                $table->rememberToken();
                $table->timestamps();
                $table->softDeletes();
                $table->unique(['cpf', 'cnpj', 'email', 'deleted_at']);
            });

            $connection = config('database.default');
            $driver = config("database.connections.{$connection}.driver");
            if ($driver === 'pgsql') {
                Schema::table('admin_users', static function (Blueprint $table) {
                    DB::statement('CREATE UNIQUE INDEX admin_users_email_null_deleted_at ON admin_users (email) WHERE deleted_at IS NULL;');
                });
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('admin_users', function (Blueprint $table) {
            $table->dropForeign('admin_users_id_estado_foreign');
            $table->dropForeign('admin_users_id_cidade_foreign');
        });
        Schema::dropIfExists('admin_users');
    }
}
