@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.chat.actions.index'))

@section('body')

    <div class="container">
        <chat-component :user="{{ auth()->user() }}"></chat-component>
    </div>

@endsection
