import AppForm from '../app-components/Form/AppForm';

Vue.component('ponto-form', {
    mixins: [AppForm],
    props: ['clientes'],
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
                cliente:  '' ,
            }
        }
    }

});
