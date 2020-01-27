<div class="form-group row align-items-center" :class="{'has-danger': errors.has('descricao'), 'has-success': fields.descricao && fields.descricao.valid }">
    <label for="descricao" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.observaco.columns.descricao') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.descricao" v-validate="'required'" id="descricao" name="descricao" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('descricao')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('descricao') }}</div>
    </div>
</div>


