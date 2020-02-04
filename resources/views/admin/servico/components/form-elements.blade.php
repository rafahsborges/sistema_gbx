<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nome'), 'has-success': fields.nome && fields.nome.valid }">
    <label for="nome" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.servico.columns.nome') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nome" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nome'), 'form-control-success': fields.nome && fields.nome.valid}" id="nome" name="nome" placeholder="{{ trans('admin.servico.columns.nome') }}">
        <div v-if="errors.has('nome')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nome') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('valor'), 'has-success': fields.valor && fields.valor.valid }">
    <label for="valor" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.servico.columns.valor') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.valor" v-money="money" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('valor'), 'form-control-success': fields.valor && fields.valor.valid}" id="valor" name="valor" placeholder="{{ trans('admin.servico.columns.valor') }}">
        <div v-if="errors.has('valor')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('valor') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('orgao'), 'has-success': fields.orgao && fields.orgao.valid }">
    <label for="orgao" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.servico.columns.orgao') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.orgao" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('orgao'), 'form-control-success': fields.orgao && fields.orgao.valid}" id="orgao" name="orgao" placeholder="{{ trans('admin.servico.columns.orgao') }}">
        <div v-if="errors.has('orgao')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('orgao') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('descricao'), 'has-success': fields.descricao && fields.descricao.valid }">
    <label for="descricao" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.servico.columns.descricao') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.descricao" v-validate="'required'" id="descricao" name="descricao" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('descricao')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('descricao') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_etapa'), 'has-success': fields.id_etapa && fields.id_etapa.valid }">
    <label for="id_etapa" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.servico.columns.id_etapa') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <multiselect
                v-model="form.etapa"
                :options="etapas"
                :multiple="false"
                track-by="id"
                label="nome"
                tag-placeholder="{{ trans('admin.servico.columns.id_etapa') }}"
                placeholder="{{ trans('admin.servico.columns.id_etapa') }}">
            </multiselect>
        <div v-if="errors.has('id_etapa')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_etapa') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_status'), 'has-success': fields.id_status && fields.id_status.valid }">
    <label for="id_status" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.servico.columns.id_status') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <multiselect
                v-model="form.status"
                :options="statuses"
                :multiple="false"
                track-by="id"
                label="nome"
                tag-placeholder="{{ trans('admin.servico.columns.id_status') }}"
                placeholder="{{ trans('admin.servico.columns.id_status') }}">
            </multiselect>
        <div v-if="errors.has('id_status')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_status') }}</div>
    </div>
</div>


