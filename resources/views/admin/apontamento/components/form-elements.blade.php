<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('id_cliente'), 'has-success': fields.id_cliente && fields.id_cliente.valid }">
    <label for="id_cliente" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.apontamento.columns.id_cliente') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect
            v-model="form.cliente"
            :options="clientes"
            :multiple="false"
            track-by="id"
            label="nome"
            tag-placeholder="{{ trans('admin.apontamento.columns.id_cliente') }}"
            placeholder="{{ trans('admin.apontamento.columns.id_cliente') }}">
        </multiselect>
        <div v-if="errors.has('id_cliente')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('id_cliente') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('descricao'), 'has-success': fields.descricao && fields.descricao.valid }">
    <label for="descricao" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.apontamento.columns.descricao') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.descricao" v-validate="'required'" id="descricao" name="descricao"
                     :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('descricao')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('descricao') }}
        </div>
    </div>
</div>
