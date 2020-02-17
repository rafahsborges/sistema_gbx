import AppForm from '../app-components/Form/AppForm';

Vue.component('boleto-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                valor:  '' ,
                vencimento:  '' ,
                valor_pago:  '' ,
                pagamento:  '' ,
                id_cliente:  '' ,
                status:  false ,
                
            }
        }
    }

});