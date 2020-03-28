<?php

return [
    'admin-user' => [
        'title' => 'Clientes',

        'actions' => [
            'index' => 'Clientes',
            'create' => 'Novo Cliente',
            'edit' => 'Alterar :name',
            'edit_profile' => 'Alterar Profile',
            'edit_password' => 'Alterar Password',
        ],

        'columns' => [
            'id' => 'ID',
            'tipo' => 'Tipo',
            'nome' => 'Nome',
            'razao_social' => 'Razão social',
            'cpf' => 'CPF',
            'cnpj' => 'CNPJ',
            'email' => 'E-mail',
            'email2' => 'E-mail2',
            'email3' => 'E-mail3',
            'telefone' => 'Telefone',
            'celular' => 'Celular',
            'logradouro' => 'Logradouro',
            'numero' => 'Número',
            'complemento' => 'Complemento',
            'bairro' => 'Bairro',
            'id_cidade' => 'Cidade',
            'id_estado' => 'UF',
            'cep' => 'CEP',
            'vencimento' => 'Vencimento',
            'valor' => 'Valor',
            'ini_contrato' => 'Início contrato',
            'fim_contrato' => 'Fim contrato',
            'fistel' => 'Fistel',
            'is_admin' => 'É administrador?',
            'activated' => 'Ativado',
            'forbidden' => 'Bloqueado',
            'language' => 'Idioma',
            'enabled' => 'Ativo',
            'password' => 'Senha',
            'password_repeat' => 'Confirmação',
            'id_servico' => 'Serviço',
            'desconto' => 'Desconto',

            //Belongs to many relations
            'roles' => 'Regras',
        ],
    ],

    'representante' => [
        'title' => 'Representantes',

        'actions' => [
            'index' => 'Representantes',
            'create' => 'Novo Representante',
            'edit' => 'Alterar :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'email' => 'E-mail',
            'telefone' => 'Telefone',
            'celular' => 'Celular',
            'cargo' => 'Cargo',
            'id_cliente' => 'Cliente',
        ],
    ],

    'ponto' => [
        'title' => 'Pontos',

        'actions' => [
            'index' => 'Pontos',
            'create' => 'Novo Ponto',
            'edit' => 'Alterar :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'logradouro' => 'Logradouro',
            'numero' => 'Número',
            'complemento' => 'Complemento',
            'bairro' => 'Bairro',
            'id_cidade' => 'Cidade',
            'id_estado' => 'UF',
            'cep' => 'CEP',
            'estacao' => 'Estação',
            'entidade' => 'Entidade',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'altura' => 'Altura',
            'id_cliente' => 'Cliente',
        ],
    ],

    'apontamento' => [
        'title' => 'Observações',

        'actions' => [
            'index' => 'Observações',
            'create' => 'Novo Observação',
            'edit' => 'Alterar :name',
        ],

        'columns' => [
            'id' => 'ID',
            'descricao' => 'Descrição',
            'id_cliente' => 'Cliente',
        ],
    ],

    'estado' => [
        'title' => 'Estados',

        'actions' => [
            'index' => 'Estados',
            'create' => 'Novo Estado',
            'edit' => 'Alterar :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'abreviacao' => 'Abreviação',
            'enabled' => 'Ativado',
        ],
    ],

    'cidade' => [
        'title' => 'Cidades',

        'actions' => [
            'index' => 'Cidades',
            'create' => 'Novo Cidade',
            'edit' => 'Alterar :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'ibge_code' => 'Código IBGE',
            'id_estado' => 'UF',
            'enabled' => 'Ativado',
        ],
    ],

    'status' => [
        'title' => 'Status',

        'actions' => [
            'index' => 'Status',
            'create' => 'Novo Status',
            'edit' => 'Alterar :name',
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
            'create' => 'Novo Etapa',
            'edit' => 'Alterar :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'id_servico' => 'Serviço',
            'id_status' => 'Status',
        ],
    ],

    'item' => [
        'title' => 'Itens',

        'actions' => [
            'index' => 'Itens',
            'create' => 'Novo Item',
            'edit' => 'Alterar :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'id_etapa' => 'Etapa',
            'id_status' => 'Status',
        ],
    ],

    'servico' => [
        'title' => 'Servicos',

        'actions' => [
            'index' => 'Servicos',
            'create' => 'Novo Serviço',
            'edit' => 'Alterar :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'valor' => 'Valor',
            'orgao' => 'Orgão',
            'descricao' => 'Descrição',
            'id_etapa' => 'Etapa',
            'id_status' => 'Status',
            'observacao' => 'Observação',
            'documento' => 'Tem documentos?',
            'valido' => 'Documentos válidos?',
        ],
    ],

    'notification' => [
        'title' => 'Notificações',

        'actions' => [
            'index' => 'Notificações',
            'create' => 'Novo Notificação',
            'show' => 'Show Notificação',
            'edit' => 'Alterar :name',
        ],

        'columns' => [
            'id' => 'ID',
            'assunto' => 'Assunto',
            'conteudo' => 'Conteúdo',
            'id_cliente' => 'Cliente',
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
            'create' => 'Novo Informativo',
            'edit' => 'Alterar :name',
            'show' => 'Show :name',
        ],

        'columns' => [
            'id' => 'ID',
            'assunto' => 'Assunto',
            'conteudo' => 'Conteudo',
            'id_servico' => 'Serviço',
        ],
    ],

    'mala-direta' => [
        'title' => 'Mala Diretas',

        'actions' => [
            'index' => 'Mala Diretas',
            'create' => 'Novo Mala Direta',
            'edit' => 'Alterar :name',
        ],

        'columns' => [
            'id' => 'ID',
            'assunto' => 'Assunto',
            'conteudo' => 'Conteudo',
            'id_cliente' => 'Cliente',
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
            'create' => 'Novo Orcamento',
            'edit' => 'Alterar :name',
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
            'create' => 'Novo Boleto',
            'edit' => 'Alterar :name',
            'boleto' => 'Gerar Boleto',
        ],

        'columns' => [
            'id' => 'ID',
            'descricao' => 'Descrição',
            'valor' => 'Valor',
            'vencimento' => 'Vencimento',
            'dias_vencimento' => 'Dias Após o Vencimento',
            'valor_pago' => 'Valor pago',
            'pagamento' => 'Pagamento',
            'id_cliente' => 'Cliente',
            'id_servico' => 'Serviço',
            'gerar' => 'Gerar Boleto',
            'notificar' => 'Notificar via E-mail?',
            'status' => 'Status',
            'desconto' => 'Desconto',
            'dias_desconto' => 'Dias de Desconto',
            'juros' => 'Juros',
            'multa' => 'Multa',
            'parcelas' => 'Parcelas',
        ],
    ],

    'chat' => [
        'title' => 'Chats',

        'actions' => [
            'index' => 'Chats',
        ],
    ],

    'sici' => [
        'title' => 'Sicis',

        'actions' => [
            'index' => 'Sicis',
            'create' => 'Novo Sici',
            'edit' => 'Alterar :name',
        ],

        'columns' => [
            'id' => 'ID',
            'ano' => 'Ano',
            'mes' => 'Mês',
            'id_cliente' => 'Autorizada',
            'id_servico' => 'Serviço',
            'fistel' => 'Fistel',
            'id_cidade' => 'Município',
            'id_estado' => 'UF',
            'iem1a' => 'Investimento na Planta',
            'iem1b' => 'Valor total em reais de capital aplicado em Marketing/Propaganda',
            'iem1c' => 'Aplicação em Equipamento',
            'iem1d' => 'Aplicação em Software',
            'iem1e' => 'Valor total em Reais de capital aplicado em P&D',
            'iem1f' => 'Aplicação em Serviços',
            'iem1g' => 'Valor total em Reais de capital aplicado em Call-Center ou qualquer tipo de central de atendimento',
            'iem2a' => 'Faturamento com prestação do serviço',
            'iem2b' => 'Faturamento bruto decorrente da exploração industrial de serviços de telecomunicações',
            'iem2c' => 'Faturamento bruto decorrente do provimento de serviços de valor adicionado',
            'iem3a' => 'Valor consolidado do investimento realizado',
            'iem4a' => 'Quantidade de Empregados Contratados Diretamente',
            'iem5a' => 'Quantidade de Empregados de Empresas Terceirizadas',
            'iem6a' => 'Receita operacional bruta total',
            'iem7a' => 'Receita operacional líquida total',
            'iem8a' => 'Valor total em reais dos custos',
            'iem8b' => 'Despesas envolvendo operação e manutenção',
            'iem8c' => 'Despesas envolvendo publicidade',
            'iem8d' => 'Despesas envolvendo vendas',
            'iem8e' => 'Despesas envolvendo interconexão',
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
            'ipl1a' => 'Total de cabo de fibra otica de propriedade da Prestadora em KM',
            'ipl1b' => 'Total de cabo de fibra otica de propriedade de Terceiros em KM',
            'ipl1c' => 'Crescimento previsto do cabo de fibra otica de propriedade da Prestadora em KM',
            'ipl1d' => 'Crescimento previsto do cabo de fibra otica de propriedade de Terceiros em KM',
            'ipl2a' => 'Total de fibra otica implantada pela Prestadora em KM',
            'ipl2b' => 'Total de fibra otica implantada por Terceiros em KM',
            'ipl2c' => 'Crescimento previsto de cabo de fibra otica da Prestadora em KM',
            'ipl2d' => 'Crescimento previsto de cabo de fibra otica de Terceirizada em KM',
            'ipl3Fa' => 'Total de Acessos',
            'ipl3Ja' => 'Total de Acessos',
            'ipl6im' => 'Capacidade Total do Sistema Implantada e em Serviço Total',
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
