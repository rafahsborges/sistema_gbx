@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.notification.actions.show', ['name' => $notification->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <notification-form
                :action="'{{ $notification->resource_url }}'"
                :data="{{ $notification->toJson() }}"
                :clientes="{{ $clientes->toJson() }}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action"
                      novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.notification.actions.edit', ['name' => $notification->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.notification.components.form-elements')
                    </div>

                </form>

            </notification-form>

        </div>

    </div>

@endsection
