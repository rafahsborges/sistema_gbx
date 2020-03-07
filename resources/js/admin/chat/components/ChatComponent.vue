<template>
    <div class="row">

        <div class="col-8">
            <div class="card card-default">
                <div class="card-header">Messages</div>
                <div class="card-body p-0">
                    <ul class="list-unstyled" style="height:300px; overflow-y:scroll" v-chat-scroll>
                        <li class="p-2" v-for="(message, index) in messages" :key="index">
                            <strong>{{ message.user.nome }}</strong>
                            {{ message.message }}
                        </li>
                    </ul>
                </div>

                <div class="input-group">

                    <input
                        id="btn-input"
                        @keydown="sendTypingEvent"
                        @keyup.enter="sendMessage"
                        v-model="newMessage"
                        type="text"
                        name="message"
                        placeholder="Enter your message..."
                        class="form-control">

                    <span class="input-group-btn">
                        <button class="btn btn-primary" id="btn-chat" @click="sendMessage">
                            Send
                        </button>
                    </span>
                </div>

            </div>
            <span class="text-muted" v-if="activeUser">{{ activeUser.nome }} is typing...</span>
        </div>

        <div class="col-4">
            <div class="card card-default">
                <div class="card-header">Active Users</div>
                <div class="card-body">
                    <ul>
                        <li class="py-2" v-for="(user, index) in users" :key="index">
                            {{ user.nome }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        props: ['user'],
        data() {
            return {
                messages: [],
                newMessage: '',
                users: [],
                activeUser: false,
                typingTimer: false,
            }
        },
        created() {
            this.fetchMessages();
            window.Echo.join('chat')
                .here(user => {
                    this.users = user;
                })
                .joining(user => {
                    this.users.push(user);
                })
                .leaving(user => {
                    this.users = this.users.filter(u => u.id != user.id);
                })
                .listen('MessageSent', (e) => {
                    this.messages.push({
                        message: e.message.message,
                        user: e.user
                    });
                })
                .listenForWhisper('typing', user => {
                    this.activeUser = user;
                    if (this.typingTimer) {
                        clearTimeout(this.typingTimer);
                    }
                    this.typingTimer = setTimeout(() => {
                        this.activeUser = false;
                    }, 1000);
                })
        },
        methods: {
            fetchMessages() {
                axios.get('/admin/chats/messages').then(response => {
                    this.messages = response.data;
                });
            },

            sendMessage() {
                this.messages.push({
                    user: this.user,
                    message: this.newMessage
                });
                axios.post('/admin/chats/messages', {message: this.newMessage});
                this.newMessage = '';
            },

            sendTypingEvent() {
                window.Echo.join('chat')
                    .whisper('typing', this.user);
            }
        }
    }
</script>
