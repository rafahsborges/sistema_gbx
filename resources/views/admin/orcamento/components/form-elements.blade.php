<div class="form-check row"
     :class="{'has-danger': errors.has('tipo'), 'has-success': fields.tipo && fields.tipo.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="tipo" type="checkbox" v-model="form.tipo" v-validate="''"
               data-vv-name="tipo" name="tipo_fake_element">
        <label class="form-check-label" for="tipo">
            {{ trans('admin.orcamento.columns.tipo') }}
        </label>
        <input type="hidden" name="tipo" :value="form.tipo">
        <div v-if="errors.has('tipo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tipo') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('id_cidade'), 'has-success': fields.id_cidade && fields.id_cidade.valid }">
    <label for="id_cidade" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.orcamento.columns.id_cidade') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_cidade" v-validate="''" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('id_cidade'), 'form-control-success': fields.id_cidade && fields.id_cidade.valid}"
               id="id_cidade" name="id_cidade" placeholder="{{ trans('admin.orcamento.columns.id_cidade') }}">
        <div v-if="errors.has('id_cidade')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('id_cidade') }}
        </div>
    </div>
</div>

<div class="form-check row"
     :class="{'has-danger': errors.has('enviado'), 'has-success': fields.enviado && fields.enviado.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enviado" type="checkbox" v-model="form.enviado" v-validate="''"
               data-vv-name="enviado" name="enviado_fake_element">
        <label class="form-check-label" for="enviado">
            {{ trans('admin.orcamento.columns.enviado') }}
        </label>
        <input type="hidden" name="enviado" :value="form.enviado">
        <div v-if="errors.has('enviado')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enviado')
            }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('agendamento'), 'has-success': fields.agendamento && fields.agendamento.valid }">
    <label for="agendamento" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.orcamento.columns.agendamento') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.agendamento" :config="datetimePickerConfig"
                      v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr"
                      :class="{'form-control-danger': errors.has('agendamento'), 'form-control-success': fields.agendamento && fields.agendamento.valid}"
                      id="agendamento" name="agendamento"
                      placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('agendamento')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('agendamento') }}
        </div>
    </div>
</div>

<div class="form-check row"
     :class="{'has-danger': errors.has('agendar'), 'has-success': fields.agendar && fields.agendar.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="agendar" type="checkbox" v-model="form.agendar" v-validate="''"
               data-vv-name="agendar" name="agendar_fake_element">
        <label class="form-check-label" for="agendar">
            {{ trans('admin.orcamento.columns.agendar') }}
        </label>
        <input type="hidden" name="agendar" :value="form.agendar">
        <div v-if="errors.has('agendar')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('agendar')
            }}
        </div>
    </div>
</div>

