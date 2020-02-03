import AppForm from '../app-components/Form/AppForm';

Vue.component('etapa-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nome:  '' ,
                id_status:  '' ,
                
            }
        }
    }

});