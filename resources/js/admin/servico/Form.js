import AppForm from '../app-components/Form/AppForm';
import {VMoney} from 'v-money';

Vue.component('servico-form', {
    mixins: [AppForm],
    props: [
        'statuses',
        'etapas'
    ],
    data: function() {
        return {
            form: {
                nome:  '' ,
                valor:  '' ,
                orgao:  '' ,
                descricao:  '' ,
                etapa:  '' ,
                status:  '' ,
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
