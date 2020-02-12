import AppForm from '../app-components/Form/AppForm';

Vue.component('informativo-form', {
    mixins: [AppForm],
    props: [
        'servicos',
    ],
    data: function() {
        return {
            form: {
                assunto:  '' ,
                conteudo:  '' ,
                servico:  '' ,
            }
        }
    }

});
