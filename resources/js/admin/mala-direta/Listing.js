import AppListing from '../app-components/Listing/AppListing';

Vue.component('mala-direta-listing', {
    mixins: [AppListing],
    data() {
        return {
            showAdvancedFilter: false,
            agendadosMultiselect: {},
            enviadosMultiselect: {},

            filters: {
                agendados: [],
                enviados: [],
            },

            optionsList: [
                {nome: 'Não', id: '0'},
                {nome: 'Sim', id: '1'},
            ],
        }
    },

    watch: {
        showAdvancedFilter: function (newVal, oldVal) {
            this.agendadosMultiselect = [];
            this.enviadosMultiselect = [];
            this.dtAgendamentosMultiselect = [];
            this.dtEnviosMultiselect = [];
        },
        agendadosMultiselect: function (newVal, oldVal) {
            this.filters.agendados = newVal.map(function (object) {
                return object['id'];
            });
            this.filter('agendados', this.filters.agendados);
        },
        enviadosMultiselect: function (newVal, oldVal) {
            this.filters.enviados = newVal.map(function (object) {
                return object['id'];
            });
            this.filter('enviados', this.filters.enviados);
        },
    }
});
