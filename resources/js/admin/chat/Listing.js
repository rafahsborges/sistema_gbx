import AppListing from '../app-components/Listing/AppListing';

Vue.component('chat-listing', {
    mixins: [AppListing],
    props: [
        'messages'
    ],
    data() {
        return {
            messages: [],
        }
    },

    created() {
        this.fetchMessages();
        Echo.private('chat')
            .listen('MessageSent', (e) => {
                this.messages.push({
                    message: e.message.message,
                    cliente: e.cliente
                });
            });
    },

    methods: {
        fetchMessages() {
            axios.get('/messages').then(response => {
                this.messages = response.data;
            });
        },
    },
});
