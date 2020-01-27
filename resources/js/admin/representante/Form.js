import AppForm from '../app-components/Form/AppForm';

Vue.component('representante-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nome:  '' ,
                email:  '' ,
                telefone:  '' ,
                celular:  '' ,
                cargo:  '' ,
                
            }
        }
    }

});