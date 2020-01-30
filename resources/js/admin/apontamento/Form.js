import AppForm from '../app-components/Form/AppForm';

Vue.component('apontamento-form', {
    mixins: [AppForm],
    props: ['clientes'],
    data: function() {
        return {
            form: {
                descricao:  '' ,
                cliente:  '' ,
            }
        }
    }

});
