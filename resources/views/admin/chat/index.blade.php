@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.chat.actions.index'))

@section('body')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Chats</div>

                    <div class="panel-body">
                        <chat-listing
                            :messages="messages"
                            :url="'{{ url('admin/messages') }}'"
                            inline-template>
                            <template>
                                <ul class="chat">
                                    <li class="left clearfix" v-for="message in messages">
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="primary-font">
                                                    @{{ message.user.name }}
                                                </strong>
                                            </div>
                                            <p>
                                                @{{ message.message }}
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </template>
                        </chat-listing>
                    </div>
                    <div class="panel-footer">
                        {{--<chat-form
                            v-on:messagesent="addMessage"
                            :user="{{ Auth::user() }}"
                            v-cloak
                            inline-template>

                            <template>
                                <div class="input-group">
                                    <input id="btn-input" type="text" name="message" class="form-control input-sm"
                                           placeholder="Type your message here..." v-model="newMessage"
                                           @keyup.enter="sendMessage">

                                    <span class="input-group-btn">
                                        <button class="btn btn-primary btn-sm" id="btn-chat" @click="sendMessage">
                                            Send
                                        </button>
                                    </span>
                                </div>
                            </template>

                        </chat-form>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
