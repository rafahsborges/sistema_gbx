import AppListing from '../app-components/Listing/AppListing';

Vue.component('boleto-listing', {
    mixins: [AppListing],
    data() {
        return {
            showAdvancedFilter: false,
            clientesMultiselect: {},
            servicosMultiselect: {},

            filters: {
                clientes: [],
                servicos: [],
            },
        }
    },

    watch: {
        showAdvancedFilter: function (newVal, oldVal) {
            this.clientesMultiselect = [];
            this.servicosMultiselect = [];
        },
        clientesMultiselect: function(newVal, oldVal) {
            this.filters.clientes = newVal.map(function(object) { return object['key']; });
            this.filter('clientes', this.filters.clientes);
        },
        servicosMultiselect: function(newVal, oldVal) {
            this.filters.servicos = newVal.map(function(object) { return object['key']; });
            this.filter('servicos', this.filters.servicos);
        }
    }
});
