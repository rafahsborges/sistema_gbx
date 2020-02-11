import AppListing from '../app-components/Listing/AppListing';

Vue.component('chat-listing', {
    mixins: [AppListing],
    props: [
        'messages'
    ],
    data() {
        return {
            messagesList: [],
        }
    },

    created() {
        this.fetchMessages();
        Echo.private('chat')
            .listen('MessageSent', (e) => {
                this.messagesList.push({
                    message: e.message.message,
                    cliente: e.cliente
                });
            });
    },

    methods: {
        fetchMessages() {
            axios.get('/messages').then(response => {
                this.messagesList = response.data;
            });
        },
    },
});
