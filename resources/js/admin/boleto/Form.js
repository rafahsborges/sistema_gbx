import AppForm from '../app-components/Form/AppForm';

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
                status: false,
            },
            statuses: [
                {nome: 'A pagar', id: '0'},
                {nome: 'Pago', id: '1'},
                {nome: 'Vencido', id: '2'},
            ],
        }
    },
});
