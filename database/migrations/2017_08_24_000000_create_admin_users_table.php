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
                $table->increments('id');
                $table->string('nome')->nullable();
                $table->string('razao_social')->nullable();
                $table->string('cpf', 11)->nullable();
                $table->string('cnpj', 14)->nullable();
                $table->string('email');
                $table->string('email2')->nullable();
                $table->string('email3')->nullable();
                $table->string('telefone', 10)->nullable();
                $table->string('celular', 11)->nullable();
                $table->date('nascimento')->nullable();
                $table->string('password');
                $table->rememberToken();
                $table->boolean('is_admin')->default(false);
                $table->boolean('activated')->default(false);
                $table->boolean('forbidden')->default(false);
                $table->string('language', 2)->default('en');

                $table->timestamps();
                $table->softDeletes();

                $table->unique(['email', 'deleted_at']);
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
        Schema::dropIfExists('admin_users');
    }
}
