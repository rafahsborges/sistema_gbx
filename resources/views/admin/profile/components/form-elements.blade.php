<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('tipo'), 'has-success': fields.tipo && fields.tipo.valid }">
    <label for="tipo" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.admin-user.columns.tipo') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input class="form-check-input" id="tipo" type="checkbox" v-model="form.tipo" v-validate="''"
               data-vv-name="tipo" name="tipo_fake_element">
        <label class="form-check-label" for="tipo">
            {{ __('Pessoa Jurídica?') }}
        </label>
        <input type="hidden" name="tipo" :value="form.tipo">
        <div v-if="errors.has('tipo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tipo') }}</div>
    </div>
</div>

<div v-if="form.tipo === true || form.tipo === 1">
    <div class="form-group row align-items-center"
         :class="{'has-danger': errors.has('razao_social'), 'has-success': fields.razao_social && fields.razao_social.valid }">
        <label for="razao_social" class="col-form-label text-md-right"
               :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.admin-user.columns.razao_social') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <input type="text" v-model="form.razao_social" v-validate="''" @input="validate($event)"
                   class="form-control"
                   :class="{'form-control-danger': errors.has('razao_social'), 'form-control-success': fields.razao_social && fields.razao_social.valid}"
                   id="razao_social" name="razao_social"
                   placeholder="{{ trans('admin.admin-user.columns.razao_social') }}">
            <div v-if="errors.has('razao_social')" class="form-control-feedback form-text" v-cloak>@{{
                errors.first('razao_social') }}
            </div>
        </div>
    </div>

    <div class="form-group row align-items-center"
         :class="{'has-danger': errors.has('cnpj'), 'has-success': fields.cnpj && fields.cnpj.valid }">
        <label for="cnpj" class="col-form-label text-md-right"
               :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.admin-user.columns.cnpj') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <input type="text" v-model="form.cnpj" v-validate="''" @input="validate($event)" class="form-control"
                   v-mask="'##.###.###/####-##'"
                   :class="{'form-control-danger': errors.has('cnpj'), 'form-control-success': fields.cnpj && fields.cnpj.valid}"
                   id="cnpj" name="cnpj" placeholder="{{ trans('admin.admin-user.columns.cnpj') }}">
            <div v-if="errors.has('cnpj')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cnpj') }}
            </div>
        </div>
    </div>
</div>

<div v-else>
    <div class="form-group row align-items-center"
         :class="{'has-danger': errors.has('nome'), 'has-success': fields.nome && fields.nome.valid }">
        <label for="nome" class="col-form-label text-md-right"
               :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.admin-user.columns.nome') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <input type="text" v-model="form.nome" v-validate="''" @input="validate($event)"
                   class="form-control"
                   :class="{'form-control-danger': errors.has('nome'), 'form-control-success': fields.nome && fields.nome.valid}"
                   id="nome" name="nome" placeholder="{{ trans('admin.admin-user.columns.nome') }}">
            <div v-if="errors.has('nome')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nome') }}
            </div>
        </div>
    </div>

    <div class="form-group row align-items-center"
         :class="{'has-danger': errors.has('cpf'), 'has-success': fields.cpf && fields.cpf.valid }">
        <label for="cpf" class="col-form-label text-md-right"
               :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.admin-user.columns.cpf') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <input type="text" v-model="form.cpf" v-validate="''" @input="validate($event)" class="form-control"
                   v-mask="'###.###.###-##'"
                   :class="{'form-control-danger': errors.has('cpf'), 'form-control-success': fields.cpf && fields.cpf.valid}"
                   id="cpf" name="cpf" placeholder="{{ trans('admin.admin-user.columns.cpf') }}">
            <div v-if="errors.has('cpf')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cpf') }}
            </div>
        </div>
    </div>
</div>

