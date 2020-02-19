<?php

/** @var  Factory $factory */

use Illuminate\Database\Eloquent\Factory;

/** @var  Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'tipo' => $faker->boolean(),
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

/** @var  Factory $factory */
$factory->define(App\Models\Representante::class, static function (Faker\Generator $faker) {
    return [
        'nome' => $faker->sentence,
        'email' => $faker->email,
        'telefone' => $faker->sentence,
        'celular' => $faker->sentence,
        'cargo' => $faker->sentence,
        'id_cliente' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
    ];
});

/** @var  Factory $factory */
$factory->define(App\Models\Ponto::class, static function (Faker\Generator $faker) {
    return [
        'nome' => $faker->sentence,
        'logradouro' => $faker->sentence,
        'numero' => $faker->sentence,
        'complemento' => $faker->sentence,
        'bairro' => $faker->sentence,
        'cidade' => $faker->sentence,
        'uf' => $faker->sentence,
        'cep' => $faker->sentence,
        'estacao' => $faker->sentence,
        'entidade' => $faker->sentence,
        'latitude' => $faker->sentence,
        'longitude' => $faker->sentence,
        'altura' => $faker->sentence,
        'id_cliente' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
    ];
});

/** @var  Factory $factory */
$factory->define(App\Models\Apontamento::class, static function (Faker\Generator $faker) {
    return [
        'descricao' => $faker->text(),
        'id_cliente' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
    ];
});

/** @var  Factory $factory */
$factory->define(App\Models\Estado::class, static function (Faker\Generator $faker) {
    return [
        'nome' => $faker->sentence,
        'abreviacao' => $faker->sentence,
        'enabled' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
    ];
});

/** @var  Factory $factory */
$factory->define(App\Models\Cidade::class, static function (Faker\Generator $faker) {
    return [
        'nome' => $faker->sentence,
        'ibge_code' => $faker->sentence,
        'id_estado' => $faker->sentence,
        'enabled' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
    ];
});

/** @var  Factory $factory */
$factory->define(App\Models\Status::class, static function (Faker\Generator $faker) {
    return [
        'nome' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
    ];
});

/** @var  Factory $factory */
$factory->define(App\Models\Etapa::class, static function (Faker\Generator $faker) {
    return [
        'nome' => $faker->sentence,
        'id_servico' => $faker->sentence,
        'id_status' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
    ];
});

/** @var  Factory $factory */
$factory->define(App\Models\Item::class, static function (Faker\Generator $faker) {
    return [
        'nome' => $faker->sentence,
        'id_etapa' => $faker->sentence,
        'id_status' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
    ];
});

