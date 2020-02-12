import AppForm from '../app-components/Form/AppForm';

Vue.component('mala-direta-form', {
    mixins: [AppForm],
    props: [
        'clientes',
    ],
    data: function() {
        return {
            form: {
                assunto:  '' ,
                conteudo:  '' ,
                cliente:  '' ,
                agendar:  false ,
                agendamento:  '' ,
                enviado:  false ,
                envio:  '' ,
            }
        }
    },
});
