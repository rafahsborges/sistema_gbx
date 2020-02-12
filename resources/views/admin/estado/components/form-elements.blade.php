<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('nome'), 'has-success': fields.nome && fields.nome.valid }">
    <label for="nome" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.estado.columns.nome') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nome" v-validate="'required'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('nome'), 'form-control-success': fields.nome && fields.nome.valid}"
               id="nome" name="nome" placeholder="{{ trans('admin.estado.columns.nome') }}">
        <div v-if="errors.has('nome')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nome') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('abreviacao'), 'has-success': fields.abreviacao && fields.abreviacao.valid }">
    <label for="abreviacao" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.estado.columns.abreviacao') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.abreviacao" v-validate="'required'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('abreviacao'), 'form-control-success': fields.abreviacao && fields.abreviacao.valid}"
               id="abreviacao" name="abreviacao" placeholder="{{ trans('admin.estado.columns.abreviacao') }}">
        <div v-if="errors.has('abreviacao')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('abreviacao') }}
        </div>
    </div>
</div>

<div class="form-check row"
     :class="{'has-danger': errors.has('enabled'), 'has-success': fields.enabled && fields.enabled.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enabled" type="checkbox" v-model="form.enabled" v-validate="''"
               data-vv-name="enabled" name="enabled_fake_element">
        <label class="form-check-label" for="enabled">
            {{ trans('admin.estado.columns.enabled') }}
        </label>
        <input type="hidden" name="enabled" :value="form.enabled">
        <div v-if="errors.has('enabled')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enabled')
            }}
        </div>
    </div>
</div>


