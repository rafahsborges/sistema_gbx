@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.admin-user.actions.edit', ['name' => $adminUser->email]))

@section('body')

    <div class="container-xl">

        <admin-user-form
            :action="'{{ $adminUser->resource_url }}'"
            :data="{{ $adminUser->toJson() }}"
            :activation="!!'{{ $activation }}'"
            v-cloak
            inline-template>

            <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action"
                  novalidate>

                <div class="row">
                    <div class="col">
                        @include('admin.admin-user.components.form-elements')
                    </div>

                    <div class="col-md-12 col-lg-12 col-xl-5 col-xxl-4">
                        @include('admin.admin-user.components.form-elements-right')
                    </div>
                </div>

                <button type="submit" class="btn btn-primary fixed-cta-button" :disabled="submiting">
                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-save'"></i>
                    {{ trans('brackets/admin-ui::admin.btn.save') }}
                </button>

            </form>

        </admin-user-form>

    </div>

@endsection
