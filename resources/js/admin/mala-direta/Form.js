import AppForm from '../app-components/Form/AppForm';

Vue.component('mala-direta-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                assunto:  '' ,
                conteudo:  '' ,
                id_cliente:  '' ,
                agendar:  false ,
                agendamento:  '' ,
                enviado:  false ,
                envio:  '' ,
                
            }
        }
    }

});