import AppForm from '../app-components/Form/AppForm';

Vue.component('observaco-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                descricao:  '' ,
                
            }
        }
    }

});