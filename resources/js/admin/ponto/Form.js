import AppForm from '../app-components/Form/AppForm';

Vue.component('ponto-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nome:  '' ,
                logradouro:  '' ,
                numero:  '' ,
                complemento:  '' ,
                bairro:  '' ,
                cidade:  '' ,
                uf:  '' ,
                cep:  '' ,
                estacao:  '' ,
                entidade:  '' ,
                latitude:  '' ,
                longitude:  '' ,
                altura:  '' ,
                id_cliente:  '' ,
                
            }
        }
    }

});