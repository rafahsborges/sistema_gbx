import AppForm from '../app-components/Form/AppForm';
import {VMoney} from 'v-money';

Vue.component('admin-user-form', {
    mixins: [AppForm],
    props: [
        'estados',
        'cidades',
    ],
    data: function () {
        return {
            form: {
                tipo: false,
                nome: '',
                razao_social: '',
                cpf: '',
                cnpj: '',
                email: '',
                email2: '',
                email3: '',
                telefone: '',
                celular: '',
                logradouro: '',
                numero: '',
                complemento: '',
                bairro: '',
                cidade: '',
                estado: '',
                cep: '',
                vencimento: '',
                valor: '',
                ini_contrato: '',
                fim_contrato: '',
                fistel: '',
                is_admin: false,
                activated: false,
                forbidden: false,
                language: '',
                enabled: false,
                password: '',
                representantes: [],
                apontamentos: [],
                pontos: [],
            },
            money: {
                decimal: ',',
                thousands: '.',
                prefix: '',
                suffix: '',
                precision: 2,
                masked: false /* doesn't work with directive */
            },
            percent: {
                decimal: ',',
                thousands: '.',
                prefix: '',
                suffix: '',
                precision: 2,
                masked: false /* doesn't work with directive */
            },
        }
    },

    directives: {
        money: VMoney,
        percent: VMoney,
    },

    methods: {
        getAddressInfo(e) {
            this.$viaCep.buscarCep(e.target.value).then((obj) => {
                this.form.logradouro = obj.logradouro;
                this.form.complemento = obj.complemento;
                this.form.bairro = obj.bairro;
                //this.form.cidade = obj.localidade;
                //this.form.estado = obj.uf;
            });
        },
        getAddressInfoPonto(e, index) {
            this.$viaCep.buscarCep(e.target.value).then((obj) => {
                this.form.pontos[index].logradouro = obj.logradouro;
                this.form.pontos[index].complemento = obj.complemento;
                this.form.pontos[index].bairro = obj.bairro;
                //this.form.pontos[index].cidade = obj.localidade;
                //this.form.pontos[index].estado = obj.uf;
            });
        },
        addRowRepresentante: function () {
            var elem = document.createElement('div');
            this.form.representantes.push({
                nome: '',
                email: '',
                telefone: '',
                celular: '',
                cargo: '',
            });
        },
        removeElementRepresentante: function (index) {
            this.form.representantes.splice(index, 1);
        },
        addRowApontamento: function () {
            var elem = document.createElement('div');
            this.form.apontamentos.push({
                descricao: '',
            });
        },
        removeElementApontamento: function (index) {
            this.form.apontamentos.splice(index, 1);
        },
        addRowPonto: function () {
            var elem = document.createElement('div');
            this.form.pontos.push({
                nome: '',
                logradouro: '',
                numero: '',
                complemento: '',
                bairro: '',
                cidade: '',
                estado: '',
                cep: '',
                estacao: '',
                entidade: '',
                latitude: '',
                longitude: '',
                altura: '',
            });
        },
        removeElementPonto: function (index) {
            this.form.pontos.splice(index, 1);
        },
    },
});