<!--AQUI-->

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('email'), 'has-success': fields.email && fields.email.valid }">
    <label for="email" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.admin-user.columns.email') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email" v-validate="'required|email'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('email'), 'form-control-success': fields.email && fields.email.valid}"
               id="email" name="email" placeholder="{{ trans('admin.admin-user.columns.email') }}">
        <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('email2'), 'has-success': fields.email2 && fields.email2.valid }">
    <label for="email2" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.admin-user.columns.email2') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email2" v-validate="''" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('email2'), 'form-control-success': fields.email2 && fields.email2.valid}"
               id="email2" name="email2" placeholder="{{ trans('admin.admin-user.columns.email2') }}">
        <div v-if="errors.has('email2')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email2') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('email3'), 'has-success': fields.email3 && fields.email3.valid }">
    <label for="email3" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.admin-user.columns.email3') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email3" v-validate="''" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('email3'), 'form-control-success': fields.email3 && fields.email3.valid}"
               id="email3" name="email3" placeholder="{{ trans('admin.admin-user.columns.email3') }}">
        <div v-if="errors.has('email3')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email3') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('telefone'), 'has-success': fields.telefone && fields.telefone.valid }">
    <label for="telefone" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.admin-user.columns.telefone') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.telefone" v-validate="''" @input="validate($event)" class="form-control"
               v-mask="'(##) ####-####'"
               :class="{'form-control-danger': errors.has('telefone'), 'form-control-success': fields.telefone && fields.telefone.valid}"
               id="telefone" name="telefone" placeholder="{{ trans('admin.admin-user.columns.telefone') }}">
        <div v-if="errors.has('telefone')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('telefone')
            }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('celular'), 'has-success': fields.celular && fields.celular.valid }">
    <label for="celular" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.admin-user.columns.celular') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.celular" v-validate="''" @input="validate($event)" class="form-control"
               v-mask="'(##) #####-####'"
               :class="{'form-control-danger': errors.has('celular'), 'form-control-success': fields.celular && fields.celular.valid}"
               id="celular" name="celular" placeholder="{{ trans('admin.admin-user.columns.celular') }}">
        <div v-if="errors.has('celular')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('celular')
            }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('cep'), 'has-success': fields.cep && fields.cep.valid }">
    <label for="cep" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.admin-user.columns.cep') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cep" v-validate="''" @input="validate($event)" class="form-control"
               v-mask="'#####-###'" @blur="getAddressInfo"
               :class="{'form-control-danger': errors.has('cep'), 'form-control-success': fields.cep && fields.cep.valid}"
               id="cep" name="cep" placeholder="{{ trans('admin.admin-user.columns.cep') }}">
        <div v-if="errors.has('cep')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cep') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('logradouro'), 'has-success': fields.logradouro && fields.logradouro.valid }">
    <label for="logradouro" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.admin-user.columns.logradouro') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.logradouro" v-validate="''" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('logradouro'), 'form-control-success': fields.logradouro && fields.logradouro.valid}"
               id="logradouro" name="logradouro" placeholder="{{ trans('admin.admin-user.columns.logradouro') }}">
        <div v-if="errors.has('logradouro')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('logradouro') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('numero'), 'has-success': fields.numero && fields.numero.valid }">
    <label for="numero" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.admin-user.columns.numero') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.numero" v-validate="''" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('numero'), 'form-control-success': fields.numero && fields.numero.valid}"
               id="numero" name="numero" placeholder="{{ trans('admin.admin-user.columns.numero') }}">
        <div v-if="errors.has('numero')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('numero') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('complemento'), 'has-success': fields.complemento && fields.complemento.valid }">
    <label for="complemento" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.admin-user.columns.complemento') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.complemento" v-validate="''" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('complemento'), 'form-control-success': fields.complemento && fields.complemento.valid}"
               id="complemento" name="complemento" placeholder="{{ trans('admin.admin-user.columns.complemento') }}">
        <div v-if="errors.has('complemento')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('complemento') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('bairro'), 'has-success': fields.bairro && fields.bairro.valid }">
    <label for="bairro" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.admin-user.columns.bairro') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.bairro" v-validate="''" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('bairro'), 'form-control-success': fields.bairro && fields.bairro.valid}"
               id="bairro" name="bairro" placeholder="{{ trans('admin.admin-user.columns.bairro') }}">
        <div v-if="errors.has('bairro')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('bairro') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('id_cidade'), 'has-success': fields.id_cidade && fields.id_cidade.valid }">
    <label for="id_cidade" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.admin-user.columns.id_cidade') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect
            v-model="form.cidade"
            :options="cidades"
            :multiple="false"
            track-by="id"
            label="nome"
            tag-placeholder="{{ trans('admin.admin-user.columns.id_cidade') }}"
            placeholder="{{ trans('admin.admin-user.columns.id_cidade') }}">
        </multiselect>
        <div v-if="errors.has('id_cidade')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('id_cidade') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('id_estado'), 'has-success': fields.id_estado && fields.id_estado.valid }">
    <label for="id_estado" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.admin-user.columns.id_estado') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect
            v-model="form.estado"
            :options="estados"
            :multiple="false"
            track-by="id"
            label="nome"
            tag-placeholder="{{ trans('admin.admin-user.columns.id_estado') }}"
            placeholder="{{ trans('admin.admin-user.columns.id_estado') }}">
        </multiselect>
        <div v-if="errors.has('id_estado')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('id_estado') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('vencimento'), 'has-success': fields.vencimento && fields.vencimento.valid }">
    <label for="vencimento" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.admin-user.columns.vencimento') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <datetime v-model="form.vencimento" :config="datePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'"
                  class="flatpickr"
                  :class="{'form-control-danger': errors.has('vencimento'), 'form-control-success': fields.vencimento && fields.vencimento.valid}"
                  id="vencimento" name="vencimento"
                  placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        <div v-if="errors.has('vencimento')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('vencimento') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('valor'), 'has-success': fields.valor && fields.valor.valid }">
    <label for="valor" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.admin-user.columns.valor') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.valor" v-money="money" v-validate="'decimal'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('valor'), 'form-control-success': fields.valor && fields.valor.valid}"
               id="valor" name="valor" placeholder="{{ trans('admin.admin-user.columns.valor') }}">
        <div v-if="errors.has('valor')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('valor') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('ini_contrato'), 'has-success': fields.ini_contrato && fields.ini_contrato.valid }">
    <label for="ini_contrato" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.admin-user.columns.ini_contrato') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <datetime v-model="form.ini_contrato" :config="datePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'"
                  class="flatpickr"
                  :class="{'form-control-danger': errors.has('ini_contrato'), 'form-control-success': fields.ini_contrato && fields.ini_contrato.valid}"
                  id="ini_contrato" name="ini_contrato"
                  placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        <div v-if="errors.has('ini_contrato')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('ini_contrato') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('fim_contrato'), 'has-success': fields.fim_contrato && fields.fim_contrato.valid }">
    <label for="fim_contrato" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.admin-user.columns.fim_contrato') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <datetime v-model="form.fim_contrato" :config="datePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'"
                  class="flatpickr"
                  :class="{'form-control-danger': errors.has('fim_contrato'), 'form-control-success': fields.fim_contrato && fields.fim_contrato.valid}"
                  id="fim_contrato" name="fim_contrato"
                  placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        <div v-if="errors.has('fim_contrato')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('fim_contrato') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('fistel'), 'has-success': fields.fistel && fields.fistel.valid }">
    <label for="fistel" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.admin-user.columns.fistel') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.fistel" v-validate="''" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('fistel'), 'form-control-success': fields.fistel && fields.fistel.valid}"
               id="fistel" name="fistel" placeholder="{{ trans('admin.admin-user.columns.fistel') }}">
        <div v-if="errors.has('fistel')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('fistel') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('language'), 'has-success': fields.language && fields.language.valid }">
    <label for="language" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.admin-user.columns.language') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.language"
                     placeholder="{{ trans('brackets/admin-ui::admin.forms.select_an_option') }}"
                     :options="{{ $locales->toJson() }}" open-direction="bottom"></multiselect>
        <div v-if="errors.has('language')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('language')
            }}
        </div>
    </div>
</div>
