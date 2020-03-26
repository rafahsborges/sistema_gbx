@extends('brackets/admin-ui::admin.layout.default')

@section('body')

    @include('admin.home.components.boletos')

    @if(auth()->user()->is_admin === 1)
        @include('admin.home.components.servicos')
    @endif

@endsection
