import AppForm from '../app-components/Form/AppForm';

Vue.component('ponto-form', {
    mixins: [AppForm],
    props: ['clientes'],
    data: function() {
        return {
            form: {
                nome:  '' ,
                logradouro:  '' ,
                numero:  '' ,
                complemento:  '' ,
                bairro:  '' ,
                id_cidade  '' ,
                id_estado  '' ,
                cep:  '' ,
                estacao:  '' ,
                entidade:  '' ,
                latitude:  '' ,
                longitude:  '' ,
                altura:  '' ,
                cliente:  '' ,
            },
            ufList: [
                {nome: 'Acre', id: 'AC'},
                {nome: 'Alagoas', id: 'AL'},
                {nome: 'Amapá', id: 'AP'},
                {nome: 'Amazonas', id: 'AM'},
                {nome: 'Bahia', id: 'BA'},
                {nome: 'Ceará', id: 'CE'},
                {nome: 'Distrito Federal', id: 'DF'},
                {nome: 'Espírito Santo', id: 'ES'},
                {nome: 'Goiás', id: 'GO'},
                {nome: 'Maranhão', id: 'MA'},
                {nome: 'Mato Grosso', id: 'MT'},
                {nome: 'Mato Grosso do Sul', id: 'MS'},
                {nome: 'Minas Gerais', id: 'MG'},
                {nome: 'Pará', id: 'PA'},
                {nome: 'Paraíba', id: 'PB'},
                {nome: 'Paraná', id: 'PR'},
                {nome: 'Pernambuco', id: 'PE'},
                {nome: 'Piauí', id: 'PI'},
                {nome: 'Rio de Janeiro', id: 'RJ'},
                {nome: 'Rio Grande do Norte', id: 'RN'},
                {nome: 'Rio Grande do Sul', id: 'RS'},
                {nome: 'Rondônia', id: 'RO'},
                {nome: 'Roraima', id: 'RR'},
                {nome: 'Santa Catarina', id: 'SC'},
                {nome: 'São Paulo', id: 'SP'},
                {nome: 'Sergipe', id: 'SE'},
                {nome: 'Tocantins', id: 'TO'},
            ],
        }
    }

});
