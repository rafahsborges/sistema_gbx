import AppForm from '../app-components/Form/AppForm';

Vue.component('apontamento-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                descricao:  '' ,
                id_cliente:  '' ,
                
            }
        }
    }

});