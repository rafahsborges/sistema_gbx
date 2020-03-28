import AppForm from '../app-components/Form/AppForm';
import {VMoney} from 'v-money';

Vue.component('servico-form', {
    mixins: [AppForm],
    props: [
        'statuses',
        'etapas'
    ],
    data: function() {
        return {
            form: {
                nome:  '' ,
                valor:  '' ,
                orgao:  '' ,
                descricao:  '' ,
                etapa:  '' ,
                status:  '' ,
                observacao:  '' ,
                documento:  false ,
                valido:  false ,
                etapas: [],
            },
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

    methods: {
        addRowEtapa: function() {
            var elem = document.createElement('div');
            this.form.etapas.push({
                nome:  '' ,
                status:  '' ,
                itens: [],
            });
        },
        removeElementEtapa: function(index) {
            this.form.etapas.splice(index, 1);
        },
        addRowItem: function(index) {
            var elem = document.createElement('div');
            this.form.etapas[index].itens.push({
                nome:  '' ,
                status:  '' ,
            });
        },
        removeElementItem: function(indexIt) {
            this.form.etapas.itens.splice(indexIt, 1);
        },
    }

});
