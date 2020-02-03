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
    },
    methods: {
        getAddressInfo(e){
            this.$viaCep.buscarCep(e.target.value).then((obj) => {
                this.form.logradouro = obj.logradouro;
                this.form.complemento = obj.complemento;
                this.form.bairro = obj.bairro;
                //this.form.cidade = obj.localidade;
                //this.form.estado = obj.uf;
            });
        }
    },
});
