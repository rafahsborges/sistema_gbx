@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.notification.actions.edit', ['name' => $notification->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <notification-form
                :action="'{{ $notification->resource_url }}'"
                :data="{{ $notification->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.notification.actions.edit', ['name' => $notification->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.notification.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </notification-form>

        </div>
    
</div>

@endsection