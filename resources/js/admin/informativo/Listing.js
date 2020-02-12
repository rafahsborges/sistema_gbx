import AppListing from '../app-components/Listing/AppListing';

Vue.component('informativo-listing', {
    mixins: [AppListing],
    data() {
        return {
            showAdvancedFilter: false,
            servicosMultiselect: {},

            filters: {
                servicos: [],
            },
        }
    },

    watch: {
        showAdvancedFilter: function (newVal, oldVal) {
            this.servicosMultiselect = [];
        },
        servicosMultiselect: function(newVal, oldVal) {
            this.filters.servicos = newVal.map(function(object) { return object['key']; });
            this.filter('servicos', this.filters.servicos);
        },
    },
});
