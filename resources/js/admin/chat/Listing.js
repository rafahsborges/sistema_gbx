Vue.component('chat-messages', {
    props: ['messages'],

    template: `
        <ul class="chat">
            <li class="left clearfix" v-for="message in messages">
                <div class="chat-body clearfix">
                    <div class="header">
                        <strong class="primary-font">
                            {{ message.user.nome }}
                        </strong>
                    </div>
                    <p>
                        {{ message.message }}
                    </p>
                </div>
            </li>
        </ul>
    `,

});
