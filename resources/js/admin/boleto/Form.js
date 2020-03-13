import AppForm from '../app-components/Form/AppForm';
import {VMoney} from "v-money";

Vue.component('boleto-form', {
    mixins: [AppForm],
    props: [
        'clientes',
    ],
    data: function () {
        return {
            form: {
                valor: '',
                vencimento: '',
                valor_pago: '',
                pagamento: '',
                cliente: '',
                status: '',
            },
            statuses: [
                {nome: 'A pagar', id: '0'},
                {nome: 'Pago', id: '1'},
                {nome: 'Vencido', id: '2'},
            ],
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
