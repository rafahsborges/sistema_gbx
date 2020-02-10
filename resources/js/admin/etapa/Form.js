import AppForm from '../app-components/Form/AppForm';

Vue.component('etapa-form', {
    mixins: [AppForm],
    props: [
        'statuses'
    ],
    data: function() {
        return {
            form: {
                nome:  '' ,
                servico:  '' ,
                status:  '' ,
            }
        }
    }

});
