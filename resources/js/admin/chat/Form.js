import AppForm from '../app-components/Form/AppForm';

Vue.component('chat-form', {
    mixins: [AppForm],
    props: ['messages'],
    data: function () {
        return {
            form: {
                descricao: '',
                cliente: '',
            }
        }
    }

});
