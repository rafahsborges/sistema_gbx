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
                            :messages="messages">

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
                        <chat-form
                            v-on:messagesent="addMessage"
                            :user="{{ Auth::user() }}"
                        ></chat-form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