<div class="form-check row"
     :class="{'has-danger': errors.has('enviar'), 'has-success': fields.enviar && fields.enviar.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enviar" type="checkbox" v-model="form.enviar" v-validate="''"
               data-vv-name="enviar" name="enviar_fake_element">
        <label class="form-check-label" for="enviar">
            {{ trans('admin.orcamento.columns.enviar') }}
        </label>
        <input type="hidden" name="enviar" :value="form.enviar">
        <div v-if="errors.has('enviar')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enviar') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('conteudo'), 'has-success': fields.conteudo && fields.conteudo.valid }">
    <label for="conteudo" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.orcamento.columns.conteudo') }}</label>
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
     :class="{'has-danger': errors.has('assunto'), 'has-success': fields.assunto && fields.assunto.valid }">
    <label for="assunto" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.orcamento.columns.assunto') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.assunto" v-validate="'required'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('assunto'), 'form-control-success': fields.assunto && fields.assunto.valid}"
               id="assunto" name="assunto" placeholder="{{ trans('admin.orcamento.columns.assunto') }}">
        <div v-if="errors.has('assunto')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('assunto')
            }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('id_estado'), 'has-success': fields.id_estado && fields.id_estado.valid }">
    <label for="id_estado" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.orcamento.columns.id_estado') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_estado" v-validate="''" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('id_estado'), 'form-control-success': fields.id_estado && fields.id_estado.valid}"
               id="id_estado" name="id_estado" placeholder="{{ trans('admin.orcamento.columns.id_estado') }}">
        <div v-if="errors.has('id_estado')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('id_estado') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('celular'), 'has-success': fields.celular && fields.celular.valid }">
    <label for="celular" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.orcamento.columns.celular') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.celular" v-validate="''" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('celular'), 'form-control-success': fields.celular && fields.celular.valid}"
               id="celular" name="celular" placeholder="{{ trans('admin.orcamento.columns.celular') }}">
        <div v-if="errors.has('celular')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('celular')
            }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('nome'), 'has-success': fields.nome && fields.nome.valid }">
    <label for="nome" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.orcamento.columns.nome') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nome" v-validate="''" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('nome'), 'form-control-success': fields.nome && fields.nome.valid}"
               id="nome" name="nome" placeholder="{{ trans('admin.orcamento.columns.nome') }}">
        <div v-if="errors.has('nome')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nome') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('telefone'), 'has-success': fields.telefone && fields.telefone.valid }">
    <label for="telefone" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.orcamento.columns.telefone') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.telefone" v-validate="''" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('telefone'), 'form-control-success': fields.telefone && fields.telefone.valid}"
               id="telefone" name="telefone" placeholder="{{ trans('admin.orcamento.columns.telefone') }}">
        <div v-if="errors.has('telefone')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('telefone')
            }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('email3'), 'has-success': fields.email3 && fields.email3.valid }">
    <label for="email3" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.orcamento.columns.email3') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email3" v-validate="''" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('email3'), 'form-control-success': fields.email3 && fields.email3.valid}"
               id="email3" name="email3" placeholder="{{ trans('admin.orcamento.columns.email3') }}">
        <div v-if="errors.has('email3')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email3') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('email2'), 'has-success': fields.email2 && fields.email2.valid }">
    <label for="email2" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.orcamento.columns.email2') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email2" v-validate="''" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('email2'), 'form-control-success': fields.email2 && fields.email2.valid}"
               id="email2" name="email2" placeholder="{{ trans('admin.orcamento.columns.email2') }}">
        <div v-if="errors.has('email2')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email2') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('email'), 'has-success': fields.email && fields.email.valid }">
    <label for="email" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.orcamento.columns.email') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email" v-validate="'required|email'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('email'), 'form-control-success': fields.email && fields.email.valid}"
               id="email" name="email" placeholder="{{ trans('admin.orcamento.columns.email') }}">
        <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('cnpj'), 'has-success': fields.cnpj && fields.cnpj.valid }">
    <label for="cnpj" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.orcamento.columns.cnpj') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cnpj" v-validate="''" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('cnpj'), 'form-control-success': fields.cnpj && fields.cnpj.valid}"
               id="cnpj" name="cnpj" placeholder="{{ trans('admin.orcamento.columns.cnpj') }}">
        <div v-if="errors.has('cnpj')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cnpj') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('cpf'), 'has-success': fields.cpf && fields.cpf.valid }">
    <label for="cpf" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.orcamento.columns.cpf') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cpf" v-validate="''" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('cpf'), 'form-control-success': fields.cpf && fields.cpf.valid}"
               id="cpf" name="cpf" placeholder="{{ trans('admin.orcamento.columns.cpf') }}">
        <div v-if="errors.has('cpf')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cpf') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('razao_social'), 'has-success': fields.razao_social && fields.razao_social.valid }">
    <label for="razao_social" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.orcamento.columns.razao_social') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.razao_social" v-validate="''" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('razao_social'), 'form-control-success': fields.razao_social && fields.razao_social.valid}"
               id="razao_social" name="razao_social" placeholder="{{ trans('admin.orcamento.columns.razao_social') }}">
        <div v-if="errors.has('razao_social')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('razao_social') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('envio'), 'has-success': fields.envio && fields.envio.valid }">
    <label for="envio" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.orcamento.columns.envio') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.envio" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'"
                      class="flatpickr"
                      :class="{'form-control-danger': errors.has('envio'), 'form-control-success': fields.envio && fields.envio.valid}"
                      id="envio" name="envio"
                      placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('envio')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('envio') }}
        </div>
    </div>
</div>


