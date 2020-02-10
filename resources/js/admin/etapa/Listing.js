import AppListing from '../app-components/Listing/AppListing';

Vue.component('etapa-listing', {
    mixins: [AppListing],
    data() {
        return {
            showAdvancedFilter: false,
            statusesMultiselect: {},
            servicosMultiselect: {},

            filters: {
                statuses: [],
                servicos: [],
            },
        }
    },

    watch: {
        showAdvancedFilter: function (newVal, oldVal) {
            this.statusesMultiselect = [];
            this.servicosMultiselect = [];
        },
        statusesMultiselect: function(newVal, oldVal) {
            this.filters.statuses = newVal.map(function(object) { return object['key']; });
            this.filter('statuses', this.filters.statuses);
        },
        servicosMultiselect: function(newVal, oldVal) {
            this.filters.servicos = newVal.map(function(object) { return object['key']; });
            this.filter('servicos', this.filters.servicos);
        }
    }
});
