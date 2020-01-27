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

    // Do not delete me :) I'm used for auto-generation
];
