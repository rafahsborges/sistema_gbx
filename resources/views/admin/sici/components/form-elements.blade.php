<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('ano'), 'has-success': fields.ano && fields.ano.valid }">
    <label for="ano" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.ano') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect
            v-model="form.ano"
            :options="years"
            :multiple="false"
            track-by="id"
            label="nome"
            tag-placeholder="{{ trans('admin.sici.columns.ano') }}"
            placeholder="{{ trans('admin.sici.columns.ano') }}">
        </multiselect>
        <div v-if="errors.has('ano')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('ano') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('mes'), 'has-success': fields.mes && fields.mes.valid }">
    <label for="mes" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.mes') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect
            v-model="form.mes"
            :options="months"
            :multiple="false"
            track-by="id"
            label="nome"
            tag-placeholder="{{ trans('admin.sici.columns.mes') }}"
            placeholder="{{ trans('admin.sici.columns.mes') }}">
        </multiselect>
        <div v-if="errors.has('mes')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('mes') }}</div>
    </div>
</div>

<div class="form-group row align-items-center">
    <label for="ano" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Referência</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        @{{ form.ano.id }}@{{ form.mes.id }}
    </div>
</div>

@if(auth()->user()->is_admin === 1)
    <div class="form-group row align-items-center"
         :class="{'has-danger': errors.has('id_cliente'), 'has-success': fields.id_cliente && fields.id_cliente.valid }">
        <label for="id_cliente" class="col-form-label text-md-right"
               :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.id_cliente') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <multiselect
                v-model="form.cliente"
                :options="clientes"
                :multiple="false"
                track-by="id"
                label="nome"
                tag-placeholder="{{ trans('admin.sici.columns.id_cliente') }}"
                placeholder="{{ trans('admin.sici.columns.id_cliente') }}">
            </multiselect>
            <div v-if="errors.has('id_cliente')" class="form-control-feedback form-text" v-cloak>@{{
                errors.first('id_cliente') }}
            </div>
        </div>
    </div>

    <div class="form-group row align-items-center"
         :class="{'has-danger': errors.has('id_servico'), 'has-success': fields.id_servico && fields.id_servico.valid }">
        <label for="id_servico" class="col-form-label text-md-right"
               :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.id_servico') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <multiselect
                v-model="form.servico"
                :options="servicos"
                :multiple="false"
                track-by="id"
                label="nome"
                tag-placeholder="{{ trans('admin.sici.columns.id_servico') }}"
                placeholder="{{ trans('admin.sici.columns.id_servico') }}">
            </multiselect>
            <div v-if="errors.has('id_servico')" class="form-control-feedback form-text" v-cloak>@{{
                errors.first('id_servico') }}
            </div>
        </div>
    </div>

    <div class="form-group row align-items-center"
         :class="{'has-danger': errors.has('fistel'), 'has-success': fields.fistel && fields.fistel.valid }">
        <label for="fistel" class="col-form-label text-md-right"
               :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.fistel') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <input type="text" v-model="form.fistel" v-validate="'required'" @input="validate($event)"
                   class="form-control"
                   :class="{'form-control-danger': errors.has('fistel'), 'form-control-success': fields.fistel && fields.fistel.valid}"
                   id="fistel" name="fistel" placeholder="{{ trans('admin.sici.columns.fistel') }}">
            <div v-if="errors.has('fistel')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('fistel')
                }}
            </div>
        </div>
    </div>

@else

    <div class="form-group row align-items-center">
        <label for="ano" class="col-form-label text-md-right"
               :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.id_cliente') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            {{auth()->user()->nome}}
        </div>
    </div>

    <div class="form-group row align-items-center">
        <label for="ano" class="col-form-label text-md-right"
               :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.id_servico') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            {{$servicos[0]->nome}}
        </div>
    </div>

    <div class="form-group row align-items-center">
        <label for="ano" class="col-form-label text-md-right"
               :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.fistel') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            {{auth()->user()->fistel}}
        </div>
    </div>

