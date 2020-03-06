<?php

return [
    'admin-user' => [
        'title' => 'Clientes',

        'actions' => [
            'index' => 'Clientes',
            'create' => 'New Cliente',
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
            'id_cidade' => 'Cidade',
            'id_estado' => 'Uf',
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
            'id_servico' => 'ID Servico',
            'desconto' => 'Desconto',

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
            'id_cidade' => 'Cidade',
            'id_estado' => 'Uf',
            'cep' => 'Cep',
            'estacao' => 'Estacao',
            'entidade' => 'Entidade',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'altura' => 'Altura',
            'id_cliente' => 'Id cliente',
        ],
    ],

    'apontamento' => [
        'title' => 'Observações',

        'actions' => [
            'index' => 'Observações',
            'create' => 'New Observação',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'descricao' => 'Descricao',
            'id_cliente' => 'Id cliente',
        ],
    ],

    'estado' => [
        'title' => 'Estados',

        'actions' => [
            'index' => 'Estados',
            'create' => 'New Estado',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'abreviacao' => 'Abreviacao',
            'enabled' => 'Enabled',
        ],
    ],

    'cidade' => [
        'title' => 'Cidades',

        'actions' => [
            'index' => 'Cidades',
            'create' => 'New Cidade',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'ibge_code' => 'Ibge code',
            'id_estado' => 'Id estado',
            'enabled' => 'Enabled',
        ],
    ],

    'status' => [
        'title' => 'Status',

        'actions' => [
            'index' => 'Status',
            'create' => 'New Status',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
        ],
    ],

    'etapa' => [
        'title' => 'Etapas',

        'actions' => [
            'index' => 'Etapas',
            'create' => 'New Etapa',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'id_servico' => 'Id servico',
            'id_status' => 'Id status',
        ],
    ],

    'item' => [
        'title' => 'Itens',

        'actions' => [
            'index' => 'Itens',
            'create' => 'New Item',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'id_etapa' => 'Id etapa',
            'id_status' => 'Id status',
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
            'id_etapa' => 'Id etapa',
            'id_status' => 'Id status',
            'observacao' => 'Observacao',
        ],
    ],

    'notification' => [
        'title' => 'Notificações',

        'actions' => [
            'index' => 'Notificações',
            'create' => 'New Notificação',
            'show' => 'Show Notificação',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'assunto' => 'Assunto',
            'conteudo' => 'Conteudo',
            'id_cliente' => 'Id cliente',
            'agendar' => 'Agendar',
            'agendamento' => 'Agendamento',
            'enviado' => 'Enviado',
            'envio' => 'Envio',
        ],
    ],

    'anatel' => [
        'title' => 'SEI Anatel',
    ],

    'informativo' => [
        'title' => 'Informativos',

        'actions' => [
            'index' => 'Informativos',
            'create' => 'New Informativo',
            'edit' => 'Edit :name',
            'show' => 'Show :name',
        ],

        'columns' => [
            'id' => 'ID',
            'assunto' => 'Assunto',
            'conteudo' => 'Conteudo',
            'id_servico' => 'Id servico',
        ],
    ],

    'mala-direta' => [
        'title' => 'Mala Diretas',

        'actions' => [
            'index' => 'Mala Diretas',
            'create' => 'New Mala Direta',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'assunto' => 'Assunto',
            'conteudo' => 'Conteudo',
            'id_cliente' => 'Id cliente',
            'agendar' => 'Agendar',
            'agendamento' => 'Agendamento',
            'enviado' => 'Enviado',
            'envio' => 'Envio',
        ],
    ],

    'orcamento' => [
        'title' => 'Orcamentos',

        'actions' => [
            'index' => 'Orcamentos',
            'create' => 'New Orcamento',
            'edit' => 'Edit :name',
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
            'id_cidade' => 'Id cidade',
            'id_estado' => 'Id estado',
            'assunto' => 'Assunto',
            'conteudo' => 'Conteudo',
            'enviar' => 'Enviar',
            'agendar' => 'Agendar',
            'agendamento' => 'Agendamento',
            'enviado' => 'Enviado',
            'envio' => 'Envio',
        ],
    ],

    'boleto' => [
        'title' => 'Boletos',

        'actions' => [
            'index' => 'Boletos',
            'create' => 'New Boleto',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'valor' => 'Valor',
            'vencimento' => 'Vencimento',
            'valor_pago' => 'Valor pago',
            'pagamento' => 'Pagamento',
            'id_cliente' => 'Id cliente',
            'status' => 'Status',

        ],
    ],

    'sici' => [
        'title' => 'Sicis',

        'actions' => [
            'index' => 'Sicis',
            'create' => 'New Sici',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'ano' => 'Ano',
            'mes' => 'Mes',
            'id_cliente' => 'Autorizada',
            'id_servico' => 'Serviço',
            'fistel' => 'Fistel',
            'id_cidade' => 'Município',
            'id_estado' => 'UF',
            'iem1a' => 'Iem1a',
            'iem1b' => 'Iem1b',
            'iem1c' => 'Iem1c',
            'iem1d' => 'Iem1d',
            'iem1e' => 'Iem1e',
            'iem1f' => 'Iem1f',
            'iem1g' => 'Iem1g',
            'iem2a' => 'Iem2a',
            'iem2b' => 'Iem2b',
            'iem2c' => 'Iem2c',
            'iem3a' => 'Iem3a',
            'iem4a' => 'Quantidade de Empregados Contratados Diretamente',
            'iem5a' => 'Quantidade de Empregados de Empresas Terceirizadas',
            'iem6a' => 'Iem6a',
            'iem7a' => 'Iem7a',
            'iem8a' => 'Iem8a',
            'iem8b' => 'Iem8b',
            'iem8c' => 'Iem8c',
            'iem8d' => 'Iem8d',
            'iem8e' => 'Iem8e',
            'iem9Fa' => 'Velocidade <= 512kbps',
            'iem9Fb' => 'Velocidade entre 512kbps e 2Mbps',
            'iem9Fc' => 'Velocidade entre 2Mbps e 12Mbps',
            'iem9Fd' => 'Velocidade entre 12Mbps e 34Mbps',
            'iem9Fe' => 'Velocidade > 34Mbps',
            'iem9Ja' => 'Velocidade <= 512kbps',
            'iem9Jb' => 'Velocidade entre 512kbps e 2Mbps',
            'iem9Jc' => 'Velocidade entre 2Mbps e 12Mbps',
            'iem9Jd' => 'Velocidade entre 12Mbps e 34Mbps',
            'iem9Je' => 'Velocidade > 34Mbps',
            'iem10Fa' => 'Menor Preço por 1Mbps(não dedicado)',
            'iem10Fb' => 'Menor Preço por 1Mbps(dedicado)',
            'iem10Fc' => 'Maior Preço por 1Mbps(não dedicado)',
            'iem10Fd' => 'Maior Preço por 1Mbps(dedicado)',
            'iem10Ja' => 'Menor Preço por 1Mbps(não dedicado)',
            'iem10Jb' => 'Menor Preço por 1Mbps(dedicado)',
            'iem10Jc' => 'Maior Preço por 1Mbps(não dedicado)',
            'iem10Jd' => 'Maior Preço por 1Mbps(dedicado)',
            'iau1' => 'Iau1',
            'ipl1a' => 'Ipl1a',
            'ipl1b' => 'Ipl1b',
            'ipl1c' => 'Ipl1c',
            'ipl1d' => 'Ipl1d',
            'ipl2a' => 'Ipl2a',
            'ipl2b' => 'Ipl2b',
            'ipl2c' => 'Ipl2c',
            'ipl2d' => 'Ipl2d',
            'ipl3Fa' => 'Ipl3Fa',
            'ipl3Ja' => 'Ipl3Ja',
            'ipl6im' => 'Ipl6im',
            'qaipl4smAqaipl5sm' => 'Qaipl4smAqaipl5sm',
            'qaipl4smAtotal' => 'Qaipl4smAtotal',
            'qaipl4smA15' => 'Qaipl4smA15',
            'qaipl4smA16' => 'Qaipl4smA16',
            'qaipl4smA17' => 'Qaipl4smA17',
            'qaipl4smA18' => 'Qaipl4smA18',
            'qaipl4smA19' => 'Qaipl4smA19',
            'qaipl4smBqaipl5sm' => 'Qaipl4smBqaipl5sm',
            'qaipl4smBtotal' => 'Qaipl4smBtotal',
            'qaipl4smB15' => 'Qaipl4smB15',
            'qaipl4smB16' => 'Qaipl4smB16',
            'qaipl4smB17' => 'Qaipl4smB17',
            'qaipl4smB18' => 'Qaipl4smB18',
            'qaipl4smB19' => 'Qaipl4smB19',
            'qaipl4smCqaipl5sm' => 'Qaipl4smCqaipl5sm',
            'qaipl4smCtotal' => 'Qaipl4smCtotal',
            'qaipl4smC15' => 'Qaipl4smC15',
            'qaipl4smC16' => 'Qaipl4smC16',
            'qaipl4smC17' => 'Qaipl4smC17',
            'qaipl4smC18' => 'Qaipl4smC18',
            'qaipl4smC19' => 'Qaipl4smC19',
            'qaipl4smDqaipl5sm' => 'Qaipl4smDqaipl5sm',
            'qaipl4smDtotal' => 'Qaipl4smDtotal',
            'qaipl4smD15' => 'Qaipl4smD15',
            'qaipl4smD16' => 'Qaipl4smD16',
            'qaipl4smD17' => 'Qaipl4smD17',
            'qaipl4smD18' => 'Qaipl4smD18',
            'qaipl4smD19' => 'Qaipl4smD19',
            'qaipl4smEqaipl5sm' => 'Qaipl4smEqaipl5sm',
            'qaipl4smEtotal' => 'Qaipl4smEtotal',
            'qaipl4smE15' => 'Qaipl4smE15',
            'qaipl4smE16' => 'Qaipl4smE16',
            'qaipl4smE17' => 'Qaipl4smE17',
            'qaipl4smE18' => 'Qaipl4smE18',
            'qaipl4smE19' => 'Qaipl4smE19',
            'qaipl4smFqaipl5sm' => 'Qaipl4smFqaipl5sm',
            'qaipl4smFtotal' => 'Qaipl4smFtotal',
            'qaipl4smF15' => 'Qaipl4smF15',
            'qaipl4smF16' => 'Qaipl4smF16',
            'qaipl4smF17' => 'Qaipl4smF17',
            'qaipl4smF18' => 'Qaipl4smF18',
            'qaipl4smF19' => 'Qaipl4smF19',
            'qaipl4smGqaipl5sm' => 'Qaipl4smGqaipl5sm',
            'qaipl4smGtotal' => 'Qaipl4smGtotal',
            'qaipl4smG15' => 'Qaipl4smG15',
            'qaipl4smG16' => 'Qaipl4smG16',
            'qaipl4smG17' => 'Qaipl4smG17',
            'qaipl4smG18' => 'Qaipl4smG18',
            'qaipl4smG19' => 'Qaipl4smG19',
            'qaipl4smHqaipl5sm' => 'Qaipl4smHqaipl5sm',
            'qaipl4smHtotal' => 'Qaipl4smHtotal',
            'qaipl4smH15' => 'Qaipl4smH15',
            'qaipl4smH16' => 'Qaipl4smH16',
            'qaipl4smH17' => 'Qaipl4smH17',
            'qaipl4smH18' => 'Qaipl4smH18',
            'qaipl4smH19' => 'Qaipl4smH19',
            'qaipl4smIqaipl5sm' => 'Qaipl4smIqaipl5sm',
            'qaipl4smItotal' => 'Qaipl4smItotal',
            'qaipl4smI15' => 'Qaipl4smI15',
            'qaipl4smI16' => 'Qaipl4smI16',
            'qaipl4smI17' => 'Qaipl4smI17',
            'qaipl4smI18' => 'Qaipl4smI18',
            'qaipl4smI19' => 'Qaipl4smI19',
            'qaipl4smJqaipl5sm' => 'Qaipl4smJqaipl5sm',
            'qaipl4smJtotal' => 'Qaipl4smJtotal',
            'qaipl4smJ15' => 'Qaipl4smJ15',
            'qaipl4smJ16' => 'Qaipl4smJ16',
            'qaipl4smJ17' => 'Qaipl4smJ17',
            'qaipl4smJ18' => 'Qaipl4smJ18',
            'qaipl4smJ19' => 'Qaipl4smJ19',
            'qaipl4smKqaipl5sm' => 'Qaipl4smKqaipl5sm',
            'qaipl4smKtotal' => 'Qaipl4smKtotal',
            'qaipl4smK15' => 'Qaipl4smK15',
            'qaipl4smK16' => 'Qaipl4smK16',
            'qaipl4smK17' => 'Qaipl4smK17',
            'qaipl4smK18' => 'Qaipl4smK18',
            'qaipl4smK19' => 'Qaipl4smK19',
            'qaipl4smLqaipl5sm' => 'Qaipl4smLqaipl5sm',
            'qaipl4smLtotal' => 'Qaipl4smLtotal',
            'qaipl4smL15' => 'Qaipl4smL15',
            'qaipl4smL16' => 'Qaipl4smL16',
            'qaipl4smL17' => 'Qaipl4smL17',
            'qaipl4smL18' => 'Qaipl4smL18',
            'qaipl4smL19' => 'Qaipl4smL19',
            'qaipl4smMqaipl5sm' => 'Qaipl4smMqaipl5sm',
            'qaipl4smMtotal' => 'Qaipl4smMtotal',
            'qaipl4smM15' => 'Qaipl4smM15',
            'qaipl4smM16' => 'Qaipl4smM16',
            'qaipl4smM17' => 'Qaipl4smM17',
            'qaipl4smM18' => 'Qaipl4smM18',
            'qaipl4smM19' => 'Qaipl4smM19',
            'qaipl4smNqaipl5sm' => 'Qaipl4smNqaipl5sm',
            'qaipl4smNtotal' => 'Qaipl4smNtotal',
            'qaipl4smN15' => 'Qaipl4smN15',
            'qaipl4smN16' => 'Qaipl4smN16',
            'qaipl4smN17' => 'Qaipl4smN17',
            'qaipl4smN18' => 'Qaipl4smN18',
            'qaipl4smN19' => 'Qaipl4smN19',
            'qaipl4smOqaipl5sm' => 'Qaipl4smOqaipl5sm',
            'qaipl4smOtotal' => 'Qaipl4smOtotal',
            'qaipl4smO15' => 'Qaipl4smO15',
            'qaipl4smO16' => 'Qaipl4smO16',
            'qaipl4smO17' => 'Qaipl4smO17',
            'qaipl4smO18' => 'Qaipl4smO18',
            'qaipl4smO19' => 'Qaipl4smO19',
            'status' => 'Status',

        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];
