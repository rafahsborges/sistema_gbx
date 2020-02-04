import AppListing from '../app-components/Listing/AppListing';

Vue.component('servico-listing', {
    mixins: [AppListing],
    data() {
        return {
            showAdvancedFilter: false,
            statusesMultiselect: {},
            etapasMultiselect: {},

            filters: {
                statuses: [],
                etapas: [],
            },
        }
    },

    watch: {
        showAdvancedFilter: function (newVal, oldVal) {
            this.statusesMultiselect = [];
            this.etapasMultiselect = [];
        },
        statusesMultiselect: function(newVal, oldVal) {
            this.filters.statuses = newVal.map(function(object) { return object['key']; });
            this.filter('statuses', this.filters.statuses);
        },
        etapasMultiselect: function(newVal, oldVal) {
            this.filters.etapas = newVal.map(function(object) { return object['key']; });
            this.filter('etapas', this.filters.etapas);
        }
    }
});
