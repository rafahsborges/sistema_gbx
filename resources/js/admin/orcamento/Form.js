import AppForm from '../app-components/Form/AppForm';

Vue.component('orcamento-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                tipo:  false ,
                nome:  '' ,
                razao_social:  '' ,
                cpf:  '' ,
                cnpj:  '' ,
                email:  '' ,
                email2:  '' ,
                email3:  '' ,
                telefone:  '' ,
                celular:  '' ,
                id_cidade:  '' ,
                id_estado:  '' ,
                assunto:  '' ,
                conteudo:  '' ,
                agendar:  false ,
                agendamento:  '' ,
                enviado:  false ,
                envio:  '' ,
                
            }
        }
    }

});