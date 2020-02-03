@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.admin-user.actions.edit_profile'))

@section('body')

    <div class="container-xl">

        <div class="card">

            <profile-edit-profile-form
                :action="'{{ url('admin/profile') }}'"
                :data="{{ $adminUser->toJson() }}"
                :estados="{{$estados->toJson()}}"
                :cidades="{{$cidades->toJson()}}"
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action">

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.admin-user.actions.edit_profile') }}
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-4 text-center">
                                <div class="avatar-upload">
                                    @include('brackets/admin-ui::admin.includes.avatar-uploader', [
                                        'mediaCollection' => app(\Brackets\AdminAuth\Models\AdminUser::class)->getMediaCollection('avatar'),
                                        'media' => $adminUser->getThumbs200ForCollection('avatar')
                                    ])
                                </div>
                            </div>
                            <div class="col-md-8">

                                @include('admin.profile.components.form-elements')

                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>

                </form>

            </profile-edit-profile-form>

        </div>

    </div>

@endsection
