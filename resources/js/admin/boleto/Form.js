import AppForm from '../app-components/Form/AppForm';
import {VMoney} from "v-money";

Vue.component('boleto-form', {
    mixins: [AppForm],
    props: [
        'clientes',
        'servicos',
    ],
    data: function () {
        return {
            form: {
                descricao: '',
                valor: '',
                vencimento: '',
                dias_vencimento: '',
                valor_pago: '',
                pagamento: '',
                cliente: '',
                servico: '',
                gerar: true,
                notificar: true,
                status: '',
                parcelas: '1',
                desconto: '',
                dias_desconto: '',
                juros: '',
                multa: '',
            },
            statuses: [
                {nome: 'Pendente', id: '0'},
                {nome: 'Pago', id: '1'},
                {nome: 'Vencido', id: '2'},
                {nome: 'Cancelado', id: '3'},
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
