<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('ano'), 'has-success': fields.ano && fields.ano.valid }">
    <label for="ano" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.ano') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect
            v-model="form.ano"
            :options="yearList"
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
            :options="monthList"
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
        <input type="text" v-model="form.fistel" v-validate="'required'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('fistel'), 'form-control-success': fields.fistel && fields.fistel.valid}"
               id="fistel" name="fistel" placeholder="{{ trans('admin.sici.columns.fistel') }}">
        <div v-if="errors.has('fistel')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('fistel') }}
        </div>
    </div>
</div>

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

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('iem4a'), 'has-success': fields.iem4a && fields.iem4a.valid }">
    <label for="iem4a" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem4a') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.iem4a" v-validate="'integer'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('iem4a'), 'form-control-success': fields.iem4a && fields.iem4a.valid}"
               id="iem4a" name="iem4a" placeholder="{{ trans('admin.sici.columns.iem4a') }}">
        <div v-if="errors.has('iem4a')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('iem4a') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('iem5a'), 'has-success': fields.iem5a && fields.iem5a.valid }">
    <label for="iem5a" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem5a') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.iem5a" v-validate="'integer'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('iem5a'), 'form-control-success': fields.iem5a && fields.iem5a.valid}"
               id="iem5a" name="iem5a" placeholder="{{ trans('admin.sici.columns.iem5a') }}">
        <div v-if="errors.has('iem5a')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('iem5a') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('iem9Fa'), 'has-success': fields.iem9Fa && fields.iem9Fa.valid }">
    <label for="iem9Fa" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem9Fa') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.iem9Fa" v-validate="'decimal'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('iem9Fa'), 'form-control-success': fields.iem9Fa && fields.iem9Fa.valid}"
               id="iem9Fa" name="iem9Fa" placeholder="{{ trans('admin.sici.columns.iem9Fa') }}">
        <div v-if="errors.has('iem9Fa')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('iem9Fa') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('iem9Fb'), 'has-success': fields.iem9Fb && fields.iem9Fb.valid }">
    <label for="iem9Fb" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem9Fb') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.iem9Fb" v-validate="'decimal'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('iem9Fb'), 'form-control-success': fields.iem9Fb && fields.iem9Fb.valid}"
               id="iem9Fb" name="iem9Fb" placeholder="{{ trans('admin.sici.columns.iem9Fb') }}">
        <div v-if="errors.has('iem9Fb')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('iem9Fb') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('iem9Fc'), 'has-success': fields.iem9Fc && fields.iem9Fc.valid }">
    <label for="iem9Fc" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem9Fc') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.iem9Fc" v-validate="'decimal'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('iem9Fc'), 'form-control-success': fields.iem9Fc && fields.iem9Fc.valid}"
               id="iem9Fc" name="iem9Fc" placeholder="{{ trans('admin.sici.columns.iem9Fc') }}">
        <div v-if="errors.has('iem9Fc')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('iem9Fc') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('iem9Fd'), 'has-success': fields.iem9Fd && fields.iem9Fd.valid }">
    <label for="iem9Fd" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem9Fd') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.iem9Fd" v-validate="'decimal'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('iem9Fd'), 'form-control-success': fields.iem9Fd && fields.iem9Fd.valid}"
               id="iem9Fd" name="iem9Fd" placeholder="{{ trans('admin.sici.columns.iem9Fd') }}">
        <div v-if="errors.has('iem9Fd')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('iem9Fd') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('iem9Fe'), 'has-success': fields.iem9Fe && fields.iem9Fe.valid }">
    <label for="iem9Fe" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem9Fe') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.iem9Fe" v-validate="'decimal'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('iem9Fe'), 'form-control-success': fields.iem9Fe && fields.iem9Fe.valid}"
               id="iem9Fe" name="iem9Fe" placeholder="{{ trans('admin.sici.columns.iem9Fe') }}">
        <div v-if="errors.has('iem9Fe')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('iem9Fe') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('iem9Ja'), 'has-success': fields.iem9Ja && fields.iem9Ja.valid }">
    <label for="iem9Ja" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem9Ja') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.iem9Ja" v-validate="'decimal'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('iem9Ja'), 'form-control-success': fields.iem9Ja && fields.iem9Ja.valid}"
               id="iem9Ja" name="iem9Ja" placeholder="{{ trans('admin.sici.columns.iem9Ja') }}">
        <div v-if="errors.has('iem9Ja')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('iem9Ja') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('iem9Jb'), 'has-success': fields.iem9Jb && fields.iem9Jb.valid }">
    <label for="iem9Jb" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem9Jb') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.iem9Jb" v-validate="'decimal'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('iem9Jb'), 'form-control-success': fields.iem9Jb && fields.iem9Jb.valid}"
               id="iem9Jb" name="iem9Jb" placeholder="{{ trans('admin.sici.columns.iem9Jb') }}">
        <div v-if="errors.has('iem9Jb')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('iem9Jb') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('iem9Jc'), 'has-success': fields.iem9Jc && fields.iem9Jc.valid }">
    <label for="iem9Jc" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem9Jc') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.iem9Jc" v-validate="'decimal'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('iem9Jc'), 'form-control-success': fields.iem9Jc && fields.iem9Jc.valid}"
               id="iem9Jc" name="iem9Jc" placeholder="{{ trans('admin.sici.columns.iem9Jc') }}">
        <div v-if="errors.has('iem9Jc')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('iem9Jc') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('iem9Jd'), 'has-success': fields.iem9Jd && fields.iem9Jd.valid }">
    <label for="iem9Jd" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem9Jd') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.iem9Jd" v-validate="'decimal'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('iem9Jd'), 'form-control-success': fields.iem9Jd && fields.iem9Jd.valid}"
               id="iem9Jd" name="iem9Jd" placeholder="{{ trans('admin.sici.columns.iem9Jd') }}">
        <div v-if="errors.has('iem9Jd')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('iem9Jd') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('iem9Je'), 'has-success': fields.iem9Je && fields.iem9Je.valid }">
    <label for="iem9Je" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem9Je') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.iem9Je" v-validate="'decimal'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('iem9Je'), 'form-control-success': fields.iem9Je && fields.iem9Je.valid}"
               id="iem9Je" name="iem9Je" placeholder="{{ trans('admin.sici.columns.iem9Je') }}">
        <div v-if="errors.has('iem9Je')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('iem9Je') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('iem10Fa'), 'has-success': fields.iem10Fa && fields.iem10Fa.valid }">
    <label for="iem10Fa" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem10Fa') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.iem10Fa" v-validate="'decimal'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('iem10Fa'), 'form-control-success': fields.iem10Fa && fields.iem10Fa.valid}"
               id="iem10Fa" name="iem10Fa" placeholder="{{ trans('admin.sici.columns.iem10Fa') }}">
        <div v-if="errors.has('iem10Fa')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('iem10Fa')
            }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('iem10Fb'), 'has-success': fields.iem10Fb && fields.iem10Fb.valid }">
    <label for="iem10Fb" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem10Fb') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.iem10Fb" v-validate="'decimal'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('iem10Fb'), 'form-control-success': fields.iem10Fb && fields.iem10Fb.valid}"
               id="iem10Fb" name="iem10Fb" placeholder="{{ trans('admin.sici.columns.iem10Fb') }}">
        <div v-if="errors.has('iem10Fb')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('iem10Fb')
            }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('iem10Fc'), 'has-success': fields.iem10Fc && fields.iem10Fc.valid }">
    <label for="iem10Fc" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem10Fc') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.iem10Fc" v-validate="'decimal'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('iem10Fc'), 'form-control-success': fields.iem10Fc && fields.iem10Fc.valid}"
               id="iem10Fc" name="iem10Fc" placeholder="{{ trans('admin.sici.columns.iem10Fc') }}">
        <div v-if="errors.has('iem10Fc')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('iem10Fc')
            }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('iem10Fd'), 'has-success': fields.iem10Fd && fields.iem10Fd.valid }">
    <label for="iem10Fd" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem10Fd') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.iem10Fd" v-validate="'decimal'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('iem10Fd'), 'form-control-success': fields.iem10Fd && fields.iem10Fd.valid}"
               id="iem10Fd" name="iem10Fd" placeholder="{{ trans('admin.sici.columns.iem10Fd') }}">
        <div v-if="errors.has('iem10Fd')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('iem10Fd')
            }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('iem10Ja'), 'has-success': fields.iem10Ja && fields.iem10Ja.valid }">
    <label for="iem10Ja" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem10Ja') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.iem10Ja" v-validate="'decimal'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('iem10Ja'), 'form-control-success': fields.iem10Ja && fields.iem10Ja.valid}"
               id="iem10Ja" name="iem10Ja" placeholder="{{ trans('admin.sici.columns.iem10Ja') }}">
        <div v-if="errors.has('iem10Ja')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('iem10Ja')
            }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('iem10Jb'), 'has-success': fields.iem10Jb && fields.iem10Jb.valid }">
    <label for="iem10Jb" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem10Jb') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.iem10Jb" v-validate="'decimal'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('iem10Jb'), 'form-control-success': fields.iem10Jb && fields.iem10Jb.valid}"
               id="iem10Jb" name="iem10Jb" placeholder="{{ trans('admin.sici.columns.iem10Jb') }}">
        <div v-if="errors.has('iem10Jb')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('iem10Jb')
            }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('iem10Jc'), 'has-success': fields.iem10Jc && fields.iem10Jc.valid }">
    <label for="iem10Jc" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem10Jc') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.iem10Jc" v-validate="'decimal'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('iem10Jc'), 'form-control-success': fields.iem10Jc && fields.iem10Jc.valid}"
               id="iem10Jc" name="iem10Jc" placeholder="{{ trans('admin.sici.columns.iem10Jc') }}">
        <div v-if="errors.has('iem10Jc')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('iem10Jc')
            }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('iem10Jd'), 'has-success': fields.iem10Jd && fields.iem10Jd.valid }">
    <label for="iem10Jd" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.iem10Jd') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.iem10Jd" v-validate="'decimal'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('iem10Jd'), 'form-control-success': fields.iem10Jd && fields.iem10Jd.valid}"
               id="iem10Jd" name="iem10Jd" placeholder="{{ trans('admin.sici.columns.iem10Jd') }}">
        <div v-if="errors.has('iem10Jd')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('iem10Jd')
            }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('ipl3Fa'), 'has-success': fields.ipl3Fa && fields.ipl3Fa.valid }">
    <label for="ipl3Fa" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.ipl3Fa') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.ipl3Fa" v-validate="'integer'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('ipl3Fa'), 'form-control-success': fields.ipl3Fa && fields.ipl3Fa.valid}"
               id="ipl3Fa" name="ipl3Fa" placeholder="{{ trans('admin.sici.columns.ipl3Fa') }}">
        <div v-if="errors.has('ipl3Fa')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('ipl3Fa') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('ipl3Ja'), 'has-success': fields.ipl3Ja && fields.ipl3Ja.valid }">
    <label for="ipl3Ja" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.ipl3Ja') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.ipl3Ja" v-validate="'integer'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('ipl3Ja'), 'form-control-success': fields.ipl3Ja && fields.ipl3Ja.valid}"
               id="ipl3Ja" name="ipl3Ja" placeholder="{{ trans('admin.sici.columns.ipl3Ja') }}">
        <div v-if="errors.has('ipl3Ja')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('ipl3Ja') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smAqaipl5sm'), 'has-success': fields.qaipl4smAqaipl5sm && fields.qaipl4smAqaipl5sm.valid }">
    <label for="qaipl4smAqaipl5sm" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smAqaipl5sm') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smAqaipl5sm" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smAqaipl5sm'), 'form-control-success': fields.qaipl4smAqaipl5sm && fields.qaipl4smAqaipl5sm.valid}"
               id="qaipl4smAqaipl5sm" name="qaipl4smAqaipl5sm"
               placeholder="{{ trans('admin.sici.columns.qaipl4smAqaipl5sm') }}">
        <div v-if="errors.has('qaipl4smAqaipl5sm')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smAqaipl5sm') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smAtotal'), 'has-success': fields.qaipl4smAtotal && fields.qaipl4smAtotal.valid }">
    <label for="qaipl4smAtotal" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smAtotal') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smAtotal" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smAtotal'), 'form-control-success': fields.qaipl4smAtotal && fields.qaipl4smAtotal.valid}"
               id="qaipl4smAtotal" name="qaipl4smAtotal" placeholder="{{ trans('admin.sici.columns.qaipl4smAtotal') }}">
        <div v-if="errors.has('qaipl4smAtotal')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smAtotal') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smA15'), 'has-success': fields.qaipl4smA15 && fields.qaipl4smA15.valid }">
    <label for="qaipl4smA15" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smA15') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smA15" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smA15'), 'form-control-success': fields.qaipl4smA15 && fields.qaipl4smA15.valid}"
               id="qaipl4smA15" name="qaipl4smA15" placeholder="{{ trans('admin.sici.columns.qaipl4smA15') }}">
        <div v-if="errors.has('qaipl4smA15')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smA15') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smA16'), 'has-success': fields.qaipl4smA16 && fields.qaipl4smA16.valid }">
    <label for="qaipl4smA16" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smA16') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smA16" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smA16'), 'form-control-success': fields.qaipl4smA16 && fields.qaipl4smA16.valid}"
               id="qaipl4smA16" name="qaipl4smA16" placeholder="{{ trans('admin.sici.columns.qaipl4smA16') }}">
        <div v-if="errors.has('qaipl4smA16')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smA16') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smA17'), 'has-success': fields.qaipl4smA17 && fields.qaipl4smA17.valid }">
    <label for="qaipl4smA17" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smA17') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smA17" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smA17'), 'form-control-success': fields.qaipl4smA17 && fields.qaipl4smA17.valid}"
               id="qaipl4smA17" name="qaipl4smA17" placeholder="{{ trans('admin.sici.columns.qaipl4smA17') }}">
        <div v-if="errors.has('qaipl4smA17')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smA17') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smA18'), 'has-success': fields.qaipl4smA18 && fields.qaipl4smA18.valid }">
    <label for="qaipl4smA18" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smA18') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smA18" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smA18'), 'form-control-success': fields.qaipl4smA18 && fields.qaipl4smA18.valid}"
               id="qaipl4smA18" name="qaipl4smA18" placeholder="{{ trans('admin.sici.columns.qaipl4smA18') }}">
        <div v-if="errors.has('qaipl4smA18')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smA18') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smA19'), 'has-success': fields.qaipl4smA19 && fields.qaipl4smA19.valid }">
    <label for="qaipl4smA19" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smA19') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smA19" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smA19'), 'form-control-success': fields.qaipl4smA19 && fields.qaipl4smA19.valid}"
               id="qaipl4smA19" name="qaipl4smA19" placeholder="{{ trans('admin.sici.columns.qaipl4smA19') }}">
        <div v-if="errors.has('qaipl4smA19')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smA19') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smBqaipl5sm'), 'has-success': fields.qaipl4smBqaipl5sm && fields.qaipl4smBqaipl5sm.valid }">
    <label for="qaipl4smBqaipl5sm" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smBqaipl5sm') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smBqaipl5sm" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smBqaipl5sm'), 'form-control-success': fields.qaipl4smBqaipl5sm && fields.qaipl4smBqaipl5sm.valid}"
               id="qaipl4smBqaipl5sm" name="qaipl4smBqaipl5sm"
               placeholder="{{ trans('admin.sici.columns.qaipl4smBqaipl5sm') }}">
        <div v-if="errors.has('qaipl4smBqaipl5sm')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smBqaipl5sm') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smBtotal'), 'has-success': fields.qaipl4smBtotal && fields.qaipl4smBtotal.valid }">
    <label for="qaipl4smBtotal" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smBtotal') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smBtotal" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smBtotal'), 'form-control-success': fields.qaipl4smBtotal && fields.qaipl4smBtotal.valid}"
               id="qaipl4smBtotal" name="qaipl4smBtotal" placeholder="{{ trans('admin.sici.columns.qaipl4smBtotal') }}">
        <div v-if="errors.has('qaipl4smBtotal')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smBtotal') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smB15'), 'has-success': fields.qaipl4smB15 && fields.qaipl4smB15.valid }">
    <label for="qaipl4smB15" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smB15') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smB15" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smB15'), 'form-control-success': fields.qaipl4smB15 && fields.qaipl4smB15.valid}"
               id="qaipl4smB15" name="qaipl4smB15" placeholder="{{ trans('admin.sici.columns.qaipl4smB15') }}">
        <div v-if="errors.has('qaipl4smB15')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smB15') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smB16'), 'has-success': fields.qaipl4smB16 && fields.qaipl4smB16.valid }">
    <label for="qaipl4smB16" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smB16') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smB16" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smB16'), 'form-control-success': fields.qaipl4smB16 && fields.qaipl4smB16.valid}"
               id="qaipl4smB16" name="qaipl4smB16" placeholder="{{ trans('admin.sici.columns.qaipl4smB16') }}">
        <div v-if="errors.has('qaipl4smB16')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smB16') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smB17'), 'has-success': fields.qaipl4smB17 && fields.qaipl4smB17.valid }">
    <label for="qaipl4smB17" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smB17') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smB17" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smB17'), 'form-control-success': fields.qaipl4smB17 && fields.qaipl4smB17.valid}"
               id="qaipl4smB17" name="qaipl4smB17" placeholder="{{ trans('admin.sici.columns.qaipl4smB17') }}">
        <div v-if="errors.has('qaipl4smB17')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smB17') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smB18'), 'has-success': fields.qaipl4smB18 && fields.qaipl4smB18.valid }">
    <label for="qaipl4smB18" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smB18') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smB18" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smB18'), 'form-control-success': fields.qaipl4smB18 && fields.qaipl4smB18.valid}"
               id="qaipl4smB18" name="qaipl4smB18" placeholder="{{ trans('admin.sici.columns.qaipl4smB18') }}">
        <div v-if="errors.has('qaipl4smB18')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smB18') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smB19'), 'has-success': fields.qaipl4smB19 && fields.qaipl4smB19.valid }">
    <label for="qaipl4smB19" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smB19') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smB19" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smB19'), 'form-control-success': fields.qaipl4smB19 && fields.qaipl4smB19.valid}"
               id="qaipl4smB19" name="qaipl4smB19" placeholder="{{ trans('admin.sici.columns.qaipl4smB19') }}">
        <div v-if="errors.has('qaipl4smB19')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smB19') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smCqaipl5sm'), 'has-success': fields.qaipl4smCqaipl5sm && fields.qaipl4smCqaipl5sm.valid }">
    <label for="qaipl4smCqaipl5sm" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smCqaipl5sm') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smCqaipl5sm" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smCqaipl5sm'), 'form-control-success': fields.qaipl4smCqaipl5sm && fields.qaipl4smCqaipl5sm.valid}"
               id="qaipl4smCqaipl5sm" name="qaipl4smCqaipl5sm"
               placeholder="{{ trans('admin.sici.columns.qaipl4smCqaipl5sm') }}">
        <div v-if="errors.has('qaipl4smCqaipl5sm')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smCqaipl5sm') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smCtotal'), 'has-success': fields.qaipl4smCtotal && fields.qaipl4smCtotal.valid }">
    <label for="qaipl4smCtotal" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smCtotal') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smCtotal" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smCtotal'), 'form-control-success': fields.qaipl4smCtotal && fields.qaipl4smCtotal.valid}"
               id="qaipl4smCtotal" name="qaipl4smCtotal" placeholder="{{ trans('admin.sici.columns.qaipl4smCtotal') }}">
        <div v-if="errors.has('qaipl4smCtotal')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smCtotal') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smC15'), 'has-success': fields.qaipl4smC15 && fields.qaipl4smC15.valid }">
    <label for="qaipl4smC15" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smC15') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smC15" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smC15'), 'form-control-success': fields.qaipl4smC15 && fields.qaipl4smC15.valid}"
               id="qaipl4smC15" name="qaipl4smC15" placeholder="{{ trans('admin.sici.columns.qaipl4smC15') }}">
        <div v-if="errors.has('qaipl4smC15')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smC15') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smC16'), 'has-success': fields.qaipl4smC16 && fields.qaipl4smC16.valid }">
    <label for="qaipl4smC16" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smC16') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smC16" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smC16'), 'form-control-success': fields.qaipl4smC16 && fields.qaipl4smC16.valid}"
               id="qaipl4smC16" name="qaipl4smC16" placeholder="{{ trans('admin.sici.columns.qaipl4smC16') }}">
        <div v-if="errors.has('qaipl4smC16')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smC16') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smC17'), 'has-success': fields.qaipl4smC17 && fields.qaipl4smC17.valid }">
    <label for="qaipl4smC17" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smC17') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smC17" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smC17'), 'form-control-success': fields.qaipl4smC17 && fields.qaipl4smC17.valid}"
               id="qaipl4smC17" name="qaipl4smC17" placeholder="{{ trans('admin.sici.columns.qaipl4smC17') }}">
        <div v-if="errors.has('qaipl4smC17')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smC17') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smC18'), 'has-success': fields.qaipl4smC18 && fields.qaipl4smC18.valid }">
    <label for="qaipl4smC18" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smC18') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smC18" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smC18'), 'form-control-success': fields.qaipl4smC18 && fields.qaipl4smC18.valid}"
               id="qaipl4smC18" name="qaipl4smC18" placeholder="{{ trans('admin.sici.columns.qaipl4smC18') }}">
        <div v-if="errors.has('qaipl4smC18')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smC18') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smC19'), 'has-success': fields.qaipl4smC19 && fields.qaipl4smC19.valid }">
    <label for="qaipl4smC19" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smC19') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smC19" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smC19'), 'form-control-success': fields.qaipl4smC19 && fields.qaipl4smC19.valid}"
               id="qaipl4smC19" name="qaipl4smC19" placeholder="{{ trans('admin.sici.columns.qaipl4smC19') }}">
        <div v-if="errors.has('qaipl4smC19')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smC19') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smDqaipl5sm'), 'has-success': fields.qaipl4smDqaipl5sm && fields.qaipl4smDqaipl5sm.valid }">
    <label for="qaipl4smDqaipl5sm" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smDqaipl5sm') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smDqaipl5sm" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smDqaipl5sm'), 'form-control-success': fields.qaipl4smDqaipl5sm && fields.qaipl4smDqaipl5sm.valid}"
               id="qaipl4smDqaipl5sm" name="qaipl4smDqaipl5sm"
               placeholder="{{ trans('admin.sici.columns.qaipl4smDqaipl5sm') }}">
        <div v-if="errors.has('qaipl4smDqaipl5sm')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smDqaipl5sm') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smDtotal'), 'has-success': fields.qaipl4smDtotal && fields.qaipl4smDtotal.valid }">
    <label for="qaipl4smDtotal" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smDtotal') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smDtotal" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smDtotal'), 'form-control-success': fields.qaipl4smDtotal && fields.qaipl4smDtotal.valid}"
               id="qaipl4smDtotal" name="qaipl4smDtotal" placeholder="{{ trans('admin.sici.columns.qaipl4smDtotal') }}">
        <div v-if="errors.has('qaipl4smDtotal')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smDtotal') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smD15'), 'has-success': fields.qaipl4smD15 && fields.qaipl4smD15.valid }">
    <label for="qaipl4smD15" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smD15') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smD15" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smD15'), 'form-control-success': fields.qaipl4smD15 && fields.qaipl4smD15.valid}"
               id="qaipl4smD15" name="qaipl4smD15" placeholder="{{ trans('admin.sici.columns.qaipl4smD15') }}">
        <div v-if="errors.has('qaipl4smD15')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smD15') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smD16'), 'has-success': fields.qaipl4smD16 && fields.qaipl4smD16.valid }">
    <label for="qaipl4smD16" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smD16') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smD16" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smD16'), 'form-control-success': fields.qaipl4smD16 && fields.qaipl4smD16.valid}"
               id="qaipl4smD16" name="qaipl4smD16" placeholder="{{ trans('admin.sici.columns.qaipl4smD16') }}">
        <div v-if="errors.has('qaipl4smD16')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smD16') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smD17'), 'has-success': fields.qaipl4smD17 && fields.qaipl4smD17.valid }">
    <label for="qaipl4smD17" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smD17') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smD17" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smD17'), 'form-control-success': fields.qaipl4smD17 && fields.qaipl4smD17.valid}"
               id="qaipl4smD17" name="qaipl4smD17" placeholder="{{ trans('admin.sici.columns.qaipl4smD17') }}">
        <div v-if="errors.has('qaipl4smD17')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smD17') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smD18'), 'has-success': fields.qaipl4smD18 && fields.qaipl4smD18.valid }">
    <label for="qaipl4smD18" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smD18') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smD18" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smD18'), 'form-control-success': fields.qaipl4smD18 && fields.qaipl4smD18.valid}"
               id="qaipl4smD18" name="qaipl4smD18" placeholder="{{ trans('admin.sici.columns.qaipl4smD18') }}">
        <div v-if="errors.has('qaipl4smD18')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smD18') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smD19'), 'has-success': fields.qaipl4smD19 && fields.qaipl4smD19.valid }">
    <label for="qaipl4smD19" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smD19') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smD19" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smD19'), 'form-control-success': fields.qaipl4smD19 && fields.qaipl4smD19.valid}"
               id="qaipl4smD19" name="qaipl4smD19" placeholder="{{ trans('admin.sici.columns.qaipl4smD19') }}">
        <div v-if="errors.has('qaipl4smD19')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smD19') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smEqaipl5sm'), 'has-success': fields.qaipl4smEqaipl5sm && fields.qaipl4smEqaipl5sm.valid }">
    <label for="qaipl4smEqaipl5sm" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smEqaipl5sm') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smEqaipl5sm" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smEqaipl5sm'), 'form-control-success': fields.qaipl4smEqaipl5sm && fields.qaipl4smEqaipl5sm.valid}"
               id="qaipl4smEqaipl5sm" name="qaipl4smEqaipl5sm"
               placeholder="{{ trans('admin.sici.columns.qaipl4smEqaipl5sm') }}">
        <div v-if="errors.has('qaipl4smEqaipl5sm')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smEqaipl5sm') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smEtotal'), 'has-success': fields.qaipl4smEtotal && fields.qaipl4smEtotal.valid }">
    <label for="qaipl4smEtotal" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smEtotal') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smEtotal" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smEtotal'), 'form-control-success': fields.qaipl4smEtotal && fields.qaipl4smEtotal.valid}"
               id="qaipl4smEtotal" name="qaipl4smEtotal" placeholder="{{ trans('admin.sici.columns.qaipl4smEtotal') }}">
        <div v-if="errors.has('qaipl4smEtotal')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smEtotal') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smE15'), 'has-success': fields.qaipl4smE15 && fields.qaipl4smE15.valid }">
    <label for="qaipl4smE15" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smE15') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smE15" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smE15'), 'form-control-success': fields.qaipl4smE15 && fields.qaipl4smE15.valid}"
               id="qaipl4smE15" name="qaipl4smE15" placeholder="{{ trans('admin.sici.columns.qaipl4smE15') }}">
        <div v-if="errors.has('qaipl4smE15')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smE15') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smE16'), 'has-success': fields.qaipl4smE16 && fields.qaipl4smE16.valid }">
    <label for="qaipl4smE16" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smE16') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smE16" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smE16'), 'form-control-success': fields.qaipl4smE16 && fields.qaipl4smE16.valid}"
               id="qaipl4smE16" name="qaipl4smE16" placeholder="{{ trans('admin.sici.columns.qaipl4smE16') }}">
        <div v-if="errors.has('qaipl4smE16')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smE16') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smE17'), 'has-success': fields.qaipl4smE17 && fields.qaipl4smE17.valid }">
    <label for="qaipl4smE17" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smE17') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smE17" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smE17'), 'form-control-success': fields.qaipl4smE17 && fields.qaipl4smE17.valid}"
               id="qaipl4smE17" name="qaipl4smE17" placeholder="{{ trans('admin.sici.columns.qaipl4smE17') }}">
        <div v-if="errors.has('qaipl4smE17')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smE17') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smE18'), 'has-success': fields.qaipl4smE18 && fields.qaipl4smE18.valid }">
    <label for="qaipl4smE18" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smE18') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smE18" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smE18'), 'form-control-success': fields.qaipl4smE18 && fields.qaipl4smE18.valid}"
               id="qaipl4smE18" name="qaipl4smE18" placeholder="{{ trans('admin.sici.columns.qaipl4smE18') }}">
        <div v-if="errors.has('qaipl4smE18')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smE18') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smE19'), 'has-success': fields.qaipl4smE19 && fields.qaipl4smE19.valid }">
    <label for="qaipl4smE19" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smE19') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smE19" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smE19'), 'form-control-success': fields.qaipl4smE19 && fields.qaipl4smE19.valid}"
               id="qaipl4smE19" name="qaipl4smE19" placeholder="{{ trans('admin.sici.columns.qaipl4smE19') }}">
        <div v-if="errors.has('qaipl4smE19')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smE19') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smFqaipl5sm'), 'has-success': fields.qaipl4smFqaipl5sm && fields.qaipl4smFqaipl5sm.valid }">
    <label for="qaipl4smFqaipl5sm" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smFqaipl5sm') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smFqaipl5sm" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smFqaipl5sm'), 'form-control-success': fields.qaipl4smFqaipl5sm && fields.qaipl4smFqaipl5sm.valid}"
               id="qaipl4smFqaipl5sm" name="qaipl4smFqaipl5sm"
               placeholder="{{ trans('admin.sici.columns.qaipl4smFqaipl5sm') }}">
        <div v-if="errors.has('qaipl4smFqaipl5sm')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smFqaipl5sm') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smFtotal'), 'has-success': fields.qaipl4smFtotal && fields.qaipl4smFtotal.valid }">
    <label for="qaipl4smFtotal" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smFtotal') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smFtotal" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smFtotal'), 'form-control-success': fields.qaipl4smFtotal && fields.qaipl4smFtotal.valid}"
               id="qaipl4smFtotal" name="qaipl4smFtotal" placeholder="{{ trans('admin.sici.columns.qaipl4smFtotal') }}">
        <div v-if="errors.has('qaipl4smFtotal')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smFtotal') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smF15'), 'has-success': fields.qaipl4smF15 && fields.qaipl4smF15.valid }">
    <label for="qaipl4smF15" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smF15') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smF15" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smF15'), 'form-control-success': fields.qaipl4smF15 && fields.qaipl4smF15.valid}"
               id="qaipl4smF15" name="qaipl4smF15" placeholder="{{ trans('admin.sici.columns.qaipl4smF15') }}">
        <div v-if="errors.has('qaipl4smF15')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smF15') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smF16'), 'has-success': fields.qaipl4smF16 && fields.qaipl4smF16.valid }">
    <label for="qaipl4smF16" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smF16') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smF16" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smF16'), 'form-control-success': fields.qaipl4smF16 && fields.qaipl4smF16.valid}"
               id="qaipl4smF16" name="qaipl4smF16" placeholder="{{ trans('admin.sici.columns.qaipl4smF16') }}">
        <div v-if="errors.has('qaipl4smF16')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smF16') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smF17'), 'has-success': fields.qaipl4smF17 && fields.qaipl4smF17.valid }">
    <label for="qaipl4smF17" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smF17') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smF17" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smF17'), 'form-control-success': fields.qaipl4smF17 && fields.qaipl4smF17.valid}"
               id="qaipl4smF17" name="qaipl4smF17" placeholder="{{ trans('admin.sici.columns.qaipl4smF17') }}">
        <div v-if="errors.has('qaipl4smF17')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smF17') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smF18'), 'has-success': fields.qaipl4smF18 && fields.qaipl4smF18.valid }">
    <label for="qaipl4smF18" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smF18') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smF18" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smF18'), 'form-control-success': fields.qaipl4smF18 && fields.qaipl4smF18.valid}"
               id="qaipl4smF18" name="qaipl4smF18" placeholder="{{ trans('admin.sici.columns.qaipl4smF18') }}">
        <div v-if="errors.has('qaipl4smF18')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smF18') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smF19'), 'has-success': fields.qaipl4smF19 && fields.qaipl4smF19.valid }">
    <label for="qaipl4smF19" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smF19') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smF19" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smF19'), 'form-control-success': fields.qaipl4smF19 && fields.qaipl4smF19.valid}"
               id="qaipl4smF19" name="qaipl4smF19" placeholder="{{ trans('admin.sici.columns.qaipl4smF19') }}">
        <div v-if="errors.has('qaipl4smF19')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smF19') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smGqaipl5sm'), 'has-success': fields.qaipl4smGqaipl5sm && fields.qaipl4smGqaipl5sm.valid }">
    <label for="qaipl4smGqaipl5sm" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smGqaipl5sm') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smGqaipl5sm" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smGqaipl5sm'), 'form-control-success': fields.qaipl4smGqaipl5sm && fields.qaipl4smGqaipl5sm.valid}"
               id="qaipl4smGqaipl5sm" name="qaipl4smGqaipl5sm"
               placeholder="{{ trans('admin.sici.columns.qaipl4smGqaipl5sm') }}">
        <div v-if="errors.has('qaipl4smGqaipl5sm')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smGqaipl5sm') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smGtotal'), 'has-success': fields.qaipl4smGtotal && fields.qaipl4smGtotal.valid }">
    <label for="qaipl4smGtotal" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smGtotal') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smGtotal" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smGtotal'), 'form-control-success': fields.qaipl4smGtotal && fields.qaipl4smGtotal.valid}"
               id="qaipl4smGtotal" name="qaipl4smGtotal" placeholder="{{ trans('admin.sici.columns.qaipl4smGtotal') }}">
        <div v-if="errors.has('qaipl4smGtotal')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smGtotal') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smG15'), 'has-success': fields.qaipl4smG15 && fields.qaipl4smG15.valid }">
    <label for="qaipl4smG15" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smG15') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smG15" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smG15'), 'form-control-success': fields.qaipl4smG15 && fields.qaipl4smG15.valid}"
               id="qaipl4smG15" name="qaipl4smG15" placeholder="{{ trans('admin.sici.columns.qaipl4smG15') }}">
        <div v-if="errors.has('qaipl4smG15')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smG15') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smG16'), 'has-success': fields.qaipl4smG16 && fields.qaipl4smG16.valid }">
    <label for="qaipl4smG16" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smG16') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smG16" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smG16'), 'form-control-success': fields.qaipl4smG16 && fields.qaipl4smG16.valid}"
               id="qaipl4smG16" name="qaipl4smG16" placeholder="{{ trans('admin.sici.columns.qaipl4smG16') }}">
        <div v-if="errors.has('qaipl4smG16')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smG16') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smG17'), 'has-success': fields.qaipl4smG17 && fields.qaipl4smG17.valid }">
    <label for="qaipl4smG17" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smG17') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smG17" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smG17'), 'form-control-success': fields.qaipl4smG17 && fields.qaipl4smG17.valid}"
               id="qaipl4smG17" name="qaipl4smG17" placeholder="{{ trans('admin.sici.columns.qaipl4smG17') }}">
        <div v-if="errors.has('qaipl4smG17')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smG17') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smG18'), 'has-success': fields.qaipl4smG18 && fields.qaipl4smG18.valid }">
    <label for="qaipl4smG18" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smG18') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smG18" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smG18'), 'form-control-success': fields.qaipl4smG18 && fields.qaipl4smG18.valid}"
               id="qaipl4smG18" name="qaipl4smG18" placeholder="{{ trans('admin.sici.columns.qaipl4smG18') }}">
        <div v-if="errors.has('qaipl4smG18')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smG18') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smG19'), 'has-success': fields.qaipl4smG19 && fields.qaipl4smG19.valid }">
    <label for="qaipl4smG19" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smG19') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smG19" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smG19'), 'form-control-success': fields.qaipl4smG19 && fields.qaipl4smG19.valid}"
               id="qaipl4smG19" name="qaipl4smG19" placeholder="{{ trans('admin.sici.columns.qaipl4smG19') }}">
        <div v-if="errors.has('qaipl4smG19')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smG19') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smIqaipl5sm'), 'has-success': fields.qaipl4smIqaipl5sm && fields.qaipl4smIqaipl5sm.valid }">
    <label for="qaipl4smIqaipl5sm" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smIqaipl5sm') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smIqaipl5sm" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smIqaipl5sm'), 'form-control-success': fields.qaipl4smIqaipl5sm && fields.qaipl4smIqaipl5sm.valid}"
               id="qaipl4smIqaipl5sm" name="qaipl4smIqaipl5sm"
               placeholder="{{ trans('admin.sici.columns.qaipl4smIqaipl5sm') }}">
        <div v-if="errors.has('qaipl4smIqaipl5sm')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smIqaipl5sm') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smItotal'), 'has-success': fields.qaipl4smItotal && fields.qaipl4smItotal.valid }">
    <label for="qaipl4smItotal" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smItotal') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smItotal" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smItotal'), 'form-control-success': fields.qaipl4smItotal && fields.qaipl4smItotal.valid}"
               id="qaipl4smItotal" name="qaipl4smItotal" placeholder="{{ trans('admin.sici.columns.qaipl4smItotal') }}">
        <div v-if="errors.has('qaipl4smItotal')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smItotal') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smI15'), 'has-success': fields.qaipl4smI15 && fields.qaipl4smI15.valid }">
    <label for="qaipl4smI15" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smI15') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smI15" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smI15'), 'form-control-success': fields.qaipl4smI15 && fields.qaipl4smI15.valid}"
               id="qaipl4smI15" name="qaipl4smI15" placeholder="{{ trans('admin.sici.columns.qaipl4smI15') }}">
        <div v-if="errors.has('qaipl4smI15')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smI15') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smI16'), 'has-success': fields.qaipl4smI16 && fields.qaipl4smI16.valid }">
    <label for="qaipl4smI16" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smI16') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smI16" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smI16'), 'form-control-success': fields.qaipl4smI16 && fields.qaipl4smI16.valid}"
               id="qaipl4smI16" name="qaipl4smI16" placeholder="{{ trans('admin.sici.columns.qaipl4smI16') }}">
        <div v-if="errors.has('qaipl4smI16')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smI16') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smI17'), 'has-success': fields.qaipl4smI17 && fields.qaipl4smI17.valid }">
    <label for="qaipl4smI17" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smI17') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smI17" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smI17'), 'form-control-success': fields.qaipl4smI17 && fields.qaipl4smI17.valid}"
               id="qaipl4smI17" name="qaipl4smI17" placeholder="{{ trans('admin.sici.columns.qaipl4smI17') }}">
        <div v-if="errors.has('qaipl4smI17')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smI17') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smI18'), 'has-success': fields.qaipl4smI18 && fields.qaipl4smI18.valid }">
    <label for="qaipl4smI18" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smI18') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smI18" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smI18'), 'form-control-success': fields.qaipl4smI18 && fields.qaipl4smI18.valid}"
               id="qaipl4smI18" name="qaipl4smI18" placeholder="{{ trans('admin.sici.columns.qaipl4smI18') }}">
        <div v-if="errors.has('qaipl4smI18')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smI18') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('qaipl4smI19'), 'has-success': fields.qaipl4smI19 && fields.qaipl4smI19.valid }">
    <label for="qaipl4smI19" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.qaipl4smI19') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qaipl4smI19" v-validate="'integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('qaipl4smI19'), 'form-control-success': fields.qaipl4smI19 && fields.qaipl4smI19.valid}"
               id="qaipl4smI19" name="qaipl4smI19" placeholder="{{ trans('admin.sici.columns.qaipl4smI19') }}">
        <div v-if="errors.has('qaipl4smI19')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('qaipl4smI19') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('status'), 'has-success': fields.status && fields.status.valid }">
    <label for="status" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.sici.columns.status') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.status" v-validate="'required|integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('status'), 'form-control-success': fields.status && fields.status.valid}"
               id="status" name="status" placeholder="{{ trans('admin.sici.columns.status') }}">
        <div v-if="errors.has('status')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('status') }}
        </div>
    </div>
</div>
