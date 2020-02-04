import AppListing from '../app-components/Listing/AppListing';

Vue.component('etapa-listing', {
    mixins: [AppListing],
    data() {
        return {
            showAdvancedFilter: false,
            statusesMultiselect: {},

            filters: {
                statuses: [],
            },
        }
    },

    watch: {
        showAdvancedFilter: function (newVal, oldVal) {
            this.statusesMultiselect = [];
        },
        statusesMultiselect: function(newVal, oldVal) {
            this.filters.statuses = newVal.map(function(object) { return object['key']; });
            this.filter('statuses', this.filters.statuses);
        }
    }
});
