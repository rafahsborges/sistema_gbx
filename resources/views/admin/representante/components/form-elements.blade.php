<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('id_cliente'), 'has-success': fields.id_cliente && fields.id_cliente.valid }">
    <label for="id_cliente" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.representante.columns.id_cliente') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect
            v-model="form.cliente"
            :options="clientes"
            :multiple="false"
            track-by="id"
            label="nome"
            tag-placeholder="{{ trans('admin.representante.columns.id_cliente') }}"
            placeholder="{{ trans('admin.representante.columns.id_cliente') }}">
        </multiselect>
        <div v-if="errors.has('id_cliente')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('id_cliente') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('nome'), 'has-success': fields.nome && fields.nome.valid }">
    <label for="nome" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.representante.columns.nome') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nome" v-validate="'required'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('nome'), 'form-control-success': fields.nome && fields.nome.valid}"
               id="nome" name="nome" placeholder="{{ trans('admin.representante.columns.nome') }}">
        <div v-if="errors.has('nome')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nome') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('email'), 'has-success': fields.email && fields.email.valid }">
    <label for="email" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.representante.columns.email') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email" v-validate="'required|email'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('email'), 'form-control-success': fields.email && fields.email.valid}"
               id="email" name="email" placeholder="{{ trans('admin.representante.columns.email') }}">
        <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('telefone'), 'has-success': fields.telefone && fields.telefone.valid }">
    <label for="telefone" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.representante.columns.telefone') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.telefone" v-validate="''" @input="validate($event)" class="form-control"
               v-mask="'(##) ####-####'"
               :class="{'form-control-danger': errors.has('telefone'), 'form-control-success': fields.telefone && fields.telefone.valid}"
               id="telefone" name="telefone" placeholder="{{ trans('admin.representante.columns.telefone') }}">
        <div v-if="errors.has('telefone')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('telefone')
            }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('celular'), 'has-success': fields.celular && fields.celular.valid }">
    <label for="celular" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.representante.columns.celular') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.celular" v-validate="''" @input="validate($event)" class="form-control"
               v-mask="'(##) #####-####'"
               :class="{'form-control-danger': errors.has('celular'), 'form-control-success': fields.celular && fields.celular.valid}"
               id="celular" name="celular" placeholder="{{ trans('admin.representante.columns.celular') }}">
        <div v-if="errors.has('celular')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('celular')
            }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('cargo'), 'has-success': fields.cargo && fields.cargo.valid }">
    <label for="cargo" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.representante.columns.cargo') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cargo" v-validate="'required'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('cargo'), 'form-control-success': fields.cargo && fields.cargo.valid}"
               id="cargo" name="cargo" placeholder="{{ trans('admin.representante.columns.cargo') }}">
        <div v-if="errors.has('cargo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cargo') }}
        </div>
    </div>
</div>