@endif

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('id_cidade'), 'has-success': fields.id_cidade && fields.id_cidade.valid }">
    <label for="id_cidade" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.id_cidade') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect
            v-model="form.cidade"
            :options="cidades"
            :multiple="false"
            track-by="id"
            label="nome"
            tag-placeholder="{{ trans('admin.sici.columns.id_cidade') }}"
            placeholder="{{ trans('admin.sici.columns.id_cidade') }}">
        </multiselect>
        <div v-if="errors.has('id_cidade')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('id_cidade') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('id_estado'), 'has-success': fields.id_estado && fields.id_estado.valid }">
    <label for="id_estado" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.id_estado') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect
            v-model="form.estado"
            :options="estados"
            :multiple="false"
            track-by="id"
            label="nome"
            tag-placeholder="{{ trans('admin.sici.columns.id_estado') }}"
            placeholder="{{ trans('admin.sici.columns.id_estado') }}">
        </multiselect>
        <div v-if="errors.has('id_estado')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('id_estado') }}
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        Indicadores por UF e Município
    </div>
    <div class="card-body">

        <div class="card">
            <div class="card-header">
                UF - @{{ form.estado.abreviacao }}
            </div>
            <div class="card-body">

                <div class="card">
                    <div class="card-header">
                        IEM4
                    </div>
                    <div class="card-body">
                        <div class="form-group row align-items-center"
                             :class="{'has-danger': errors.has('iem4a'), 'has-success': fields.iem4a && fields.iem4a.valid }">
                            <label for="iem4a" class="col-form-label text-md-right"
                                   :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem4a') }}</label>
                            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                <input type="text" v-model="form.iem4a" v-validate="'integer'" v-money="integer"
                                       @input="validate($event)" class="form-control"
                                       :class="{'form-control-danger': errors.has('iem4a'), 'form-control-success': fields.iem4a && fields.iem4a.valid}"
                                       id="iem4a" name="iem4a" placeholder="{{ trans('admin.sici.columns.iem4a') }}">
                                <div v-if="errors.has('iem4a')" class="form-control-feedback form-text" v-cloak>@{{
                                    errors.first('iem4a') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        IEM5
                    </div>
                    <div class="card-body">
                        <div class="form-group row align-items-center"
                             :class="{'has-danger': errors.has('iem5a'), 'has-success': fields.iem5a && fields.iem5a.valid }">
                            <label for="iem5a" class="col-form-label text-md-right"
                                   :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem5a') }}</label>
                            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                <input type="text" v-model="form.iem5a" v-validate="'integer'" v-money="integer"
                                       @input="validate($event)" class="form-control"
                                       :class="{'form-control-danger': errors.has('iem5a'), 'form-control-success': fields.iem5a && fields.iem5a.valid}"
                                       id="iem5a" name="iem5a" placeholder="{{ trans('admin.sici.columns.iem5a') }}">
                                <div v-if="errors.has('iem5a')" class="form-control-feedback form-text" v-cloak>@{{
                                    errors.first('iem5a') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        IEM9
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            Pessoa Física
                        </h5>
                        <div class="form-group row align-items-center"
                             :class="{'has-danger': errors.has('iem9Fa'), 'has-success': fields.iem9Fa && fields.iem9Fa.valid }">
                            <label for="iem9Fa" class="col-form-label text-md-right"
                                   :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem9Fa') }}</label>
                            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                <input type="text" v-model="form.iem9Fa" v-validate="''" @input="validate($event)"
                                       class="form-control"
                                       v-money="money"
                                       :class="{'form-control-danger': errors.has('iem9Fa'), 'form-control-success': fields.iem9Fa && fields.iem9Fa.valid}"
                                       id="iem9Fa" name="iem9Fa" placeholder="{{ trans('admin.sici.columns.iem9Fa') }}">
                                <div v-if="errors.has('iem9Fa')" class="form-control-feedback form-text" v-cloak>@{{
                                    errors.first('iem9Fa') }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row align-items-center"
                             :class="{'has-danger': errors.has('iem9Fb'), 'has-success': fields.iem9Fb && fields.iem9Fb.valid }">
                            <label for="iem9Fb" class="col-form-label text-md-right"
                                   :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem9Fb') }}</label>
                            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                <input type="text" v-model="form.iem9Fb" v-validate="''" @input="validate($event)"
                                       class="form-control"
                                       v-money="money"
                                       :class="{'form-control-danger': errors.has('iem9Fb'), 'form-control-success': fields.iem9Fb && fields.iem9Fb.valid}"
                                       id="iem9Fb" name="iem9Fb" placeholder="{{ trans('admin.sici.columns.iem9Fb') }}">
                                <div v-if="errors.has('iem9Fb')" class="form-control-feedback form-text" v-cloak>@{{
                                    errors.first('iem9Fb') }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row align-items-center"
                             :class="{'has-danger': errors.has('iem9Fc'), 'has-success': fields.iem9Fc && fields.iem9Fc.valid }">
                            <label for="iem9Fc" class="col-form-label text-md-right"
                                   :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem9Fc') }}</label>
                            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                <input type="text" v-model="form.iem9Fc" v-validate="''" @input="validate($event)"
                                       class="form-control"
                                       v-money="money"
                                       :class="{'form-control-danger': errors.has('iem9Fc'), 'form-control-success': fields.iem9Fc && fields.iem9Fc.valid}"
                                       id="iem9Fc" name="iem9Fc" placeholder="{{ trans('admin.sici.columns.iem9Fc') }}">
                                <div v-if="errors.has('iem9Fc')" class="form-control-feedback form-text" v-cloak>@{{
                                    errors.first('iem9Fc') }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row align-items-center"
                             :class="{'has-danger': errors.has('iem9Fd'), 'has-success': fields.iem9Fd && fields.iem9Fd.valid }">
                            <label for="iem9Fd" class="col-form-label text-md-right"
                                   :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem9Fd') }}</label>
                            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                <input type="text" v-model="form.iem9Fd" v-validate="''" @input="validate($event)"
                                       class="form-control"
                                       v-money="money"
                                       :class="{'form-control-danger': errors.has('iem9Fd'), 'form-control-success': fields.iem9Fd && fields.iem9Fd.valid}"
                                       id="iem9Fd" name="iem9Fd" placeholder="{{ trans('admin.sici.columns.iem9Fd') }}">
                                <div v-if="errors.has('iem9Fd')" class="form-control-feedback form-text" v-cloak>@{{
                                    errors.first('iem9Fd') }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row align-items-center"
                             :class="{'has-danger': errors.has('iem9Fe'), 'has-success': fields.iem9Fe && fields.iem9Fe.valid }">
                            <label for="iem9Fe" class="col-form-label text-md-right"
                                   :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem9Fe') }}</label>
                            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                <input type="text" v-model="form.iem9Fe" v-validate="''" @input="validate($event)"
                                       class="form-control"
                                       v-money="money"
                                       :class="{'form-control-danger': errors.has('iem9Fe'), 'form-control-success': fields.iem9Fe && fields.iem9Fe.valid}"
                                       id="iem9Fe" name="iem9Fe" placeholder="{{ trans('admin.sici.columns.iem9Fe') }}">
                                <div v-if="errors.has('iem9Fe')" class="form-control-feedback form-text" v-cloak>@{{
                                    errors.first('iem9Fe') }}
                                </div>
                            </div>
                        </div>
                        <h5 class="card-title">
                            Pessoa Jurídica
                        </h5>
                        <div class="form-group row align-items-center"
                             :class="{'has-danger': errors.has('iem9Ja'), 'has-success': fields.iem9Ja && fields.iem9Ja.valid }">
                            <label for="iem9Ja" class="col-form-label text-md-right"
                                   :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem9Ja') }}</label>
                            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                <input type="text" v-model="form.iem9Ja" v-validate="''" @input="validate($event)"
                                       class="form-control"
                                       v-money="money"
                                       :class="{'form-control-danger': errors.has('iem9Ja'), 'form-control-success': fields.iem9Ja && fields.iem9Ja.valid}"
                                       id="iem9Ja" name="iem9Ja" placeholder="{{ trans('admin.sici.columns.iem9Ja') }}">
                                <div v-if="errors.has('iem9Ja')" class="form-control-feedback form-text" v-cloak>@{{
                                    errors.first('iem9Ja') }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row align-items-center"
                             :class="{'has-danger': errors.has('iem9Jb'), 'has-success': fields.iem9Jb && fields.iem9Jb.valid }">
                            <label for="iem9Jb" class="col-form-label text-md-right"
                                   :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem9Jb') }}</label>
                            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                <input type="text" v-model="form.iem9Jb" v-validate="''" @input="validate($event)"
                                       class="form-control"
                                       v-money="money"
                                       :class="{'form-control-danger': errors.has('iem9Jb'), 'form-control-success': fields.iem9Jb && fields.iem9Jb.valid}"
                                       id="iem9Jb" name="iem9Jb" placeholder="{{ trans('admin.sici.columns.iem9Jb') }}">
                                <div v-if="errors.has('iem9Jb')" class="form-control-feedback form-text" v-cloak>@{{
                                    errors.first('iem9Jb') }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row align-items-center"
                             :class="{'has-danger': errors.has('iem9Jc'), 'has-success': fields.iem9Jc && fields.iem9Jc.valid }">
                            <label for="iem9Jc" class="col-form-label text-md-right"
                                   :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem9Jc') }}</label>
                            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                <input type="text" v-model="form.iem9Jc" v-validate="''" @input="validate($event)"
                                       class="form-control"
                                       v-money="money"
                                       :class="{'form-control-danger': errors.has('iem9Jc'), 'form-control-success': fields.iem9Jc && fields.iem9Jc.valid}"
                                       id="iem9Jc" name="iem9Jc" placeholder="{{ trans('admin.sici.columns.iem9Jc') }}">
                                <div v-if="errors.has('iem9Jc')" class="form-control-feedback form-text" v-cloak>@{{
                                    errors.first('iem9Jc') }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row align-items-center"
                             :class="{'has-danger': errors.has('iem9Jd'), 'has-success': fields.iem9Jd && fields.iem9Jd.valid }">
                            <label for="iem9Jd" class="col-form-label text-md-right"
                                   :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem9Jd') }}</label>
                            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                <input type="text" v-model="form.iem9Jd" v-validate="''" @input="validate($event)"
                                       class="form-control"
                                       v-money="money"
                                       :class="{'form-control-danger': errors.has('iem9Jd'), 'form-control-success': fields.iem9Jd && fields.iem9Jd.valid}"
                                       id="iem9Jd" name="iem9Jd" placeholder="{{ trans('admin.sici.columns.iem9Jd') }}">
                                <div v-if="errors.has('iem9Jd')" class="form-control-feedback form-text" v-cloak>@{{
                                    errors.first('iem9Jd') }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row align-items-center"
                             :class="{'has-danger': errors.has('iem9Je'), 'has-success': fields.iem9Je && fields.iem9Je.valid }">
                            <label for="iem9Je" class="col-form-label text-md-right"
                                   :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem9Je') }}</label>
                            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                <input type="text" v-model="form.iem9Je" v-validate="''" @input="validate($event)"
                                       class="form-control"
                                       v-money="money"
                                       :class="{'form-control-danger': errors.has('iem9Je'), 'form-control-success': fields.iem9Je && fields.iem9Je.valid}"
                                       id="iem9Je" name="iem9Je" placeholder="{{ trans('admin.sici.columns.iem9Je') }}">
                                <div v-if="errors.has('iem9Je')" class="form-control-feedback form-text" v-cloak>@{{
                                    errors.first('iem9Je') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        IEM10
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            Pessoa Física
                        </h5>
                        <div class="form-group row align-items-center"
                             :class="{'has-danger': errors.has('iem10Fa'), 'has-success': fields.iem10Fa && fields.iem10Fa.valid }">
                            <label for="iem10Fa" class="col-form-label text-md-right"
                                   :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem10Fa') }}</label>
                            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                <input type="text" v-model="form.iem10Fa" v-validate="''" @input="validate($event)"
                                       class="form-control"
                                       v-money="money"
                                       :class="{'form-control-danger': errors.has('iem10Fa'), 'form-control-success': fields.iem10Fa && fields.iem10Fa.valid}"
                                       id="iem10Fa" name="iem10Fa"
                                       placeholder="{{ trans('admin.sici.columns.iem10Fa') }}">
                                <div v-if="errors.has('iem10Fa')" class="form-control-feedback form-text" v-cloak>@{{
                                    errors.first('iem10Fa')
                                    }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row align-items-center"
                             :class="{'has-danger': errors.has('iem10Fb'), 'has-success': fields.iem10Fb && fields.iem10Fb.valid }">
                            <label for="iem10Fb" class="col-form-label text-md-right"
                                   :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem10Fb') }}</label>
                            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                <input type="text" v-model="form.iem10Fb" v-validate="''" @input="validate($event)"
                                       class="form-control"
                                       v-money="money"
                                       :class="{'form-control-danger': errors.has('iem10Fb'), 'form-control-success': fields.iem10Fb && fields.iem10Fb.valid}"
                                       id="iem10Fb" name="iem10Fb"
                                       placeholder="{{ trans('admin.sici.columns.iem10Fb') }}">
                                <div v-if="errors.has('iem10Fb')" class="form-control-feedback form-text" v-cloak>@{{
                                    errors.first('iem10Fb')
                                    }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row align-items-center"
                             :class="{'has-danger': errors.has('iem10Fc'), 'has-success': fields.iem10Fc && fields.iem10Fc.valid }">
                            <label for="iem10Fc" class="col-form-label text-md-right"
                                   :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem10Fc') }}</label>
                            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                <input type="text" v-model="form.iem10Fc" v-validate="''" @input="validate($event)"
                                       class="form-control"
                                       v-money="money"
                                       :class="{'form-control-danger': errors.has('iem10Fc'), 'form-control-success': fields.iem10Fc && fields.iem10Fc.valid}"
                                       id="iem10Fc" name="iem10Fc"
                                       placeholder="{{ trans('admin.sici.columns.iem10Fc') }}">
                                <div v-if="errors.has('iem10Fc')" class="form-control-feedback form-text" v-cloak>@{{
                                    errors.first('iem10Fc')
                                    }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row align-items-center"
                             :class="{'has-danger': errors.has('iem10Fd'), 'has-success': fields.iem10Fd && fields.iem10Fd.valid }">
                            <label for="iem10Fd" class="col-form-label text-md-right"
                                   :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem10Fd') }}</label>
                            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                <input type="text" v-model="form.iem10Fd" v-validate="''" @input="validate($event)"
                                       class="form-control"
                                       v-money="money"
                                       :class="{'form-control-danger': errors.has('iem10Fd'), 'form-control-success': fields.iem10Fd && fields.iem10Fd.valid}"
                                       id="iem10Fd" name="iem10Fd"
                                       placeholder="{{ trans('admin.sici.columns.iem10Fd') }}">
                                <div v-if="errors.has('iem10Fd')" class="form-control-feedback form-text" v-cloak>@{{
                                    errors.first('iem10Fd')
                                    }}
                                </div>
                            </div>
                        </div>
                        <h5 class="card-title">
                            Pessoa Jurídica
                        </h5>
                        <div class="form-group row align-items-center"
                             :class="{'has-danger': errors.has('iem10Ja'), 'has-success': fields.iem10Ja && fields.iem10Ja.valid }">
                            <label for="iem10Ja" class="col-form-label text-md-right"
                                   :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem10Ja') }}</label>
                            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                <input type="text" v-model="form.iem10Ja" v-validate="''" @input="validate($event)"
                                       class="form-control"
                                       v-money="money"
                                       :class="{'form-control-danger': errors.has('iem10Ja'), 'form-control-success': fields.iem10Ja && fields.iem10Ja.valid}"
                                       id="iem10Ja" name="iem10Ja"
                                       placeholder="{{ trans('admin.sici.columns.iem10Ja') }}">
                                <div v-if="errors.has('iem10Ja')" class="form-control-feedback form-text" v-cloak>@{{
                                    errors.first('iem10Ja')
                                    }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row align-items-center"
                             :class="{'has-danger': errors.has('iem10Jb'), 'has-success': fields.iem10Jb && fields.iem10Jb.valid }">
                            <label for="iem10Jb" class="col-form-label text-md-right"
                                   :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem10Jb') }}</label>
                            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                <input type="text" v-model="form.iem10Jb" v-validate="''" @input="validate($event)"
                                       class="form-control"
                                       v-money="money"
                                       :class="{'form-control-danger': errors.has('iem10Jb'), 'form-control-success': fields.iem10Jb && fields.iem10Jb.valid}"
                                       id="iem10Jb" name="iem10Jb"
                                       placeholder="{{ trans('admin.sici.columns.iem10Jb') }}">
                                <div v-if="errors.has('iem10Jb')" class="form-control-feedback form-text" v-cloak>@{{
                                    errors.first('iem10Jb')
                                    }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row align-items-center"
                             :class="{'has-danger': errors.has('iem10Jc'), 'has-success': fields.iem10Jc && fields.iem10Jc.valid }">
                            <label for="iem10Jc" class="col-form-label text-md-right"
                                   :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem10Jc') }}</label>
                            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                <input type="text" v-model="form.iem10Jc" v-validate="''" @input="validate($event)"
                                       class="form-control"
                                       v-money="money"
                                       :class="{'form-control-danger': errors.has('iem10Jc'), 'form-control-success': fields.iem10Jc && fields.iem10Jc.valid}"
                                       id="iem10Jc" name="iem10Jc"
                                       placeholder="{{ trans('admin.sici.columns.iem10Jc') }}">
                                <div v-if="errors.has('iem10Jc')" class="form-control-feedback form-text" v-cloak>@{{
                                    errors.first('iem10Jc')
                                    }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row align-items-center"
                             :class="{'has-danger': errors.has('iem10Jd'), 'has-success': fields.iem10Jd && fields.iem10Jd.valid }">
                            <label for="iem10Jd" class="col-form-label text-md-right"
                                   :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem10Jd') }}</label>
                            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                <input type="text" v-model="form.iem10Jd" v-validate="''" @input="validate($event)"
                                       class="form-control"
                                       v-money="money"
                                       :class="{'form-control-danger': errors.has('iem10Jd'), 'form-control-success': fields.iem10Jd && fields.iem10Jd.valid}"
                                       id="iem10Jd" name="iem10Jd"
                                       placeholder="{{ trans('admin.sici.columns.iem10Jd') }}">
                                <div v-if="errors.has('iem10Jd')" class="form-control-feedback form-text" v-cloak>@{{
                                    errors.first('iem10Jd')
                                    }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Município - @{{ form.cidade.nome }}
            </div>
            <div class="card-body">

                <div class="card">
                    <div class="card-header">
                        IPL3
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            Pessoa Física
                        </h5>
                        <div class="form-group row align-items-center"
                             :class="{'has-danger': errors.has('ipl3Fa'), 'has-success': fields.ipl3Fa && fields.ipl3Fa.valid }">
                            <label for="ipl3Fa" class="col-form-label text-md-right"
                                   :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.ipl3Fa') }}</label>
                            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                <input type="text" v-model="form.ipl3Fa" v-validate="'integer'" v-money="integer"
                                       @input="validate($event)" class="form-control"
                                       :class="{'form-control-danger': errors.has('ipl3Fa'), 'form-control-success': fields.ipl3Fa && fields.ipl3Fa.valid}"
                                       id="ipl3Fa" name="ipl3Fa" placeholder="{{ trans('admin.sici.columns.ipl3Fa') }}">
                                <div v-if="errors.has('ipl3Fa')" class="form-control-feedback form-text" v-cloak>@{{
                                    errors.first('ipl3Fa') }}
                                </div>
                            </div>
                        </div>
                        <h5 class="card-title">
                            Pessoa Jurídica
                        </h5>
                        <div class="form-group row align-items-center"
                             :class="{'has-danger': errors.has('ipl3Ja'), 'has-success': fields.ipl3Ja && fields.ipl3Ja.valid }">
                            <label for="ipl3Ja" class="col-form-label text-md-right"
                                   :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.ipl3Ja') }}</label>
                            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                <input type="text" v-model="form.ipl3Ja" v-validate="'integer'" v-money="integer"
                                       @input="validate($event)" class="form-control"
                                       :class="{'form-control-danger': errors.has('ipl3Ja'), 'form-control-success': fields.ipl3Ja && fields.ipl3Ja.valid}"
                                       id="ipl3Ja" name="ipl3Ja" placeholder="{{ trans('admin.sici.columns.ipl3Ja') }}">
                                <div v-if="errors.has('ipl3Ja')" class="form-control-feedback form-text" v-cloak>@{{
                                    errors.first('ipl3Ja') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Tecnologia</th>
                        <th scope="col">Capacidade Total do Sistema Implantada e em Serviço por Município</th>
                        <th scope="col">Total de Acessos</th>
                        <th scope="col">0 Kbps a 512 Kbps</th>
                        <th scope="col">512 Kbps a 2 Mbps</th>
                        <th scope="col">2 Mbps a 12 Mbps</th>
                        <th scope="col">12 Mbps a 34 Mbps</th>
                        <th scope="col">> 34 Mbps</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>xDSL</td>
                        <td>
                            <input type="text" v-model="form.qaipl4smAqaipl5sm" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smAqaipl5sm'), 'form-control-success': fields.qaipl4smAqaipl5sm && fields.qaipl4smAqaipl5sm.valid}"
                                   id="qaipl4smAqaipl5sm" name="qaipl4smAqaipl5sm"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smAqaipl5sm') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smAtotal" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smAtotal'), 'form-control-success': fields.qaipl4smAtotal && fields.qaipl4smAtotal.valid}"
                                   id="qaipl4smAtotal" name="qaipl4smAtotal"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smAtotal') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smA15" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smA15'), 'form-control-success': fields.qaipl4smA15 && fields.qaipl4smA15.valid}"
                                   id="qaipl4smA15" name="qaipl4smA15"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smA15') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smA16" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smA16'), 'form-control-success': fields.qaipl4smA16 && fields.qaipl4smA16.valid}"
                                   id="qaipl4smA16" name="qaipl4smA16"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smA16') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smA17" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smA17'), 'form-control-success': fields.qaipl4smA17 && fields.qaipl4smA17.valid}"
                                   id="qaipl4smA17" name="qaipl4smA17"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smA17') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smA18" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smA18'), 'form-control-success': fields.qaipl4smA18 && fields.qaipl4smA18.valid}"
                                   id="qaipl4smA18" name="qaipl4smA18"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smA18') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smA19" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smA19'), 'form-control-success': fields.qaipl4smA19 && fields.qaipl4smA19.valid}"
                                   id="qaipl4smA19" name="qaipl4smA19"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smA19') }}">
                        </td>
                    </tr>
                    <tr>
                        <td>Cable Modem</td>
                        <td>
                            <input type="text" v-model="form.qaipl4smBqaipl5sm" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smBqaipl5sm'), 'form-control-success': fields.qaipl4smBqaipl5sm && fields.qaipl4smBqaipl5sm.valid}"
                                   id="qaipl4smBqaipl5sm" name="qaipl4smBqaipl5sm"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smBqaipl5sm') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smBtotal" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smBtotal'), 'form-control-success': fields.qaipl4smBtotal && fields.qaipl4smBtotal.valid}"
                                   id="qaipl4smBtotal" name="qaipl4smBtotal"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smBtotal') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smB15" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smB15'), 'form-control-success': fields.qaipl4smB15 && fields.qaipl4smB15.valid}"
                                   id="qaipl4smB15" name="qaipl4smB15"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smB15') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smB16" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smB16'), 'form-control-success': fields.qaipl4smB16 && fields.qaipl4smB16.valid}"
                                   id="qaipl4smB16" name="qaipl4smB16"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smB16') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smB17" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smB17'), 'form-control-success': fields.qaipl4smB17 && fields.qaipl4smB17.valid}"
                                   id="qaipl4smB17" name="qaipl4smB17"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smB17') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smB18" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smB18'), 'form-control-success': fields.qaipl4smB18 && fields.qaipl4smB18.valid}"
                                   id="qaipl4smB18" name="qaipl4smB18"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smB18') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smB19" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smB19'), 'form-control-success': fields.qaipl4smB19 && fields.qaipl4smB19.valid}"
                                   id="qaipl4smB19" name="qaipl4smB19"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smB19') }}">
                        </td>
                    </tr>
                    <tr>
                        <td>Spread Spectrum</td>
                        <td>
                            <input type="text" v-model="form.qaipl4smCqaipl5sm" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smCqaipl5sm'), 'form-control-success': fields.qaipl4smCqaipl5sm && fields.qaipl4smCqaipl5sm.valid}"
                                   id="qaipl4smCqaipl5sm" name="qaipl4smCqaipl5sm"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smCqaipl5sm') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smCtotal" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smCtotal'), 'form-control-success': fields.qaipl4smCtotal && fields.qaipl4smCtotal.valid}"
                                   id="qaipl4smCtotal" name="qaipl4smCtotal"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smCtotal') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smC15" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smC15'), 'form-control-success': fields.qaipl4smC15 && fields.qaipl4smC15.valid}"
                                   id="qaipl4smC15" name="qaipl4smC15"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smC15') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smC16" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smC16'), 'form-control-success': fields.qaipl4smC16 && fields.qaipl4smC16.valid}"
                                   id="qaipl4smC16" name="qaipl4smC16"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smC16') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smC17" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smC17'), 'form-control-success': fields.qaipl4smC17 && fields.qaipl4smC17.valid}"
                                   id="qaipl4smC17" name="qaipl4smC17"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smC17') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smC18" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smC18'), 'form-control-success': fields.qaipl4smC18 && fields.qaipl4smC18.valid}"
                                   id="qaipl4smC18" name="qaipl4smC18"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smC18') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smC19" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smC19'), 'form-control-success': fields.qaipl4smC19 && fields.qaipl4smC19.valid}"
                                   id="qaipl4smC19" name="qaipl4smC19"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smC19') }}">
                        </td>
                    </tr>
                    <tr>
                        <td>FWA</td>
                        <td>
                            <input type="text" v-model="form.qaipl4smDqaipl5sm" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smDqaipl5sm'), 'form-control-success': fields.qaipl4smDqaipl5sm && fields.qaipl4smDqaipl5sm.valid}"
                                   id="qaipl4smDqaipl5sm" name="qaipl4smDqaipl5sm"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smDqaipl5sm') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smDtotal" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smDtotal'), 'form-control-success': fields.qaipl4smDtotal && fields.qaipl4smDtotal.valid}"
                                   id="qaipl4smDtotal" name="qaipl4smDtotal"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smDtotal') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smD15" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smD15'), 'form-control-success': fields.qaipl4smD15 && fields.qaipl4smD15.valid}"
                                   id="qaipl4smD15" name="qaipl4smD15"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smD15') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smD16" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smD16'), 'form-control-success': fields.qaipl4smD16 && fields.qaipl4smD16.valid}"
                                   id="qaipl4smD16" name="qaipl4smD16"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smD16') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smD17" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smD17'), 'form-control-success': fields.qaipl4smD17 && fields.qaipl4smD17.valid}"
                                   id="qaipl4smD17" name="qaipl4smD17"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smD17') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smD18" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smD18'), 'form-control-success': fields.qaipl4smD18 && fields.qaipl4smD18.valid}"
                                   id="qaipl4smD18" name="qaipl4smD18"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smD18') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smD19" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smD19'), 'form-control-success': fields.qaipl4smD19 && fields.qaipl4smD19.valid}"
                                   id="qaipl4smD19" name="qaipl4smD19"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smD19') }}">
                        </td>
                    </tr>
                    <tr>
                        <td>MMDS</td>
                        <td>
                            <input type="text" v-model="form.qaipl4smEqaipl5sm" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smEqaipl5sm'), 'form-control-success': fields.qaipl4smEqaipl5sm && fields.qaipl4smEqaipl5sm.valid}"
                                   id="qaipl4smEqaipl5sm" name="qaipl4smEqaipl5sm"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smEqaipl5sm') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smEtotal" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smEtotal'), 'form-control-success': fields.qaipl4smEtotal && fields.qaipl4smEtotal.valid}"
                                   id="qaipl4smEtotal" name="qaipl4smEtotal"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smEtotal') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smE15" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smE15'), 'form-control-success': fields.qaipl4smE15 && fields.qaipl4smE15.valid}"
                                   id="qaipl4smE15" name="qaipl4smE15"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smE15') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smE16" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smE16'), 'form-control-success': fields.qaipl4smE16 && fields.qaipl4smE16.valid}"
                                   id="qaipl4smE16" name="qaipl4smE16"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smE16') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smE17" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smE17'), 'form-control-success': fields.qaipl4smE17 && fields.qaipl4smE17.valid}"
                                   id="qaipl4smE17" name="qaipl4smE17"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smE17') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smE18" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smE18'), 'form-control-success': fields.qaipl4smE18 && fields.qaipl4smE18.valid}"
                                   id="qaipl4smE18" name="qaipl4smE18"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smE18') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smE19" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smE19'), 'form-control-success': fields.qaipl4smE19 && fields.qaipl4smE19.valid}"
                                   id="qaipl4smE19" name="qaipl4smE19"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smE19') }}">
                        </td>
                    </tr>
                    <tr>
                        <td>DTH</td>
                        <td>
                            <input type="text" v-model="form.qaipl4smFqaipl5sm" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smFqaipl5sm'), 'form-control-success': fields.qaipl4smFqaipl5sm && fields.qaipl4smFqaipl5sm.valid}"
                                   id="qaipl4smFqaipl5sm" name="qaipl4smFqaipl5sm"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smFqaipl5sm') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smFtotal" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smFtotal'), 'form-control-success': fields.qaipl4smFtotal && fields.qaipl4smFtotal.valid}"
                                   id="qaipl4smFtotal" name="qaipl4smFtotal"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smFtotal') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smF15" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smF15'), 'form-control-success': fields.qaipl4smF15 && fields.qaipl4smF15.valid}"
                                   id="qaipl4smF15" name="qaipl4smF15"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smF15') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smF16" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smF16'), 'form-control-success': fields.qaipl4smF16 && fields.qaipl4smF16.valid}"
                                   id="qaipl4smF16" name="qaipl4smF16"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smF16') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smF17" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smF17'), 'form-control-success': fields.qaipl4smF17 && fields.qaipl4smF17.valid}"
                                   id="qaipl4smF17" name="qaipl4smF17"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smF17') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smF18" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smF18'), 'form-control-success': fields.qaipl4smF18 && fields.qaipl4smF18.valid}"
                                   id="qaipl4smF18" name="qaipl4smF18"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smF18') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smF19" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smF19'), 'form-control-success': fields.qaipl4smF19 && fields.qaipl4smF19.valid}"
                                   id="qaipl4smF19" name="qaipl4smF19"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smF19') }}">
                        </td>
                    </tr>
                    <tr>
                        <td>SATELITE</td>
                        <td>
                            <input type="text" v-model="form.qaipl4smGqaipl5sm" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smGqaipl5sm'), 'form-control-success': fields.qaipl4smGqaipl5sm && fields.qaipl4smGqaipl5sm.valid}"
                                   id="qaipl4smGqaipl5sm" name="qaipl4smGqaipl5sm"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smGqaipl5sm') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smGtotal" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smGtotal'), 'form-control-success': fields.qaipl4smGtotal && fields.qaipl4smGtotal.valid}"
                                   id="qaipl4smGtotal" name="qaipl4smGtotal"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smGtotal') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smG15" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smG15'), 'form-control-success': fields.qaipl4smG15 && fields.qaipl4smG15.valid}"
                                   id="qaipl4smG15" name="qaipl4smG15"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smG15') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smG16" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smG16'), 'form-control-success': fields.qaipl4smG16 && fields.qaipl4smG16.valid}"
                                   id="qaipl4smG16" name="qaipl4smG16"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smG16') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smG17" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smG17'), 'form-control-success': fields.qaipl4smG17 && fields.qaipl4smG17.valid}"
                                   id="qaipl4smG17" name="qaipl4smG17"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smG17') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smG18" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smG18'), 'form-control-success': fields.qaipl4smG18 && fields.qaipl4smG18.valid}"
                                   id="qaipl4smG18" name="qaipl4smG18"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smG18') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smG19" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smG19'), 'form-control-success': fields.qaipl4smG19 && fields.qaipl4smG19.valid}"
                                   id="qaipl4smG19" name="qaipl4smG19"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smG19') }}">
                        </td>
                    </tr>
                    <tr>
                        <td>Fibra</td>
                        <td>
                            <input type="text" v-model="form.qaipl4smHqaipl5sm" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smHqaipl5sm'), 'form-control-success': fields.qaipl4smHqaipl5sm && fields.qaipl4smHqaipl5sm.valid}"
                                   id="qaipl4smHqaipl5sm" name="qaipl4smHqaipl5sm"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smHqaipl5sm') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smHtotal" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smHtotal'), 'form-control-success': fields.qaipl4smHtotal && fields.qaipl4smHtotal.valid}"
                                   id="qaipl4smHtotal" name="qaipl4smHtotal"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smHtotal') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smH15" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smH15'), 'form-control-success': fields.qaipl4smH15 && fields.qaipl4smH15.valid}"
                                   id="qaipl4smH15" name="qaipl4smH15"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smH15') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smH16" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smH16'), 'form-control-success': fields.qaipl4smH16 && fields.qaipl4smH16.valid}"
                                   id="qaipl4smH16" name="qaipl4smH16"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smH16') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smH17" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smH17'), 'form-control-success': fields.qaipl4smH17 && fields.qaipl4smH17.valid}"
                                   id="qaipl4smH17" name="qaipl4smH17"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smH17') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smH18" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smH18'), 'form-control-success': fields.qaipl4smH18 && fields.qaipl4smH18.valid}"
                                   id="qaipl4smH18" name="qaipl4smH18"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smH18') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smH19" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smH19'), 'form-control-success': fields.qaipl4smH19 && fields.qaipl4smH19.valid}"
                                   id="qaipl4smH19" name="qaipl4smH19"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smH19') }}">
                        </td>
                    </tr>
                    <tr>
                        <td>PLC</td>
                        <td>
                            <input type="text" v-model="form.qaipl4smIqaipl5sm" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smIqaipl5sm'), 'form-control-success': fields.qaipl4smIqaipl5sm && fields.qaipl4smIqaipl5sm.valid}"
                                   id="qaipl4smIqaipl5sm" name="qaipl4smIqaipl5sm"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smIqaipl5sm') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smItotal" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smItotal'), 'form-control-success': fields.qaipl4smItotal && fields.qaipl4smItotal.valid}"
                                   id="qaipl4smItotal" name="qaipl4smItotal"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smItotal') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smI15" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smI15'), 'form-control-success': fields.qaipl4smI15 && fields.qaipl4smI15.valid}"
                                   id="qaipl4smI15" name="qaipl4smI15"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smI15') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smI16" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smI16'), 'form-control-success': fields.qaipl4smI16 && fields.qaipl4smI16.valid}"
                                   id="qaipl4smI16" name="qaipl4smI16"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smI16') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smI17" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smI17'), 'form-control-success': fields.qaipl4smI17 && fields.qaipl4smI17.valid}"
                                   id="qaipl4smI17" name="qaipl4smI17"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smI17') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smI18" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smI18'), 'form-control-success': fields.qaipl4smI18 && fields.qaipl4smI18.valid}"
                                   id="qaipl4smI18" name="qaipl4smI18"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smI18') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smI19" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smI19'), 'form-control-success': fields.qaipl4smI19 && fields.qaipl4smI19.valid}"
                                   id="qaipl4smI19" name="qaipl4smI19"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smI19') }}">
                        </td>
                    </tr>
                    <tr>
                        <td>HFC</td>
                        <td>
                            <input type="text" v-model="form.qaipl4smJqaipl5sm" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smJqaipl5sm'), 'form-control-success': fields.qaipl4smJqaipl5sm && fields.qaipl4smJqaipl5sm.valid}"
                                   id="qaipl4smJqaipl5sm" name="qaipl4smJqaipl5sm"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smJqaipl5sm') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smJtotal" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smJtotal'), 'form-control-success': fields.qaipl4smJtotal && fields.qaipl4smJtotal.valid}"
                                   id="qaipl4smJtotal" name="qaipl4smJtotal"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smJtotal') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smJ15" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smJ15'), 'form-control-success': fields.qaipl4smJ15 && fields.qaipl4smJ15.valid}"
                                   id="qaipl4smJ15" name="qaipl4smJ15"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smJ15') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smJ16" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smJ16'), 'form-control-success': fields.qaipl4smJ16 && fields.qaipl4smJ16.valid}"
                                   id="qaipl4smJ16" name="qaipl4smJ16"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smJ16') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smJ17" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smJ17'), 'form-control-success': fields.qaipl4smJ17 && fields.qaipl4smJ17.valid}"
                                   id="qaipl4smJ17" name="qaipl4smJ17"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smJ17') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smJ18" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smJ18'), 'form-control-success': fields.qaipl4smJ18 && fields.qaipl4smJ18.valid}"
                                   id="qaipl4smJ18" name="qaipl4smJ18"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smJ18') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smJ19" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smJ19'), 'form-control-success': fields.qaipl4smJ19 && fields.qaipl4smJ19.valid}"
                                   id="qaipl4smJ19" name="qaipl4smJ19"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smJ19') }}">
                        </td>
                    </tr>
                    <tr>
                        <td>WIMAX</td>
                        <td>
                            <input type="text" v-model="form.qaipl4smKqaipl5sm" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smKqaipl5sm'), 'form-control-success': fields.qaipl4smKqaipl5sm && fields.qaipl4smKqaipl5sm.valid}"
                                   id="qaipl4smKqaipl5sm" name="qaipl4smKqaipl5sm"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smKqaipl5sm') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smKtotal" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smKtotal'), 'form-control-success': fields.qaipl4smKtotal && fields.qaipl4smKtotal.valid}"
                                   id="qaipl4smKtotal" name="qaipl4smKtotal"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smKtotal') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smK15" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smK15'), 'form-control-success': fields.qaipl4smK15 && fields.qaipl4smK15.valid}"
                                   id="qaipl4smK15" name="qaipl4smK15"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smK15') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smK16" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smK16'), 'form-control-success': fields.qaipl4smK16 && fields.qaipl4smK16.valid}"
                                   id="qaipl4smK16" name="qaipl4smK16"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smK16') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smK17" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smK17'), 'form-control-success': fields.qaipl4smK17 && fields.qaipl4smK17.valid}"
                                   id="qaipl4smK17" name="qaipl4smK17"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smK17') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smK18" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smK18'), 'form-control-success': fields.qaipl4smK18 && fields.qaipl4smK18.valid}"
                                   id="qaipl4smK18" name="qaipl4smK18"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smK18') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smK19" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smK19'), 'form-control-success': fields.qaipl4smK19 && fields.qaipl4smK19.valid}"
                                   id="qaipl4smK19" name="qaipl4smK19"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smK19') }}">
                        </td>
                    </tr>
                    <tr>
                        <td>LTE</td>
                        <td>
                            <input type="text" v-model="form.qaipl4smLqaipl5sm" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smLqaipl5sm'), 'form-control-success': fields.qaipl4smLqaipl5sm && fields.qaipl4smLqaipl5sm.valid}"
                                   id="qaipl4smLqaipl5sm" name="qaipl4smLqaipl5sm"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smLqaipl5sm') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smLtotal" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smLtotal'), 'form-control-success': fields.qaipl4smLtotal && fields.qaipl4smLtotal.valid}"
                                   id="qaipl4smLtotal" name="qaipl4smLtotal"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smLtotal') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smL15" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smL15'), 'form-control-success': fields.qaipl4smL15 && fields.qaipl4smL15.valid}"
                                   id="qaipl4smL15" name="qaipl4smL15"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smL15') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smL16" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smL16'), 'form-control-success': fields.qaipl4smL16 && fields.qaipl4smL16.valid}"
                                   id="qaipl4smL16" name="qaipl4smL16"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smL16') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smL17" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smL17'), 'form-control-success': fields.qaipl4smL17 && fields.qaipl4smL17.valid}"
                                   id="qaipl4smL17" name="qaipl4smL17"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smL17') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smL18" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smL18'), 'form-control-success': fields.qaipl4smL18 && fields.qaipl4smL18.valid}"
                                   id="qaipl4smL18" name="qaipl4smL18"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smL18') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smL19" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smL19'), 'form-control-success': fields.qaipl4smL19 && fields.qaipl4smL19.valid}"
                                   id="qaipl4smL19" name="qaipl4smL19"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smL19') }}">
                        </td>
                    </tr>
                    <tr>
                        <td>ETHERNET</td>
                        <td>
                            <input type="text" v-model="form.qaipl4smMqaipl5sm" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smMqaipl5sm'), 'form-control-success': fields.qaipl4smMqaipl5sm && fields.qaipl4smMqaipl5sm.valid}"
                                   id="qaipl4smMqaipl5sm" name="qaipl4smMqaipl5sm"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smMqaipl5sm') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smMtotal" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smMtotal'), 'form-control-success': fields.qaipl4smMtotal && fields.qaipl4smMtotal.valid}"
                                   id="qaipl4smMtotal" name="qaipl4smMtotal"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smMtotal') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smM15" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smM15'), 'form-control-success': fields.qaipl4smM15 && fields.qaipl4smM15.valid}"
                                   id="qaipl4smM15" name="qaipl4smM15"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smM15') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smM16" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smM16'), 'form-control-success': fields.qaipl4smM16 && fields.qaipl4smM16.valid}"
                                   id="qaipl4smM16" name="qaipl4smM16"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smM16') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smM17" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smM17'), 'form-control-success': fields.qaipl4smM17 && fields.qaipl4smM17.valid}"
                                   id="qaipl4smM17" name="qaipl4smM17"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smM17') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smM18" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smM18'), 'form-control-success': fields.qaipl4smM18 && fields.qaipl4smM18.valid}"
                                   id="qaipl4smM18" name="qaipl4smM18"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smM18') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smM19" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smM19'), 'form-control-success': fields.qaipl4smM19 && fields.qaipl4smM19.valid}"
                                   id="qaipl4smM19" name="qaipl4smM19"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smM19') }}">
                        </td>
                    </tr>
                    <tr>
                        <td>FR</td>
                        <td>
                            <input type="text" v-model="form.qaipl4smNqaipl5sm" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smNqaipl5sm'), 'form-control-success': fields.qaipl4smNqaipl5sm && fields.qaipl4smNqaipl5sm.valid}"
                                   id="qaipl4smNqaipl5sm" name="qaipl4smNqaipl5sm"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smNqaipl5sm') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smNtotal" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smNtotal'), 'form-control-success': fields.qaipl4smNtotal && fields.qaipl4smNtotal.valid}"
                                   id="qaipl4smNtotal" name="qaipl4smNtotal"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smNtotal') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smN15" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smN15'), 'form-control-success': fields.qaipl4smN15 && fields.qaipl4smN15.valid}"
                                   id="qaipl4smN15" name="qaipl4smN15"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smN15') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smN16" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smN16'), 'form-control-success': fields.qaipl4smN16 && fields.qaipl4smN16.valid}"
                                   id="qaipl4smN16" name="qaipl4smN16"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smN16') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smN17" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smN17'), 'form-control-success': fields.qaipl4smN17 && fields.qaipl4smN17.valid}"
                                   id="qaipl4smN17" name="qaipl4smN17"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smN17') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smN18" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smN18'), 'form-control-success': fields.qaipl4smN18 && fields.qaipl4smN18.valid}"
                                   id="qaipl4smN18" name="qaipl4smN18"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smN18') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smN19" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smN19'), 'form-control-success': fields.qaipl4smN19 && fields.qaipl4smN19.valid}"
                                   id="qaipl4smN19" name="qaipl4smN19"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smN19') }}">
                        </td>
                    </tr>
                    <tr>
                        <td>ATM</td>
                        <td>
                            <input type="text" v-model="form.qaipl4smOqaipl5sm" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smOqaipl5sm'), 'form-control-success': fields.qaipl4smOqaipl5sm && fields.qaipl4smOqaipl5sm.valid}"
                                   id="qaipl4smOqaipl5sm" name="qaipl4smOqaipl5sm"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smOqaipl5sm') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smOtotal" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smOtotal'), 'form-control-success': fields.qaipl4smOtotal && fields.qaipl4smOtotal.valid}"
                                   id="qaipl4smOtotal" name="qaipl4smOtotal"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smOtotal') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smO15" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smO15'), 'form-control-success': fields.qaipl4smO15 && fields.qaipl4smO15.valid}"
                                   id="qaipl4smO15" name="qaipl4smO15"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smO15') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smO16" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smO16'), 'form-control-success': fields.qaipl4smO16 && fields.qaipl4smO16.valid}"
                                   id="qaipl4smO16" name="qaipl4smO16"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smO16') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smO17" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smO17'), 'form-control-success': fields.qaipl4smO17 && fields.qaipl4smO17.valid}"
                                   id="qaipl4smO17" name="qaipl4smO17"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smO17') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smO18" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smO18'), 'form-control-success': fields.qaipl4smO18 && fields.qaipl4smO18.valid}"
                                   id="qaipl4smO18" name="qaipl4smO18"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smO18') }}">
                        </td>
                        <td>
                            <input type="text" v-model="form.qaipl4smO19" v-validate="'integer'"
                                   v-money="integer"
                                   @input="validate($event)"
                                   class="form-control"
                                   :class="{'form-control-danger': errors.has('qaipl4smO19'), 'form-control-success': fields.qaipl4smO19 && fields.qaipl4smO19.valid}"
                                   id="qaipl4smO19" name="qaipl4smO19"
                                   placeholder="{{ trans('admin.sici.columns.qaipl4smO19') }}">
                        </td>
                    </tr>
                    </tbody>
                </table>

                <div class="card">
                    <div class="card-header">
                        IPL6
                    </div>
                    <div class="card-body">
                        <div class="form-group row align-items-center"
                             :class="{'has-danger': errors.has('ipl6im'), 'has-success': fields.ipl6im && fields.ipl6im.valid }">
                            <label for="ipl6im" class="col-form-label text-md-right"
                                   :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.ipl6im') }}</label>
                            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                                <input type="text" v-model="form.ipl6im" v-validate="'integer'" v-money="integer"
                                       @input="validate($event)" class="form-control"
                                       :class="{'form-control-danger': errors.has('ipl6im'), 'form-control-success': fields.ipl6im && fields.ipl6im.valid}"
                                       id="ipl6im" name="ipl6im" placeholder="{{ trans('admin.sici.columns.ipl6im') }}">
                                <div v-if="errors.has('ipl6im')" class="form-control-feedback form-text" v-cloak>@{{
                                    errors.first('ipl6im') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<div class="card">
    <div class="card-header">
        Indicadores
    </div>
    <div class="card-body">

        <div class="card">
            <div class="card-header">
                IAU
            </div>
            <div class="card-body">
                <div class="form-group row align-items-center"
                     :class="{'has-danger': errors.has('iau1'), 'has-success': fields.iau1 && fields.iau1.valid }">
                    <label for="iau1" class="col-form-label text-md-right"
                           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iau1') }}</label>
                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                        <input type="text" v-model="form.iau1" v-validate="'integer'" v-money="integer"
                               @input="validate($event)" class="form-control"
                               :class="{'form-control-danger': errors.has('iau1'), 'form-control-success': fields.iau1 && fields.iau1.valid}"
                               id="iau1" name="iau1" placeholder="{{ trans('admin.sici.columns.iau1') }}">
                        <div v-if="errors.has('iau1')" class="form-control-feedback form-text" v-cloak>@{{
                            errors.first('iau1')
                            }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                IPL1
            </div>
            <div class="card-body">
                <div class="form-group row align-items-center"
                     :class="{'has-danger': errors.has('ipl1a'), 'has-success': fields.ipl1a && fields.ipl1a.valid }">
                    <label for="ipl1a" class="col-form-label text-md-right"
                           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.ipl1a') }}</label>
                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                        <input type="text" v-model="form.ipl1a" v-validate="''" @input="validate($event)"
                               class="form-control"
                               v-money="money"
                               :class="{'form-control-danger': errors.has('ipl1a'), 'form-control-success': fields.ipl1a && fields.ipl1a.valid}"
                               id="ipl1a" name="ipl1a" placeholder="{{ trans('admin.sici.columns.ipl1a') }}">
                        <div v-if="errors.has('ipl1a')" class="form-control-feedback form-text" v-cloak>@{{
                            errors.first('ipl1a') }}
                        </div>
                    </div>
                </div>

                <div class="form-group row align-items-center"
                     :class="{'has-danger': errors.has('ipl1b'), 'has-success': fields.ipl1b && fields.ipl1b.valid }">
                    <label for="ipl1b" class="col-form-label text-md-right"
                           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.ipl1b') }}</label>
                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                        <input type="text" v-model="form.ipl1b" v-validate="''" @input="validate($event)"
                               class="form-control"
                               v-money="money"
                               :class="{'form-control-danger': errors.has('ipl1b'), 'form-control-success': fields.ipl1b && fields.ipl1b.valid}"
                               id="ipl1b" name="ipl1b" placeholder="{{ trans('admin.sici.columns.ipl1b') }}">
                        <div v-if="errors.has('ipl1b')" class="form-control-feedback form-text" v-cloak>@{{
                            errors.first('ipl1b') }}
                        </div>
                    </div>
                </div>

                <div class="form-group row align-items-center"
                     :class="{'has-danger': errors.has('ipl1c'), 'has-success': fields.ipl1c && fields.ipl1c.valid }">
                    <label for="ipl1c" class="col-form-label text-md-right"
                           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.ipl1c') }}</label>
                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                        <input type="text" v-model="form.ipl1c" v-validate="''" @input="validate($event)"
                               class="form-control"
                               v-money="money"
                               :class="{'form-control-danger': errors.has('ipl1c'), 'form-control-success': fields.ipl1c && fields.ipl1c.valid}"
                               id="ipl1c" name="ipl1c" placeholder="{{ trans('admin.sici.columns.ipl1c') }}">
                        <div v-if="errors.has('ipl1c')" class="form-control-feedback form-text" v-cloak>@{{
                            errors.first('ipl1c') }}
                        </div>
                    </div>
                </div>

                <div class="form-group row align-items-center"
                     :class="{'has-danger': errors.has('ipl1d'), 'has-success': fields.ipl1d && fields.ipl1d.valid }">
                    <label for="ipl1d" class="col-form-label text-md-right"
                           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.ipl1d') }}</label>
                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                        <input type="text" v-model="form.ipl1d" v-validate="''" @input="validate($event)"
                               class="form-control"
                               v-money="money"
                               :class="{'form-control-danger': errors.has('ipl1d'), 'form-control-success': fields.ipl1d && fields.ipl1d.valid}"
                               id="ipl1d" name="ipl1d" placeholder="{{ trans('admin.sici.columns.ipl1d') }}">
                        <div v-if="errors.has('ipl1d')" class="form-control-feedback form-text" v-cloak>@{{
                            errors.first('ipl1d') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                IPL2
            </div>
            <div class="card-body">
                <div class="form-group row align-items-center"
                     :class="{'has-danger': errors.has('ipl2a'), 'has-success': fields.ipl2a && fields.ipl2a.valid }">
                    <label for="ipl2a" class="col-form-label text-md-right"
                           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.ipl2a') }}</label>
                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                        <input type="text" v-model="form.ipl2a" v-validate="''" @input="validate($event)"
                               class="form-control"
                               v-money="money"
                               :class="{'form-control-danger': errors.has('ipl2a'), 'form-control-success': fields.ipl2a && fields.ipl2a.valid}"
                               id="ipl2a" name="ipl2a" placeholder="{{ trans('admin.sici.columns.ipl2a') }}">
                        <div v-if="errors.has('ipl2a')" class="form-control-feedback form-text" v-cloak>@{{
                            errors.first('ipl2a') }}
                        </div>
                    </div>
                </div>

                <div class="form-group row align-items-center"
                     :class="{'has-danger': errors.has('ipl2b'), 'has-success': fields.ipl2b && fields.ipl2b.valid }">
                    <label for="ipl2b" class="col-form-label text-md-right"
                           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.ipl2b') }}</label>
                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                        <input type="text" v-model="form.ipl2b" v-validate="''" @input="validate($event)"
                               class="form-control"
                               v-money="money"
                               :class="{'form-control-danger': errors.has('ipl2b'), 'form-control-success': fields.ipl2b && fields.ipl2b.valid}"
                               id="ipl2b" name="ipl2b" placeholder="{{ trans('admin.sici.columns.ipl2b') }}">
                        <div v-if="errors.has('ipl2b')" class="form-control-feedback form-text" v-cloak>@{{
                            errors.first('ipl2b') }}
                        </div>
                    </div>
                </div>

                <div class="form-group row align-items-center"
                     :class="{'has-danger': errors.has('ipl2c'), 'has-success': fields.ipl2c && fields.ipl2c.valid }">
                    <label for="ipl2c" class="col-form-label text-md-right"
                           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.ipl2c') }}</label>
                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                        <input type="text" v-model="form.ipl2c" v-validate="''" @input="validate($event)"
                               class="form-control"
                               v-money="money"
                               :class="{'form-control-danger': errors.has('ipl2c'), 'form-control-success': fields.ipl2c && fields.ipl2c.valid}"
                               id="ipl2c" name="ipl2c" placeholder="{{ trans('admin.sici.columns.ipl2c') }}">
                        <div v-if="errors.has('ipl2c')" class="form-control-feedback form-text" v-cloak>@{{
                            errors.first('ipl2c') }}
                        </div>
                    </div>
                </div>

                <div class="form-group row align-items-center"
                     :class="{'has-danger': errors.has('ipl2d'), 'has-success': fields.ipl2d && fields.ipl2d.valid }">
                    <label for="ipl2d" class="col-form-label text-md-right"
                           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.ipl2d') }}</label>
                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                        <input type="text" v-model="form.ipl2d" v-validate="''" @input="validate($event)"
                               class="form-control"
                               v-money="money"
                               :class="{'form-control-danger': errors.has('ipl2d'), 'form-control-success': fields.ipl2d && fields.ipl2d.valid}"
                               id="ipl2d" name="ipl2d" placeholder="{{ trans('admin.sici.columns.ipl2d') }}">
                        <div v-if="errors.has('ipl2d')" class="form-control-feedback form-text" v-cloak>@{{
                            errors.first('ipl2d') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                IEM1
            </div>
            <div class="card-body">
                <div class="form-group row align-items-center"
                     :class="{'has-danger': errors.has('iem1a'), 'has-success': fields.iem1a && fields.iem1a.valid }">
                    <label for="iem1a" class="col-form-label text-md-right"
                           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem1a') }}</label>
                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                        <input type="text" v-model="form.iem1a" v-validate="''" @input="validate($event)"
                               class="form-control"
                               v-money="money"
                               :class="{'form-control-danger': errors.has('iem1a'), 'form-control-success': fields.iem1a && fields.iem1a.valid}"
                               id="iem1a" name="iem1a" placeholder="{{ trans('admin.sici.columns.iem1a') }}">
                        <div v-if="errors.has('iem1a')" class="form-control-feedback form-text" v-cloak>@{{
                            errors.first('iem1a') }}
                        </div>
                    </div>
                </div>

                <div class="form-group row align-items-center"
                     :class="{'has-danger': errors.has('iem1b'), 'has-success': fields.iem1b && fields.iem1b.valid }">
                    <label for="iem1b" class="col-form-label text-md-right"
                           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem1b') }}</label>
                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                        <input type="text" v-model="form.iem1b" v-validate="''" @input="validate($event)"
                               class="form-control"
                               v-money="money"
                               :class="{'form-control-danger': errors.has('iem1b'), 'form-control-success': fields.iem1b && fields.iem1b.valid}"
                               id="iem1b" name="iem1b" placeholder="{{ trans('admin.sici.columns.iem1b') }}">
                        <div v-if="errors.has('iem1b')" class="form-control-feedback form-text" v-cloak>@{{
                            errors.first('iem1b') }}
                        </div>
                    </div>
                </div>

                <div class="form-group row align-items-center"
                     :class="{'has-danger': errors.has('iem1c'), 'has-success': fields.iem1c && fields.iem1c.valid }">
                    <label for="iem1c" class="col-form-label text-md-right"
                           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem1c') }}</label>
                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                        <input type="text" v-model="form.iem1c" v-validate="''" @input="validate($event)"
                               class="form-control"
                               v-money="money"
                               :class="{'form-control-danger': errors.has('iem1c'), 'form-control-success': fields.iem1c && fields.iem1c.valid}"
                               id="iem1c" name="iem1c" placeholder="{{ trans('admin.sici.columns.iem1c') }}">
                        <div v-if="errors.has('iem1c')" class="form-control-feedback form-text" v-cloak>@{{
                            errors.first('iem1c') }}
                        </div>
                    </div>
                </div>

                <div class="form-group row align-items-center"
                     :class="{'has-danger': errors.has('iem1d'), 'has-success': fields.iem1d && fields.iem1d.valid }">
                    <label for="iem1d" class="col-form-label text-md-right"
                           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem1d') }}</label>
                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                        <input type="text" v-model="form.iem1d" v-validate="''" @input="validate($event)"
                               class="form-control"
                               v-money="money"
                               :class="{'form-control-danger': errors.has('iem1d'), 'form-control-success': fields.iem1d && fields.iem1d.valid}"
                               id="iem1d" name="iem1d" placeholder="{{ trans('admin.sici.columns.iem1d') }}">
                        <div v-if="errors.has('iem1d')" class="form-control-feedback form-text" v-cloak>@{{
                            errors.first('iem1d') }}
                        </div>
                    </div>
                </div>

                <div class="form-group row align-items-center"
                     :class="{'has-danger': errors.has('iem1e'), 'has-success': fields.iem1e && fields.iem1e.valid }">
                    <label for="iem1e" class="col-form-label text-md-right"
                           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem1e') }}</label>
                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                        <input type="text" v-model="form.iem1e" v-validate="''" @input="validate($event)"
                               class="form-control"
                               v-money="money"
                               :class="{'form-control-danger': errors.has('iem1e'), 'form-control-success': fields.iem1e && fields.iem1e.valid}"
                               id="iem1e" name="iem1e" placeholder="{{ trans('admin.sici.columns.iem1e') }}">
                        <div v-if="errors.has('iem1e')" class="form-control-feedback form-text" v-cloak>@{{
                            errors.first('iem1e') }}
                        </div>
                    </div>
                </div>

                <div class="form-group row align-items-center"
                     :class="{'has-danger': errors.has('iem1f'), 'has-success': fields.iem1f && fields.iem1f.valid }">
                    <label for="iem1f" class="col-form-label text-md-right"
                           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem1f') }}</label>
                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                        <input type="text" v-model="form.iem1f" v-validate="''" @input="validate($event)"
                               class="form-control"
                               v-money="money"
                               :class="{'form-control-danger': errors.has('iem1f'), 'form-control-success': fields.iem1f && fields.iem1f.valid}"
                               id="iem1f" name="iem1f" placeholder="{{ trans('admin.sici.columns.iem1f') }}">
                        <div v-if="errors.has('iem1f')" class="form-control-feedback form-text" v-cloak>@{{
                            errors.first('iem1f') }}
                        </div>
                    </div>
                </div>

                <div class="form-group row align-items-center"
                     :class="{'has-danger': errors.has('iem1g'), 'has-success': fields.iem1g && fields.iem1g.valid }">
                    <label for="iem1g" class="col-form-label text-md-right"
                           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem1g') }}</label>
                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                        <input type="text" v-model="form.iem1g" v-validate="''" @input="validate($event)"
                               class="form-control"
                               v-money="money"
                               :class="{'form-control-danger': errors.has('iem1g'), 'form-control-success': fields.iem1g && fields.iem1g.valid}"
                               id="iem1g" name="iem1g" placeholder="{{ trans('admin.sici.columns.iem1g') }}">
                        <div v-if="errors.has('iem1g')" class="form-control-feedback form-text" v-cloak>@{{
                            errors.first('iem1g') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                IEM2
            </div>
            <div class="card-body">
                <div class="form-group row align-items-center"
                     :class="{'has-danger': errors.has('iem2a'), 'has-success': fields.iem2a && fields.iem2a.valid }">
                    <label for="iem2a" class="col-form-label text-md-right"
                           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem2a') }}</label>
                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                        <input type="text" v-model="form.iem2a" v-validate="''" @input="validate($event)"
                               class="form-control"
                               v-money="money"
                               :class="{'form-control-danger': errors.has('iem2a'), 'form-control-success': fields.iem2a && fields.iem2a.valid}"
                               id="iem2a" name="iem2a" placeholder="{{ trans('admin.sici.columns.iem2a') }}">
                        <div v-if="errors.has('iem2a')" class="form-control-feedback form-text" v-cloak>@{{
                            errors.first('iem2a') }}
                        </div>
                    </div>
                </div>

                <div class="form-group row align-items-center"
                     :class="{'has-danger': errors.has('iem2b'), 'has-success': fields.iem2b && fields.iem2b.valid }">
                    <label for="iem2b" class="col-form-label text-md-right"
                           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem2b') }}</label>
                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                        <input type="text" v-model="form.iem2b" v-validate="''" @input="validate($event)"
                               class="form-control"
                               v-money="money"
                               :class="{'form-control-danger': errors.has('iem2b'), 'form-control-success': fields.iem2b && fields.iem2b.valid}"
                               id="iem2b" name="iem2b" placeholder="{{ trans('admin.sici.columns.iem2b') }}">
                        <div v-if="errors.has('iem2b')" class="form-control-feedback form-text" v-cloak>@{{
                            errors.first('iem2b') }}
                        </div>
                    </div>
                </div>

                <div class="form-group row align-items-center"
                     :class="{'has-danger': errors.has('iem2c'), 'has-success': fields.iem2c && fields.iem2c.valid }">
                    <label for="iem2c" class="col-form-label text-md-right"
                           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem2c') }}</label>
                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                        <input type="text" v-model="form.iem2c" v-validate="''" @input="validate($event)"
                               class="form-control"
                               v-money="money"
                               :class="{'form-control-danger': errors.has('iem2c'), 'form-control-success': fields.iem2c && fields.iem2c.valid}"
                               id="iem2c" name="iem2c" placeholder="{{ trans('admin.sici.columns.iem2c') }}">
                        <div v-if="errors.has('iem2c')" class="form-control-feedback form-text" v-cloak>@{{
                            errors.first('iem2c') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                IEM6
            </div>
            <div class="card-body">
                <div class="form-group row align-items-center"
                     :class="{'has-danger': errors.has('iem3a'), 'has-success': fields.iem3a && fields.iem3a.valid }">
                    <label for="iem3a" class="col-form-label text-md-right"
                           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem3a') }}</label>
                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                        <input type="text" v-model="form.iem3a" v-validate="''" @input="validate($event)"
                               class="form-control"
                               v-money="money"
                               :class="{'form-control-danger': errors.has('iem3a'), 'form-control-success': fields.iem3a && fields.iem3a.valid}"
                               id="iem3a" name="iem3a" placeholder="{{ trans('admin.sici.columns.iem3a') }}">
                        <div v-if="errors.has('iem3a')" class="form-control-feedback form-text" v-cloak>@{{
                            errors.first('iem3a') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                IEM6
            </div>
            <div class="card-body">
                <div class="form-group row align-items-center"
                     :class="{'has-danger': errors.has('iem6a'), 'has-success': fields.iem6a && fields.iem6a.valid }">
                    <label for="iem6a" class="col-form-label text-md-right"
                           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem6a') }}</label>
                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                        <input type="text" v-model="form.iem6a" v-validate="''" @input="validate($event)"
                               class="form-control"
                               v-money="money"
                               :class="{'form-control-danger': errors.has('iem6a'), 'form-control-success': fields.iem6a && fields.iem6a.valid}"
                               id="iem6a" name="iem6a" placeholder="{{ trans('admin.sici.columns.iem6a') }}">
                        <div v-if="errors.has('iem6a')" class="form-control-feedback form-text" v-cloak>@{{
                            errors.first('iem6a') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                IEM7
            </div>
            <div class="card-body">
                <div class="form-group row align-items-center"
                     :class="{'has-danger': errors.has('iem7a'), 'has-success': fields.iem7a && fields.iem7a.valid }">
                    <label for="iem7a" class="col-form-label text-md-right"
                           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem7a') }}</label>
                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                        <input type="text" v-model="form.iem7a" v-validate="''" @input="validate($event)"
                               class="form-control"
                               v-money="money"
                               :class="{'form-control-danger': errors.has('iem7a'), 'form-control-success': fields.iem7a && fields.iem7a.valid}"
                               id="iem7a" name="iem7a" placeholder="{{ trans('admin.sici.columns.iem7a') }}">
                        <div v-if="errors.has('iem7a')" class="form-control-feedback form-text" v-cloak>@{{
                            errors.first('iem7a') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                IEM8
            </div>
            <div class="card-body">
                <div class="form-group row align-items-center"
                     :class="{'has-danger': errors.has('iem8a'), 'has-success': fields.iem8a && fields.iem8a.valid }">
                    <label for="iem8a" class="col-form-label text-md-right"
                           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem8a') }}</label>
                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                        <input type="text" v-model="form.iem8a" v-validate="''" @input="validate($event)"
                               class="form-control"
                               v-money="money"
                               :class="{'form-control-danger': errors.has('iem8a'), 'form-control-success': fields.iem8a && fields.iem8a.valid}"
                               id="iem8a" name="iem8a" placeholder="{{ trans('admin.sici.columns.iem8a') }}">
                        <div v-if="errors.has('iem8a')" class="form-control-feedback form-text" v-cloak>@{{
                            errors.first('iem8a') }}
                        </div>
                    </div>
                </div>

                <div class="form-group row align-items-center"
                     :class="{'has-danger': errors.has('iem8b'), 'has-success': fields.iem8b && fields.iem8b.valid }">
                    <label for="iem8b" class="col-form-label text-md-right"
                           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem8b') }}</label>
                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                        <input type="text" v-model="form.iem8b" v-validate="''" @input="validate($event)"
                               class="form-control"
                               v-money="money"
                               :class="{'form-control-danger': errors.has('iem8b'), 'form-control-success': fields.iem8b && fields.iem8b.valid}"
                               id="iem8b" name="iem8b" placeholder="{{ trans('admin.sici.columns.iem8b') }}">
                        <div v-if="errors.has('iem8b')" class="form-control-feedback form-text" v-cloak>@{{
                            errors.first('iem8b') }}
                        </div>
                    </div>
                </div>

                <div class="form-group row align-items-center"
                     :class="{'has-danger': errors.has('iem8c'), 'has-success': fields.iem8c && fields.iem8c.valid }">
                    <label for="iem8c" class="col-form-label text-md-right"
                           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem8c') }}</label>
                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                        <input type="text" v-model="form.iem8c" v-validate="''" @input="validate($event)"
                               class="form-control"
                               v-money="money"
                               :class="{'form-control-danger': errors.has('iem8c'), 'form-control-success': fields.iem8c && fields.iem8c.valid}"
                               id="iem8c" name="iem8c" placeholder="{{ trans('admin.sici.columns.iem8c') }}">
                        <div v-if="errors.has('iem8c')" class="form-control-feedback form-text" v-cloak>@{{
                            errors.first('iem8c') }}
                        </div>
                    </div>
                </div>

                <div class="form-group row align-items-center"
                     :class="{'has-danger': errors.has('iem8d'), 'has-success': fields.iem8d && fields.iem8d.valid }">
                    <label for="iem8d" class="col-form-label text-md-right"
                           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem8d') }}</label>
                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                        <input type="text" v-model="form.iem8d" v-validate="''" @input="validate($event)"
                               class="form-control"
                               v-money="money"
                               :class="{'form-control-danger': errors.has('iem8d'), 'form-control-success': fields.iem8d && fields.iem8d.valid}"
                               id="iem8d" name="iem8d" placeholder="{{ trans('admin.sici.columns.iem8d') }}">
                        <div v-if="errors.has('iem8d')" class="form-control-feedback form-text" v-cloak>@{{
                            errors.first('iem8d') }}
                        </div>
                    </div>
                </div>

                <div class="form-group row align-items-center"
                     :class="{'has-danger': errors.has('iem8e'), 'has-success': fields.iem8e && fields.iem8e.valid }">
                    <label for="iem8e" class="col-form-label text-md-right"
                           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem8e') }}</label>
                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                        <input type="text" v-model="form.iem8e" v-validate="''" @input="validate($event)"
                               class="form-control"
                               v-money="money"
                               :class="{'form-control-danger': errors.has('iem8e'), 'form-control-success': fields.iem8e && fields.iem8e.valid}"
                               id="iem8e" name="iem8e" placeholder="{{ trans('admin.sici.columns.iem8e') }}">
                        <div v-if="errors.has('iem8e')" class="form-control-feedback form-text" v-cloak>@{{
                            errors.first('iem8e') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@if($mode === 'create' && auth()->user()->is_admin === 1)
    @include('brackets/admin-ui::admin.includes.media-uploader', [
        'mediaCollection' => app(App\Models\Sici::class)->getMediaCollection('pdf'),
        'label' => 'Recibo'
    ])
@endif

@if($mode === 'edit' && auth()->user()->is_admin === 1)
    @include('brackets/admin-ui::admin.includes.media-uploader', [
        'mediaCollection' => $sici->getMediaCollection('pdf'),
        'media' => $sici->getThumbs200ForCollection('pdf'),
        'label' => 'Recibo'
    ])
@endif

@php
    if(isset($sici)){
        $mediaItems = $sici->getMedia('pdf');
        $publicFullUrl = $mediaItems[0]->getFullUrl(); //url including domain
    }
@endphp

@if(auth()->user()->is_admin !== 1 && isset($publicFullUrl))
    <div class="form-group row align-items-center"
         :class="{'has-danger': errors.has('iem8e'), 'has-success': fields.iem8e && fields.iem8e.valid }">
        <label for="iem8e" class="col-form-label text-md-right"
               :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Recibo</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <a class="btn btn-primary" href="{{$publicFullUrl}}" target="_blank">Baixe aqui</a>
        </div>
    </div>
@endif
