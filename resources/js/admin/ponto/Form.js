import AppForm from '../app-components/Form/AppForm';

Vue.component('ponto-form', {
    mixins: [AppForm],
    props: [
        'clientes',
        'estados',
        'cidades',
    ],
    data: function() {
        return {
            form: {
                nome:  '' ,
                logradouro:  '' ,
                numero:  '' ,
                complemento:  '' ,
                bairro:  '' ,
                cidade:  '' ,
                estado:  '' ,
                cep:  '' ,
                estacao:  '' ,
                entidade:  '' ,
                latitude:  '' ,
                longitude:  '' ,
                altura:  '' ,
                cliente:  '' ,
            },
        }
    }

});
