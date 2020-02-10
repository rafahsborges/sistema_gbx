<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('assunto'), 'has-success': fields.assunto && fields.assunto.valid }">
    <label for="assunto" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.notification.columns.assunto') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.assunto" v-validate="'required'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('assunto'), 'form-control-success': fields.assunto && fields.assunto.valid}"
               id="assunto" name="assunto" placeholder="{{ trans('admin.notification.columns.assunto') }}">
        <div v-if="errors.has('assunto')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('assunto')
            }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('conteudo'), 'has-success': fields.conteudo && fields.conteudo.valid }">
    <label for="conteudo" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.notification.columns.conteudo') }}</label>
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
     :class="{'has-danger': errors.has('id_cliente'), 'has-success': fields.id_cliente && fields.id_cliente.valid }">
    <label for="id_cliente" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.notification.columns.id_cliente') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect
            v-model="form.cliente"
            :options="clientes"
            :multiple="true"
            track-by="id"
            label="nome"
            tag-placeholder="{{ trans('admin.notification.columns.id_cliente') }}"
            placeholder="{{ trans('admin.notification.columns.id_cliente') }}">
        </multiselect>
        <div v-if="errors.has('id_cliente')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('id_cliente') }}
        </div>
    </div>
</div>

<div class="form-check row"
     :class="{'has-danger': errors.has('agendar'), 'has-success': fields.agendar && fields.agendar.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="agendar" type="checkbox" v-model="form.agendar" v-validate="''"
               data-vv-name="agendar" name="agendar_fake_element">
        <label class="form-check-label" for="agendar">
            {{ trans('admin.notification.columns.agendar') }}
        </label>
        <input type="hidden" name="agendar" :value="form.agendar">
        <div v-if="errors.has('agendar')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('agendar')
            }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('agendamento'), 'has-success': fields.agendamento && fields.agendamento.valid }"
     v-if="form.agendar === true">
    <label for="agendamento" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.notification.columns.agendamento') }}</label>
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
     :class="{'has-danger': errors.has('enviado'), 'has-success': fields.enviado && fields.enviado.valid }"
     v-if="Object.keys(data).length !== 0">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enviado" type="checkbox" v-model="form.enviado" v-validate="''"
               data-vv-name="enviado" name="enviado_fake_element">
        <label class="form-check-label" for="enviado">
            {{ trans('admin.notification.columns.enviado') }}
        </label>
        <input type="hidden" name="enviado" :value="form.enviado">
        <div v-if="errors.has('enviado')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enviado')
            }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('envio'), 'has-success': fields.envio && fields.envio.valid }"
     v-if="Object.keys(data).length !== 0 && form.enviado === true">
    <label for="envio" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.notification.columns.envio') }}</label>
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
