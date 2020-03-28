@if(auth()->user()->is_admin === 1)

    <div class="form-group row align-items-center"
         :class="{'has-danger': errors.has('nome'), 'has-success': fields.nome && fields.nome.valid }">
        <label for="nome" class="col-form-label text-md-right"
               :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.servico.columns.nome') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <input type="text" v-model="form.nome" v-validate="'required'" @input="validate($event)"
                   class="form-control"
                   :class="{'form-control-danger': errors.has('nome'), 'form-control-success': fields.nome && fields.nome.valid}"
                   id="nome" name="nome" placeholder="{{ trans('admin.servico.columns.nome') }}">
            <div v-if="errors.has('nome')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nome') }}
            </div>
        </div>
    </div>

    <div class="form-group row align-items-center"
         :class="{'has-danger': errors.has('valor'), 'has-success': fields.valor && fields.valor.valid }">
        <label for="valor" class="col-form-label text-md-right"
               :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.servico.columns.valor') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <input type="text" v-model="form.valor" v-money="money" v-validate="''" @input="validate($event)"
                   class="form-control"
                   :class="{'form-control-danger': errors.has('valor'), 'form-control-success': fields.valor && fields.valor.valid}"
                   id="valor" name="valor" placeholder="{{ trans('admin.servico.columns.valor') }}">
            <div v-if="errors.has('valor')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('valor') }}
            </div>
        </div>
    </div>

    <div class="form-group row align-items-center"
         :class="{'has-danger': errors.has('orgao'), 'has-success': fields.orgao && fields.orgao.valid }">
        <label for="orgao" class="col-form-label text-md-right"
               :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.servico.columns.orgao') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <input type="text" v-model="form.orgao" v-validate="''" @input="validate($event)" class="form-control"
                   :class="{'form-control-danger': errors.has('orgao'), 'form-control-success': fields.orgao && fields.orgao.valid}"
                   id="orgao" name="orgao" placeholder="{{ trans('admin.servico.columns.orgao') }}">
            <div v-if="errors.has('orgao')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('orgao') }}
            </div>
        </div>
    </div>

    <div class="form-group row align-items-center"
         :class="{'has-danger': errors.has('descricao'), 'has-success': fields.descricao && fields.descricao.valid }">
        <label for="descricao" class="col-form-label text-md-right"
               :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.servico.columns.descricao') }}</label>
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

    <div class="form-group row align-items-center"
         :class="{'has-danger': errors.has('id_status'), 'has-success': fields.id_status && fields.id_status.valid }">
        <label for="id_status" class="col-form-label text-md-right"
               :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.servico.columns.id_status') }}</label>
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
            <div v-if="errors.has('id_status')" class="form-control-feedback form-text" v-cloak>@{{
                errors.first('id_status') }}
            </div>
        </div>
    </div>

    <div class="form-group row align-items-center" v-if="form.status.id === 3 || form.status.id === 4"
         :class="{'has-danger': errors.has('observacao'), 'has-success': fields.observacao && fields.observacao.valid }">
        <label for="observacao" class="col-form-label text-md-right"
               :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.servico.columns.observacao') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <div>
                <wysiwyg v-model="form.observacao" v-validate="''" id="observacao" name="observacao"
                         :config="mediaWysiwygConfig"></wysiwyg>
            </div>
            <div v-if="errors.has('observacao')" class="form-control-feedback form-text" v-cloak>@{{
                errors.first('observacao') }}
            </div>
        </div>
    </div>

    <div class="form-group row align-items-center"
         :class="{'has-danger': errors.has('documento'), 'has-success': fields.documento && fields.documento.valid }">
        <label for="documento" class="col-form-label text-md-right"
               :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.servico.columns.documento') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <input class="form-check-input" id="documento" type="checkbox" v-model="form.documento" v-validate="''"
                   data-vv-name="documento" name="documento_fake_element">
            <label class="form-check-label" for="documento">
                {{ trans('admin.servico.columns.documento') }}
            </label>
            <input type="hidden" name="documento" :value="form.documento">
            <div v-if="errors.has('documento')" class="form-control-feedback form-text" v-cloak>@{{
                errors.first('documento')
                }}
            </div>
        </div>
    </div>

@endif

<div v-if="form.documento === true || form.documento === 1">

    <div class="alert alert-info" role="alert">
        Basta adicionar os arquivos abaixo, eles serão salvos automaticamente. Ao enviar todos os arquivos, basta recarregar a página.
    </div>

    @if ($mode === 'create')
        @include('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => app(App\Models\Servico::class)->getMediaCollection('gallery'),
            'label' => 'Imagens'
        ])
        @include('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => app(App\Models\Servico::class)->getMediaCollection('pdf'),
            'label' => 'PDFs'
        ])
    @else
        @include('brackets/admin-ui::admin.includes.media-uploader', [
           'mediaCollection' => $servico->getMediaCollection('gallery'),
           'media' => $servico->getThumbs200ForCollection('gallery'),
           'label' => 'Imagens'
       ])
        @include('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => $servico->getMediaCollection('pdf'),
            'media' => $servico->getThumbs200ForCollection('pdf'),
            'label' => 'PDFs'
        ])
    @endif

    @if(auth()->user()->is_admin === 1)

        <div class="form-group row align-items-center"
             :class="{'has-danger': errors.has('valido'), 'has-success': fields.valido && fields.valido.valid }">
            <label for="valido" class="col-form-label text-md-right"
                   :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.servico.columns.valido') }}</label>
            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                <input class="form-check-input" id="valido" type="checkbox" v-model="form.valido" v-validate="''"
                       data-vv-name="valido" name="valido_fake_element">
                <label class="form-check-label" for="valido">
                    {{ trans('admin.servico.columns.valido') }}
                </label>
                <input type="hidden" name="valido" :value="form.valido">
                <div v-if="errors.has('valido')" class="form-control-feedback form-text" v-cloak>@{{
                    errors.first('valido')
                    }}
                </div>
            </div>
        </div>

    @endif

