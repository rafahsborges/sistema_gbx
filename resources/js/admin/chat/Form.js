import AppForm from '../app-components/Form/AppForm';

Vue.component('chat-form', {
    mixins: [AppForm],
    props: ['cliente'],
    data: function () {
        return {
            form: {
                newMessage: '',
            }
        }
    },

    methods: {
        sendMessage() {
            this.$emit('messagesent', {
                cliente: this.cliente,
                message: this.form.newMessage
            });

            this.form.newMessage = '';
        }
    }

});
