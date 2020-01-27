<div class="card">

    <div class="card-header">
        <i class="fa fa-plus"></i> {{ trans('admin.admin-user.columns.password') }}
    </div>

    <div class="card-block">

        <div class="form-group row align-items-center"
             :class="{'has-danger': errors.has('password'), 'has-success': fields.password && fields.password.valid }">
            <label for="password" class="col-form-label text-md-right"
                   :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.admin-user.columns.password') }}</label>
            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                <input type="password" v-model="form.password" v-validate="'min:7'" @input="validate($event)"
                       class="form-control"
                       :class="{'form-control-danger': errors.has('password'), 'form-control-success': fields.password && fields.password.valid}"
                       id="password" name="password" placeholder="{{ trans('admin.admin-user.columns.password') }}"
                       ref="password">
                <div v-if="errors.has('password')" class="form-control-feedback form-text" v-cloak>@{{
                    errors.first('password')
                    }}
                </div>
            </div>
        </div>

        <div class="form-group row align-items-center"
             :class="{'has-danger': errors.has('password_confirmation'), 'has-success': fields.password_confirmation && fields.password_confirmation.valid }">
            <label for="password_confirmation" class="col-form-label text-md-right"
                   :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.admin-user.columns.password_repeat') }}</label>
            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                <input type="password" v-model="form.password_confirmation" v-validate="'confirmed:password|min:7'"
                       @input="validate($event)" class="form-control"
                       :class="{'form-control-danger': errors.has('password_confirmation'), 'form-control-success': fields.password_confirmation && fields.password_confirmation.valid}"
                       id="password_confirmation" name="password_confirmation"
                       placeholder="{{ trans('admin.admin-user.columns.password') }}" data-vv-as="password">
                <div v-if="errors.has('password_confirmation')" class="form-control-feedback form-text" v-cloak>@{{
                    errors.first('password_confirmation') }}
                </div>
            </div>
        </div>

    </div>
</div>

<div class="card">

    <div class="card-header">
        <i class="fa fa-plus"></i> {{ trans('admin.admin-user.columns.password') }}
    </div>

    <div class="card-block">

    </div>

</div>

<div class="card">

    <div class="card-header">
        <i class="fa fa-plus"></i> {{ trans('admin.admin-user.columns.password') }}
    </div>

    <div class="card-block">

    </div>

</div>