</div>

@if(auth()->user()->is_admin === 1)

    <div class="form-group row align-items-center"
         :class="{'has-danger': errors.has('id_etapa'), 'has-success': fields.id_etapa && fields.id_etapa.valid }">
        <label for="id_etapa" class="col-form-label text-md-right"
               :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.servico.columns.id_etapa') }}</label>
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
            <div v-if="errors.has('id_etapa')" class="form-control-feedback form-text" v-cloak>@{{
                errors.first('id_etapa')
                }}
            </div>
        </div>
    </div>

    <div class="card" v-if="Object.keys(data).length === 0">

        <div class="card-header">
            <i class="fa fa-align-justify"></i> {{ trans('admin.etapa.actions.index') }}
            <button type="button" class="btn btn-primary btn-sm pull-right m-b-0" @click="addRowEtapa"><i
                    class="fa fa-plus"></i>&nbsp; {{ trans('admin.etapa.actions.create') }}</button>
        </div>

        <div class="card-body">

            <div v-for="(row, index) in form.etapas">

                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-danger btn-sm pull-right m-b-0"
                                v-on:click="removeElementEtapa(index)"><i
                                class="fa fa-plus"></i> {{ trans('brackets/admin-ui::admin.btn.delete') }}</button>
                    </div>
                </div>

                <div class="form-group row align-items-center"
                     :class="{'has-danger': errors.has('id_status'), 'has-success': fields.id_status && fields.id_status.valid }">
                    <label for="id_status" class="col-form-label text-md-right"
                           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.etapa.columns.id_status') }}</label>
                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                        <multiselect
                            v-model="row.status"
                            :options="statuses"
                            :multiple="false"
                            track-by="id"
                            label="nome"
                            tag-placeholder="{{ trans('admin.etapa.columns.id_status') }}"
                            placeholder="{{ trans('admin.etapa.columns.id_status') }}">
                        </multiselect>
                        <div v-if="errors.has('id_status')" class="form-control-feedback form-text" v-cloak>@{{
                            errors.first('id_status') }}
                        </div>
                    </div>
                </div>

                <div class="form-group row align-items-center"
                     :class="{'has-danger': errors.has('nome'), 'has-success': fields.nome && fields.nome.valid }">
                    <label for="nome" class="col-form-label text-md-right"
                           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.etapa.columns.nome') }}</label>
                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                        <input type="text" v-model="row.nome" v-validate="'required'" @input="validate($event)"
                               class="form-control"
                               :class="{'form-control-danger': errors.has('nome'), 'form-control-success': fields.nome && fields.nome.valid}"
                               id="nome" placeholder="{{ trans('admin.etapa.columns.nome') }}">
                        <div v-if="errors.has('nome')" class="form-control-feedback form-text" v-cloak>@{{
                            errors.first('nome') }}
                        </div>
                    </div>
                </div>

                <div class="card">

                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.item.actions.index') }}
                        <button type="button" class="btn btn-primary btn-sm pull-right m-b-0"
                                @click="addRowItem(index)"><i
                                class="fa fa-plus"></i>&nbsp; {{ trans('admin.item.actions.create') }}</button>
                    </div>

                    <div class="card-body">

                        <div v-for="(rowIt, indexIt) in form.etapas[index].itens">

                            <div class="row">
                                <div class="col-12">
                                    <button type="button" class="btn btn-danger btn-sm pull-right m-b-0"
                                            v-on:click="removeElementItem(indexIt)"><i
                                            class="fa fa-plus"></i> {{ trans('brackets/admin-ui::admin.btn.delete') }}
                                    </button>
                                </div>
                            </div>

                            <div class="form-group row align-items-center"
                                 :class="{'has-danger': errors.has('id_status'), 'has-success': fields.id_status && fields.id_status.valid }">
                                <label for="id_status" class="col-form-label text-md-right"
                                       :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.item.columns.id_status') }}</label>
                                <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                    <multiselect
                                        v-model="rowIt.status"
                                        :options="statuses"
                                        :multiple="false"
                                        track-by="id"
                                        label="nome"
                                        tag-placeholder="{{ trans('admin.item.columns.id_status') }}"
                                        placeholder="{{ trans('admin.item.columns.id_status') }}">
                                    </multiselect>
                                    <div v-if="errors.has('id_status')" class="form-control-feedback form-text" v-cloak>
                                        @{{
                                        errors.first('id_status') }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row align-items-center"
                                 :class="{'has-danger': errors.has('nome'), 'has-success': fields.nome && fields.nome.valid }">
                                <label for="nome" class="col-form-label text-md-right"
                                       :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.item.columns.nome') }}</label>
                                <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                    <input type="text" v-model="rowIt.nome" v-validate="'required'"
                                           @input="validate($event)"
                                           class="form-control"
                                           :class="{'form-control-danger': errors.has('nome'), 'form-control-success': fields.nome && fields.nome.valid}"
                                           id="nome" placeholder="{{ trans('admin.item.columns.nome') }}">
                                    <div v-if="errors.has('nome')" class="form-control-feedback form-text" v-cloak>@{{
                                        errors.first('nome') }}
                                    </div>
                                </div>
                            </div>

                            <hr>

                        </div>

                    </div>

                </div>

                <hr>

            </div>

        </div>

    </div>

@endif
