import AppForm from '../app-components/Form/AppForm';

Vue.component('servico-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nome:  '' ,
                valor:  '' ,
                orgao:  '' ,
                descricao:  '' ,
                status:  '' ,
                
            }
        }
    }

});