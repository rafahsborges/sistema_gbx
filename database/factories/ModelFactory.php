<?php

/** @var  Factory $factory */

use Illuminate\Database\Eloquent\Factory;

/** @var  Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->sentence,
        'razao_social' => $faker->sentence,
        'cpf' => $faker->sentence,
        'cnpj' => $faker->sentence,
        'email' => $faker->email,
        'email2' => $faker->sentence,
        'email3' => $faker->sentence,
        'telefone' => $faker->sentence,
        'celular' => $faker->sentence,
        'logradouro' => $faker->sentence,
        'numero' => $faker->sentence,
        'complemento' => $faker->sentence,
        'bairro' => $faker->sentence,
        'cidade' => $faker->sentence,
        'uf' => $faker->sentence,
        'cep' => $faker->sentence,
        'vencimento' => $faker->date(),
        'valor' => $faker->randomNumber(5),
        'ini_contrato' => $faker->date(),
        'fim_contrato' => $faker->date(),
        'fistel' => $faker->sentence,
        'is_admin' => $faker->boolean(),
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'enabled' => $faker->boolean(),
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,

    ];
});
