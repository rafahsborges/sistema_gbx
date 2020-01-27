import AppForm from '../app-components/Form/AppForm';

Vue.component('admin-user-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
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
                uf:  '' ,
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
                
            }
        }
    }
});