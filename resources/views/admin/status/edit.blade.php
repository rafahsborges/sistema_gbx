@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.status.actions.edit', ['name' => $status->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <status-form
                :action="'{{ $status->resource_url }}'"
                :data="{{ $status->toJson() }}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action"
                      novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.status.actions.edit', ['name' => $status->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.status.components.form-elements')
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>

                </form>

            </status-form>

        </div>

    </div>

@endsection
