import AppForm from '../app-components/Form/AppForm';
import {VMoney} from "v-money";

Vue.component('orcamento-form', {
    mixins: [AppForm],
    props: [
        'estados',
        'cidades',
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
                cidade:  '' ,
                estado:  '' ,
                assunto:  '' ,
                conteudo:  '' ,
                enviar:  false ,
                agendar:  false ,
                agendamento:  '' ,
                enviado:  false ,
                envio:  '' ,
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
});
