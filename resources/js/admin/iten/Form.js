import AppForm from '../app-components/Form/AppForm';

Vue.component('iten-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nome:  '' ,
                id_etapa:  '' ,
                id_status:  '' ,
                
            }
        }
    }

});