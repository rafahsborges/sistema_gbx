import AppForm from '../app-components/Form/AppForm';

Vue.component('item-form', {
    mixins: [AppForm],
    props: [
        'statuses',
        'etapas'
    ],
    data: function() {
        return {
            form: {
                nome:  '' ,
                etapa:  '' ,
                status:  '' ,
            }
        }
    }

});
