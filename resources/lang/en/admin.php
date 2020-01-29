<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'tipo' => 'Tipo',
            'nome' => 'Nome',
            'razao_social' => 'Razao social',
            'cpf' => 'Cpf',
            'cnpj' => 'Cnpj',
            'email' => 'Email',
            'email2' => 'Email2',
            'email3' => 'Email3',
            'telefone' => 'Telefone',
            'celular' => 'Celular',
            'logradouro' => 'Logradouro',
            'numero' => 'Numero',
            'complemento' => 'Complemento',
            'bairro' => 'Bairro',
            'cidade' => 'Cidade',
            'uf' => 'Uf',
            'cep' => 'Cep',
            'vencimento' => 'Vencimento',
            'valor' => 'Valor',
            'ini_contrato' => 'Ini contrato',
            'fim_contrato' => 'Fim contrato',
            'fistel' => 'Fistel',
            'is_admin' => 'Is admin',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
            'enabled' => 'Enabled',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',

            //Belongs to many relations
            'roles' => 'Roles',
        ],
    ],

    'representante' => [
        'title' => 'Representantes',

        'actions' => [
            'index' => 'Representantes',
            'create' => 'New Representante',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'email' => 'Email',
            'telefone' => 'Telefone',
            'celular' => 'Celular',
            'cargo' => 'Cargo',
            'id_cliente' => 'Id cliente',
        ],
    ],

    'servico' => [
        'title' => 'Servicos',

        'actions' => [
            'index' => 'Servicos',
            'create' => 'New Servico',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'valor' => 'Valor',
            'orgao' => 'Orgao',
            'descricao' => 'Descricao',
            'status' => 'Status',
        ],
    ],

    'ponto' => [
        'title' => 'Pontos',

        'actions' => [
            'index' => 'Pontos',
            'create' => 'New Ponto',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'logradouro' => 'Logradouro',
            'numero' => 'Numero',
            'complemento' => 'Complemento',
            'bairro' => 'Bairro',
            'cidade' => 'Cidade',
            'uf' => 'Uf',
            'cep' => 'Cep',
            'estacao' => 'Estacao',
            'entidade' => 'Entidade',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'altura' => 'Altura',
            'id_cliente' => 'Id cliente',
        ],
    ],

    'observacao' => [
        'title' => 'Observacoes',

        'actions' => [
            'index' => 'Observacoes',
            'create' => 'New Observacao',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'descricao' => 'Descricao',
            'id_cliente' => 'Id cliente',
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];
