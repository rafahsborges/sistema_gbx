import AppForm from '../app-components/Form/AppForm';

Vue.component('informativo-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                assunto:  '' ,
                conteudo:  '' ,
                id_servico:  '' ,
                
            }
        }
    }

});