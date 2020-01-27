import AppForm from '../app-components/Form/AppForm';

Vue.component('observacao-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                descricao:  '' ,

            }
        }
    }

});
