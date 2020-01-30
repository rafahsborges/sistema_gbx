import AppListing from '../app-components/Listing/AppListing';

Vue.component('apontamento-listing', {
    mixins: [AppListing],
    data() {
        return {
            showAdvancedFilter: false,
            clientesMultiselect: {},

            filters: {
                clientes: [],
            },
        }
    },

    watch: {
        showAdvancedFilter: function (newVal, oldVal) {
            this.clientesMultiselect = [];
        },
        clientesMultiselect: function(newVal, oldVal) {
            this.filters.clientes = newVal.map(function(object) { return object['key']; });
            this.filter('clientes', this.filters.clientes);
        }
    }
});