/** @var  Factory $factory */
$factory->define(App\Models\Servico::class, static function (Faker\Generator $faker) {
    return [
        'nome' => $faker->sentence,
        'valor' => $faker->randomNumber(5),
        'orgao' => $faker->sentence,
        'descricao' => $faker->text(),
        'id_etapa' => $faker->sentence,
        'id_status' => $faker->sentence,
        'observacao' => $faker->text(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
    ];
});

/** @var  Factory $factory */
$factory->define(App\Models\Notification::class, static function (Faker\Generator $faker) {
    return [
        'assunto' => $faker->sentence,
        'conteudo' => $faker->text(),
        'id_cliente' => $faker->sentence,
        'agendar' => $faker->boolean(),
        'agendamento' => $faker->dateTime,
        'enviado' => $faker->boolean(),
        'envio' => $faker->dateTime,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Informativo::class, static function (Faker\Generator $faker) {
    return [
        'assunto' => $faker->sentence,
        'conteudo' => $faker->text(),
        'id_servico' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\MalaDireta::class, static function (Faker\Generator $faker) {
    return [
        'assunto' => $faker->sentence,
        'conteudo' => $faker->text(),
        'id_cliente' => $faker->sentence,
        'agendar' => $faker->boolean(),
        'agendamento' => $faker->dateTime,
        'enviado' => $faker->boolean(),
        'envio' => $faker->dateTime,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Orcamento::class, static function (Faker\Generator $faker) {
    return [
        'tipo' => $faker->boolean(),
        'nome' => $faker->sentence,
        'razao_social' => $faker->sentence,
        'cpf' => $faker->sentence,
        'cnpj' => $faker->sentence,
        'email' => $faker->email,
        'email2' => $faker->sentence,
        'email3' => $faker->sentence,
        'telefone' => $faker->sentence,
        'celular' => $faker->sentence,
        'id_cidade' => $faker->sentence,
        'id_estado' => $faker->sentence,
        'assunto' => $faker->sentence,
        'conteudo' => $faker->text(),
        'enviar' => $faker->boolean(),
        'agendar' => $faker->boolean(),
        'agendamento' => $faker->dateTime,
        'enviado' => $faker->boolean(),
        'envio' => $faker->dateTime,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Boleto::class, static function (Faker\Generator $faker) {
    return [
        'valor' => $faker->randomNumber(5),
        'vencimento' => $faker->date(),
        'valor_pago' => $faker->randomNumber(5),
        'pagamento' => $faker->date(),
        'id_cliente' => $faker->sentence,
        'status' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Sici::class, static function (Faker\Generator $faker) {
    return [
        'ano' => $faker->sentence,
        'mes' => $faker->sentence,
        'id_cliente' => $faker->sentence,
        'id_servico' => $faker->sentence,
        'fistel' => $faker->sentence,
        'id_cidade' => $faker->sentence,
        'id_estado' => $faker->sentence,
        'iem1a' => $faker->randomNumber(5),
        'iem1b' => $faker->randomNumber(5),
        'iem1c' => $faker->randomNumber(5),
        'iem1d' => $faker->randomNumber(5),
        'iem1e' => $faker->randomNumber(5),
        'iem1f' => $faker->randomNumber(5),
        'iem1g' => $faker->randomNumber(5),
        'iem2a' => $faker->randomNumber(5),
        'iem2b' => $faker->randomNumber(5),
        'iem2c' => $faker->randomNumber(5),
        'iem3a' => $faker->randomNumber(5),
        'iem4a' => $faker->randomNumber(5),
        'iem5a' => $faker->randomNumber(5),
        'iem6a' => $faker->randomNumber(5),
        'iem7a' => $faker->randomNumber(5),
        'iem8a' => $faker->randomNumber(5),
        'iem8b' => $faker->randomNumber(5),
        'iem8c' => $faker->randomNumber(5),
        'iem8d' => $faker->randomNumber(5),
        'iem8e' => $faker->randomNumber(5),
        'iem9Fa' => $faker->randomNumber(5),
        'iem9Fb' => $faker->randomNumber(5),
        'iem9Fc' => $faker->randomNumber(5),
        'iem9Fd' => $faker->randomNumber(5),
        'iem9Fe' => $faker->randomNumber(5),
        'iem9Ja' => $faker->randomNumber(5),
        'iem9Jb' => $faker->randomNumber(5),
        'iem9Jc' => $faker->randomNumber(5),
        'iem9Jd' => $faker->randomNumber(5),
        'iem9Je' => $faker->randomNumber(5),
        'iem10Fa' => $faker->randomNumber(5),
        'iem10Fb' => $faker->randomNumber(5),
        'iem10Fc' => $faker->randomNumber(5),
        'iem10Fd' => $faker->randomNumber(5),
        'iem10Ja' => $faker->randomNumber(5),
        'iem10Jb' => $faker->randomNumber(5),
        'iem10Jc' => $faker->randomNumber(5),
        'iem10Jd' => $faker->randomNumber(5),
        'iau1' => $faker->randomNumber(5),
        'ipl1a' => $faker->randomNumber(5),
        'ipl1b' => $faker->randomNumber(5),
        'ipl1c' => $faker->randomNumber(5),
        'ipl1d' => $faker->randomNumber(5),
        'ipl2a' => $faker->randomNumber(5),
        'ipl2b' => $faker->randomNumber(5),
        'ipl2c' => $faker->randomNumber(5),
        'ipl2d' => $faker->randomNumber(5),
        'ipl3Fa' => $faker->randomNumber(5),
        'ipl3Ja' => $faker->randomNumber(5),
        'ipl6im' => $faker->randomNumber(5),
        'qaipl4smAqaipl5sm' => $faker->randomNumber(5),
        'qaipl4smAtotal' => $faker->randomNumber(5),
        'qaipl4smA15' => $faker->randomNumber(5),
        'qaipl4smA16' => $faker->randomNumber(5),
        'qaipl4smA17' => $faker->randomNumber(5),
        'qaipl4smA18' => $faker->randomNumber(5),
        'qaipl4smA19' => $faker->randomNumber(5),
        'qaipl4smBqaipl5sm' => $faker->randomNumber(5),
        'qaipl4smBtotal' => $faker->randomNumber(5),
        'qaipl4smB15' => $faker->randomNumber(5),
        'qaipl4smB16' => $faker->randomNumber(5),
        'qaipl4smB17' => $faker->randomNumber(5),
        'qaipl4smB18' => $faker->randomNumber(5),
        'qaipl4smB19' => $faker->randomNumber(5),
        'qaipl4smCqaipl5sm' => $faker->randomNumber(5),
        'qaipl4smCtotal' => $faker->randomNumber(5),
        'qaipl4smC15' => $faker->randomNumber(5),
        'qaipl4smC16' => $faker->randomNumber(5),
        'qaipl4smC17' => $faker->randomNumber(5),
        'qaipl4smC18' => $faker->randomNumber(5),
        'qaipl4smC19' => $faker->randomNumber(5),
        'qaipl4smDqaipl5sm' => $faker->randomNumber(5),
        'qaipl4smDtotal' => $faker->randomNumber(5),
        'qaipl4smD15' => $faker->randomNumber(5),
        'qaipl4smD16' => $faker->randomNumber(5),
        'qaipl4smD17' => $faker->randomNumber(5),
        'qaipl4smD18' => $faker->randomNumber(5),
        'qaipl4smD19' => $faker->randomNumber(5),
        'qaipl4smEqaipl5sm' => $faker->randomNumber(5),
        'qaipl4smEtotal' => $faker->randomNumber(5),
        'qaipl4smE15' => $faker->randomNumber(5),
        'qaipl4smE16' => $faker->randomNumber(5),
        'qaipl4smE17' => $faker->randomNumber(5),
        'qaipl4smE18' => $faker->randomNumber(5),
        'qaipl4smE19' => $faker->randomNumber(5),
        'qaipl4smFqaipl5sm' => $faker->randomNumber(5),
        'qaipl4smFtotal' => $faker->randomNumber(5),
        'qaipl4smF15' => $faker->randomNumber(5),
        'qaipl4smF16' => $faker->randomNumber(5),
        'qaipl4smF17' => $faker->randomNumber(5),
        'qaipl4smF18' => $faker->randomNumber(5),
        'qaipl4smF19' => $faker->randomNumber(5),
        'qaipl4smGqaipl5sm' => $faker->randomNumber(5),
        'qaipl4smGtotal' => $faker->randomNumber(5),
        'qaipl4smG15' => $faker->randomNumber(5),
        'qaipl4smG16' => $faker->randomNumber(5),
        'qaipl4smG17' => $faker->randomNumber(5),
        'qaipl4smG18' => $faker->randomNumber(5),
        'qaipl4smG19' => $faker->randomNumber(5),
        'qaipl4smHqaipl5sm' => $faker->randomNumber(5),
        'qaipl4smHtotal' => $faker->randomNumber(5),
        'qaipl4smH15' => $faker->randomNumber(5),
        'qaipl4smH16' => $faker->randomNumber(5),
        'qaipl4smH17' => $faker->randomNumber(5),
        'qaipl4smH18' => $faker->randomNumber(5),
        'qaipl4smH19' => $faker->randomNumber(5),
        'qaipl4smIqaipl5sm' => $faker->randomNumber(5),
        'qaipl4smItotal' => $faker->randomNumber(5),
        'qaipl4smI15' => $faker->randomNumber(5),
        'qaipl4smI16' => $faker->randomNumber(5),
        'qaipl4smI17' => $faker->randomNumber(5),
        'qaipl4smI18' => $faker->randomNumber(5),
        'qaipl4smI19' => $faker->randomNumber(5),
        'qaipl4smJqaipl5sm' => $faker->randomNumber(5),
        'qaipl4smJtotal' => $faker->randomNumber(5),
        'qaipl4smJ15' => $faker->randomNumber(5),
        'qaipl4smJ16' => $faker->randomNumber(5),
        'qaipl4smJ17' => $faker->randomNumber(5),
        'qaipl4smJ18' => $faker->randomNumber(5),
        'qaipl4smJ19' => $faker->randomNumber(5),
        'qaipl4smKqaipl5sm' => $faker->randomNumber(5),
        'qaipl4smKtotal' => $faker->randomNumber(5),
        'qaipl4smK15' => $faker->randomNumber(5),
        'qaipl4smK16' => $faker->randomNumber(5),
        'qaipl4smK17' => $faker->randomNumber(5),
        'qaipl4smK18' => $faker->randomNumber(5),
        'qaipl4smK19' => $faker->randomNumber(5),
        'qaipl4smLqaipl5sm' => $faker->randomNumber(5),
        'qaipl4smLtotal' => $faker->randomNumber(5),
        'qaipl4smL15' => $faker->randomNumber(5),
        'qaipl4smL16' => $faker->randomNumber(5),
        'qaipl4smL17' => $faker->randomNumber(5),
        'qaipl4smL18' => $faker->randomNumber(5),
        'qaipl4smL19' => $faker->randomNumber(5),
        'qaipl4smMqaipl5sm' => $faker->randomNumber(5),
        'qaipl4smMtotal' => $faker->randomNumber(5),
        'qaipl4smM15' => $faker->randomNumber(5),
        'qaipl4smM16' => $faker->randomNumber(5),
        'qaipl4smM17' => $faker->randomNumber(5),
        'qaipl4smM18' => $faker->randomNumber(5),
        'qaipl4smM19' => $faker->randomNumber(5),
        'qaipl4smNqaipl5sm' => $faker->randomNumber(5),
        'qaipl4smNtotal' => $faker->randomNumber(5),
        'qaipl4smN15' => $faker->randomNumber(5),
        'qaipl4smN16' => $faker->randomNumber(5),
        'qaipl4smN17' => $faker->randomNumber(5),
        'qaipl4smN18' => $faker->randomNumber(5),
        'qaipl4smN19' => $faker->randomNumber(5),
        'qaipl4smOqaipl5sm' => $faker->randomNumber(5),
        'qaipl4smOtotal' => $faker->randomNumber(5),
        'qaipl4smO15' => $faker->randomNumber(5),
        'qaipl4smO16' => $faker->randomNumber(5),
        'qaipl4smO17' => $faker->randomNumber(5),
        'qaipl4smO18' => $faker->randomNumber(5),
        'qaipl4smO19' => $faker->randomNumber(5),
        'status' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
        
        
    ];
});
