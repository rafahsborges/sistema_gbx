<div class="card" v-if="Object.keys(data).length === 0">

    <div class="card-header">
        <i class="fa fa-align-justify"></i> {{ trans('admin.ponto.actions.index') }}
        <button type="button" class="btn btn-primary btn-sm pull-right m-b-0" @click="addRowPonto"><i
                class="fa fa-plus"></i>&nbsp; {{ trans('admin.ponto.actions.create') }}</button>
    </div>

    <div class="card-body">

        <div v-for="(row, index) in form.pontos">

            <div class="row">
                <div class="col-12">
                    <button type="button" class="btn btn-danger btn-sm pull-right m-b-0"
                            v-on:click="removeElementPonto(index)"><i
                            class="fa fa-plus"></i> {{ trans('brackets/admin-ui::admin.btn.delete') }}</button>
                </div>
            </div>

            <div class="form-group row align-items-center"
                 :class="{'has-danger': errors.has('nome'), 'has-success': fields.nome && fields.nome.valid }">
                <label for="nome" class="col-form-label text-md-right"
                       :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ponto.columns.nome') }}</label>
                <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                    <input type="text" v-model="row.nome" v-validate="'required'" @input="validate($event)" class="form-control"
                           :class="{'form-control-danger': errors.has('nome'), 'form-control-success': fields.nome && fields.nome.valid}"
                           id="nome" name="nome" placeholder="{{ trans('admin.ponto.columns.nome') }}">
                    <div v-if="errors.has('nome')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nome') }}</div>
                </div>
            </div>

            <div class="form-group row align-items-center"
                 :class="{'has-danger': errors.has('cep'), 'has-success': fields.cep && fields.cep.valid }">
                <label for="cep" class="col-form-label text-md-right"
                       :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ponto.columns.cep') }}</label>
                <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                    <input type="text" v-model="row.cep" v-validate="''" @input="validate($event)" class="form-control"
                           v-mask="'#####-###'" @blur="getAddressInfoPonto(index)"
                           :class="{'form-control-danger': errors.has('cep'), 'form-control-success': fields.cep && fields.cep.valid}"
                           id="cep" name="cep" placeholder="{{ trans('admin.ponto.columns.cep') }}">
                    <div v-if="errors.has('cep')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cep') }}</div>
                </div>
            </div>

            <div class="form-group row align-items-center"
                 :class="{'has-danger': errors.has('logradouro'), 'has-success': fields.logradouro && fields.logradouro.valid }">
                <label for="logradouro" class="col-form-label text-md-right"
                       :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ponto.columns.logradouro') }}</label>
                <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                    <input type="text" v-model="row.logradouro" v-validate="''" @input="validate($event)" class="form-control"
                           :class="{'form-control-danger': errors.has('logradouro'), 'form-control-success': fields.logradouro && fields.logradouro.valid}"
                           id="logradouro" name="logradouro" placeholder="{{ trans('admin.ponto.columns.logradouro') }}">
                    <div v-if="errors.has('logradouro')" class="form-control-feedback form-text" v-cloak>@{{
                        errors.first('logradouro') }}
                    </div>
                </div>
            </div>

            <div class="form-group row align-items-center"
                 :class="{'has-danger': errors.has('numero'), 'has-success': fields.numero && fields.numero.valid }">
                <label for="numero" class="col-form-label text-md-right"
                       :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ponto.columns.numero') }}</label>
                <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                    <input type="text" v-model="row.numero" v-validate="''" @input="validate($event)" class="form-control"
                           :class="{'form-control-danger': errors.has('numero'), 'form-control-success': fields.numero && fields.numero.valid}"
                           id="numero" name="numero" placeholder="{{ trans('admin.ponto.columns.numero') }}">
                    <div v-if="errors.has('numero')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('numero') }}
                    </div>
                </div>
            </div>

            <div class="form-group row align-items-center"
                 :class="{'has-danger': errors.has('complemento'), 'has-success': fields.complemento && fields.complemento.valid }">
                <label for="complemento" class="col-form-label text-md-right"
                       :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ponto.columns.complemento') }}</label>
                <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                    <input type="text" v-model="row.complemento" v-validate="''" @input="validate($event)" class="form-control"
                           :class="{'form-control-danger': errors.has('complemento'), 'form-control-success': fields.complemento && fields.complemento.valid}"
                           id="complemento" name="complemento" placeholder="{{ trans('admin.ponto.columns.complemento') }}">
                    <div v-if="errors.has('complemento')" class="form-control-feedback form-text" v-cloak>@{{
                        errors.first('complemento') }}
                    </div>
                </div>
            </div>

            <div class="form-group row align-items-center"
                 :class="{'has-danger': errors.has('bairro'), 'has-success': fields.bairro && fields.bairro.valid }">
                <label for="bairro" class="col-form-label text-md-right"
                       :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ponto.columns.bairro') }}</label>
                <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                    <input type="text" v-model="row.bairro" v-validate="''" @input="validate($event)" class="form-control"
                           :class="{'form-control-danger': errors.has('bairro'), 'form-control-success': fields.bairro && fields.bairro.valid}"
                           id="bairro" name="bairro" placeholder="{{ trans('admin.ponto.columns.bairro') }}">
                    <div v-if="errors.has('bairro')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('bairro') }}
                    </div>
                </div>
            </div>

            <div class="form-group row align-items-center"
                 :class="{'has-danger': errors.has('id_cidade'), 'has-success': fields.id_cidade && fields.id_cidade.valid }">
                <label for="id_cidade" class="col-form-label text-md-right"
                       :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ponto.columns.id_cidade') }}</label>
                <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                    <multiselect
                        v-model="row.cidade"
                        :options="cidades"
                        :multiple="false"
                        track-by="id"
                        label="nome"
                        tag-placeholder="{{ trans('admin.ponto.columns.id_cidade') }}"
                        placeholder="{{ trans('admin.ponto.columns.id_cidade') }}">
                    </multiselect>
                    <div v-if="errors.has('id_cidade')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_cidade') }}</div>
                </div>
            </div>

            <div class="form-group row align-items-center"
                 :class="{'has-danger': errors.has('id_estado'), 'has-success': fields.id_estado && fields.id_estado.valid }">
                <label for="id_estado" class="col-form-label text-md-right"
                       :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ponto.columns.id_estado') }}</label>
                <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                    <multiselect
                        v-model="row.estado"
                        :options="estados"
                        :multiple="false"
                        track-by="id"
                        label="nome"
                        tag-placeholder="{{ trans('admin.ponto.columns.id_estado') }}"
                        placeholder="{{ trans('admin.ponto.columns.id_estado') }}">
                    </multiselect>
                    <div v-if="errors.has('id_estado')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_estado') }}</div>
                </div>
            </div>

            <div class="form-group row align-items-center"
                 :class="{'has-danger': errors.has('estacao'), 'has-success': fields.estacao && fields.estacao.valid }">
                <label for="estacao" class="col-form-label text-md-right"
                       :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ponto.columns.estacao') }}</label>
                <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                    <input type="text" v-model="row.estacao" v-validate="''" @input="validate($event)" class="form-control"
                           :class="{'form-control-danger': errors.has('estacao'), 'form-control-success': fields.estacao && fields.estacao.valid}"
                           id="estacao" name="estacao" placeholder="{{ trans('admin.ponto.columns.estacao') }}">
                    <div v-if="errors.has('estacao')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('estacao')
                        }}
                    </div>
                </div>
            </div>

            <div class="form-group row align-items-center"
                 :class="{'has-danger': errors.has('entidade'), 'has-success': fields.entidade && fields.entidade.valid }">
                <label for="entidade" class="col-form-label text-md-right"
                       :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ponto.columns.entidade') }}</label>
                <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                    <input type="text" v-model="row.entidade" v-validate="''" @input="validate($event)" class="form-control"
                           :class="{'form-control-danger': errors.has('entidade'), 'form-control-success': fields.entidade && fields.entidade.valid}"
                           id="entidade" name="entidade" placeholder="{{ trans('admin.ponto.columns.entidade') }}">
                    <div v-if="errors.has('entidade')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('entidade')
                        }}
                    </div>
                </div>
            </div>

            <div class="form-group row align-items-center"
                 :class="{'has-danger': errors.has('latitude'), 'has-success': fields.latitude && fields.latitude.valid }">
                <label for="latitude" class="col-form-label text-md-right"
                       :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ponto.columns.latitude') }}</label>
                <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                    <input type="text" v-model="row.latitude" v-validate="''" @input="validate($event)" class="form-control"
                           :class="{'form-control-danger': errors.has('latitude'), 'form-control-success': fields.latitude && fields.latitude.valid}"
                           id="latitude" name="latitude" placeholder="{{ trans('admin.ponto.columns.latitude') }}">
                    <div v-if="errors.has('latitude')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('latitude')
                        }}
                    </div>
                </div>
            </div>

            <div class="form-group row align-items-center"
                 :class="{'has-danger': errors.has('longitude'), 'has-success': fields.longitude && fields.longitude.valid }">
                <label for="longitude" class="col-form-label text-md-right"
                       :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ponto.columns.longitude') }}</label>
                <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                    <input type="text" v-model="row.longitude" v-validate="''" @input="validate($event)" class="form-control"
                           :class="{'form-control-danger': errors.has('longitude'), 'form-control-success': fields.longitude && fields.longitude.valid}"
                           id="longitude" name="longitude" placeholder="{{ trans('admin.ponto.columns.longitude') }}">
                    <div v-if="errors.has('longitude')" class="form-control-feedback form-text" v-cloak>@{{
                        errors.first('longitude') }}
                    </div>
                </div>
            </div>

            <div class="form-group row align-items-center"
                 :class="{'has-danger': errors.has('altura'), 'has-success': fields.altura && fields.altura.valid }">
                <label for="altura" class="col-form-label text-md-right"
                       :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ponto.columns.altura') }}</label>
                <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                    <input type="text" v-model="row.altura" v-validate="''" @input="validate($event)" class="form-control"
                           :class="{'form-control-danger': errors.has('altura'), 'form-control-success': fields.altura && fields.altura.valid}"
                           id="altura" name="altura" placeholder="{{ trans('admin.ponto.columns.altura') }}">
                    <div v-if="errors.has('altura')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('altura') }}
                    </div>
                </div>
            </div>

            <hr>

        </div>

    </div>

</div>
