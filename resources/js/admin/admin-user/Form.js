import AppForm from '../app-components/Form/AppForm';

Vue.component('admin-user-form', {
    mixins: [AppForm],
    props: [
        'estados',
        'cidades',
    ],
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
                logradouro:  '' ,
                numero:  '' ,
                complemento:  '' ,
                bairro:  '' ,
                cidade:  '' ,
                estado:  '' ,
                cep:  '' ,
                vencimento:  '' ,
                valor:  '' ,
                ini_contrato:  '' ,
                fim_contrato:  '' ,
                fistel:  '' ,
                is_admin:  false ,
                activated:  false ,
                forbidden:  false ,
                language:  '' ,
                enabled:  false ,
                password:  '' ,
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
