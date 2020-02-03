<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nome'), 'has-success': fields.nome && fields.nome.valid }">
    <label for="nome" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.etapa.columns.nome') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nome" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nome'), 'form-control-success': fields.nome && fields.nome.valid}" id="nome" name="nome" placeholder="{{ trans('admin.etapa.columns.nome') }}">
        <div v-if="errors.has('nome')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nome') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_status'), 'has-success': fields.id_status && fields.id_status.valid }">
    <label for="id_status" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.etapa.columns.id_status') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_status" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_status'), 'form-control-success': fields.id_status && fields.id_status.valid}" id="id_status" name="id_status" placeholder="{{ trans('admin.etapa.columns.id_status') }}">
        <div v-if="errors.has('id_status')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_status') }}</div>
    </div>
</div>


