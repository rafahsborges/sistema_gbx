import AppListing from '../app-components/Listing/AppListing';

Vue.component('boleto-listing', {
    mixins: [AppListing],
    data() {
        return {
            showAdvancedFilter: false,
            clientesMultiselect: {},
            servicosMultiselect: {},
            statusMultiselect: {},

            filters: {
                clientes: [],
                servicos: [],
            },

            statuses: [
                {nome: 'A pagar', id: '0'},
                {nome: 'Pago', id: '1'},
                {nome: 'Vencido', id: '2'},
                {nome: 'Cancelado', id: '3'},
            ],
        }
    },

    watch: {
        showAdvancedFilter: function (newVal, oldVal) {
            this.clientesMultiselect = [];
            this.servicosMultiselect = [];
            this.statusMultiselect = [];
        },
        clientesMultiselect: function(newVal, oldVal) {
            this.filters.clientes = newVal.map(function(object) { return object['key']; });
            this.filter('clientes', this.filters.clientes);
        },
        servicosMultiselect: function(newVal, oldVal) {
            this.filters.servicos = newVal.map(function(object) { return object['key']; });
            this.filter('servicos', this.filters.servicos);
        },
        statusMultiselect: function (newVal, oldVal) {
            this.filters.status = newVal.map(function (object) {
                return object['id'];
            });
            this.filter('status', this.filters.status);
        },
    }
});
