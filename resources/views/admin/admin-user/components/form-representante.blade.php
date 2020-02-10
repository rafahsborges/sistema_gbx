<div class="card" v-if="Object.keys(data).length === 0">

    <div class="card-header">
        <i class="fa fa-align-justify"></i> {{ trans('admin.representante.actions.index') }}
        <button type="button" class="btn btn-primary btn-sm pull-right m-b-0" @click="addRowRepresentante"><i
                class="fa fa-plus"></i>&nbsp; {{ trans('admin.representante.actions.create') }}</button>
    </div>

    <div class="card-body">

        <div v-for="(row, index) in form.representantes">

            <div class="row">
                <div class="col-12">
                    <button type="button" class="btn btn-danger btn-sm pull-right m-b-0"
                            v-on:click="removeElementRepresentante(index)"><i
                            class="fa fa-plus"></i> {{ trans('brackets/admin-ui::admin.btn.delete') }}</button>
                </div>
            </div>

            <div class="form-group row align-items-center"
                 :class="{'has-danger': errors.has('nome'), 'has-success': fields.nome && fields.nome.valid }">
                <label for="nome" class="col-form-label text-md-right"
                       :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.representante.columns.nome') }}</label>
                <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                    <input type="text" v-model="row.nome" v-validate="'required'" @input="validate($event)"
                           class="form-control"
                           :class="{'form-control-danger': errors.has('nome'), 'form-control-success': fields.nome && fields.nome.valid}"
                           id="nome" name="nome" placeholder="{{ trans('admin.representante.columns.nome') }}">
                    <div v-if="errors.has('nome')" class="form-control-feedback form-text" v-cloak>@{{
                        errors.first('nome') }}
                    </div>
                </div>
            </div>

            <div class="form-group row align-items-center"
                 :class="{'has-danger': errors.has('email'), 'has-success': fields.email && fields.email.valid }">
                <label for="email" class="col-form-label text-md-right"
                       :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.representante.columns.email') }}</label>
                <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                    <input type="text" v-model="row.email" v-validate="'required|email'" @input="validate($event)"
                           class="form-control"
                           :class="{'form-control-danger': errors.has('email'), 'form-control-success': fields.email && fields.email.valid}"
                           id="email" name="email" placeholder="{{ trans('admin.representante.columns.email') }}">
                    <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>@{{
                        errors.first('email') }}
                    </div>
                </div>
            </div>

            <div class="form-group row align-items-center"
                 :class="{'has-danger': errors.has('telefone'), 'has-success': fields.telefone && fields.telefone.valid }">
                <label for="telefone" class="col-form-label text-md-right"
                       :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.representante.columns.telefone') }}</label>
                <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                    <input type="text" v-model="row.telefone" v-validate="''" @input="validate($event)"
                           class="form-control"
                           v-mask="'(##) ####-####'"
                           :class="{'form-control-danger': errors.has('telefone'), 'form-control-success': fields.telefone && fields.telefone.valid}"
                           id="telefone" name="telefone"
                           placeholder="{{ trans('admin.representante.columns.telefone') }}">
                    <div v-if="errors.has('telefone')" class="form-control-feedback form-text" v-cloak>@{{
                        errors.first('telefone')
                        }}
                    </div>
                </div>
            </div>

            <div class="form-group row align-items-center"
                 :class="{'has-danger': errors.has('celular'), 'has-success': fields.celular && fields.celular.valid }">
                <label for="celular" class="col-form-label text-md-right"
                       :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.representante.columns.celular') }}</label>
                <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                    <input type="text" v-model="row.celular" v-validate="''" @input="validate($event)"
                           class="form-control"
                           v-mask="'(##) #####-####'"
                           :class="{'form-control-danger': errors.has('celular'), 'form-control-success': fields.celular && fields.celular.valid}"
                           id="celular" name="celular" placeholder="{{ trans('admin.representante.columns.celular') }}">
                    <div v-if="errors.has('celular')" class="form-control-feedback form-text" v-cloak>@{{
                        errors.first('celular')
                        }}
                    </div>
                </div>
            </div>

            <div class="form-group row align-items-center"
                 :class="{'has-danger': errors.has('cargo'), 'has-success': fields.cargo && fields.cargo.valid }">
                <label for="cargo" class="col-form-label text-md-right"
                       :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.representante.columns.cargo') }}</label>
                <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                    <input type="text" v-model="row.cargo" v-validate="'required'" @input="validate($event)"
                           class="form-control"
                           :class="{'form-control-danger': errors.has('cargo'), 'form-control-success': fields.cargo && fields.cargo.valid}"
                           id="cargo" name="cargo" placeholder="{{ trans('admin.representante.columns.cargo') }}">
                    <div v-if="errors.has('cargo')" class="form-control-feedback form-text" v-cloak>@{{
                        errors.first('cargo') }}
                    </div>
                </div>
            </div>

            <hr>

        </div>

    </div>

</div>
