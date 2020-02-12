<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('assunto'), 'has-success': fields.assunto && fields.assunto.valid }">
    <label for="assunto" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.informativo.columns.assunto') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.assunto" v-validate="'required'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('assunto'), 'form-control-success': fields.assunto && fields.assunto.valid}"
               id="assunto" name="assunto" placeholder="{{ trans('admin.informativo.columns.assunto') }}">
        <div v-if="errors.has('assunto')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('assunto')
            }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('conteudo'), 'has-success': fields.conteudo && fields.conteudo.valid }">
    <label for="conteudo" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.informativo.columns.conteudo') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.conteudo" v-validate="'required'" id="conteudo" name="conteudo"
                     :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('conteudo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('conteudo')
            }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('id_servico'), 'has-success': fields.id_servico && fields.id_servico.valid }">
    <label for="id_servico" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.informativo.columns.id_servico') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_servico" v-validate="'required'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('id_servico'), 'form-control-success': fields.id_servico && fields.id_servico.valid}"
               id="id_servico" name="id_servico" placeholder="{{ trans('admin.informativo.columns.id_servico') }}">
        <div v-if="errors.has('id_servico')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('id_servico') }}
        </div>
    </div>
</div>


