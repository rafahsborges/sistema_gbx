import AppForm from '../app-components/Form/AppForm';
import {VMoney} from 'v-money';

Vue.component('profile-edit-profile-form', {
    mixins: [AppForm],
    props: [
        'estados',
        'cidades',
        'servicos',
    ],
    data: function() {
        return {
            form: {
                tipo:  false ,
                nome:  '' ,
                razao_social:  '' ,
                cpf:  '' ,
                cnpj:  '' ,
                email:  '' ,
                email2:  '' ,
                email3:  '' ,
                telefone:  '' ,
                celular:  '' ,
                logradouro:  '' ,
                numero:  '' ,
                complemento:  '' ,
                bairro:  '' ,
                cidade:  '' ,
                estado:  '' ,
                cep:  '' ,
                vencimento:  '' ,
                valor:  '' ,
                ini_contrato:  '' ,
                fim_contrato:  '' ,
                fistel:  '' ,
                is_admin:  false ,
                activated:  false ,
                forbidden:  false ,
                language:  '' ,
                enabled:  false ,
                password:  '' ,
                servico: '',
                desconto: '',

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
            mediaCollections: ['avatar']
        }
    },

    directives: {
        money: VMoney,
        percent: VMoney,
    },

    methods: {
        onSuccess(data) {
            if(data.notify) {
                this.$notify({ type: data.notify.type, title: data.notify.title, text: data.notify.message});
            } else if (data.redirect) {
                window.location.replace(data.redirect);
            }
        },
        getAddressInfo(e){
            this.$viaCep.buscarCep(e.target.value).then((obj) => {
                this.form.logradouro = obj.logradouro;
                this.form.complemento = obj.complemento;
                this.form.bairro = obj.bairro;
                //this.form.cidade = obj.localidade;
                //this.form.estado = obj.uf;
            });
        }
    }
});
