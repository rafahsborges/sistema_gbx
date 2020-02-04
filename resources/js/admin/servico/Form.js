import AppForm from '../app-components/Form/AppForm';

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
            }
        }
    }

});
