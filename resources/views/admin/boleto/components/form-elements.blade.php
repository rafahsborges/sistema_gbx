<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('id_cliente'), 'has-success': fields.id_cliente && fields.id_cliente.valid }">
    <label for="id_cliente" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.boleto.columns.id_cliente') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect
            v-model="form.cliente"
            :options="clientes"
            :multiple="false"
            track-by="id"
            label="nome"
            tag-placeholder="{{ trans('admin.boleto.columns.id_cliente') }}"
            placeholder="{{ trans('admin.boleto.columns.id_cliente') }}">
        </multiselect>
        <div v-if="errors.has('id_cliente')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('id_cliente') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('id_servico'), 'has-success': fields.id_servico && fields.id_servico.valid }">
    <label for="id_servico" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.boleto.columns.id_servico') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect
            v-model="form.servico"
            :options="servicos"
            :multiple="false"
            track-by="id"
            label="nome"
            tag-placeholder="{{ trans('admin.boleto.columns.id_servico') }}"
            placeholder="{{ trans('admin.boleto.columns.id_servico') }}">
        </multiselect>
        <div v-if="errors.has('id_servico')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('id_servico') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('descricao'), 'has-success': fields.descricao && fields.descricao.valid }">
    <label for="descricao" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.boleto.columns.descricao') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.descricao" v-validate="'required'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('descricao'), 'form-control-success': fields.descricao && fields.descricao.valid}"
               id="descricao" name="descricao" placeholder="{{ trans('admin.boleto.columns.descricao') }}">
        <div v-if="errors.has('descricao')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('descricao') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('valor'), 'has-success': fields.valor && fields.valor.valid }">
    <label for="valor" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.boleto.columns.valor') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.valor" v-money="money" v-validate="'required'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('valor'), 'form-control-success': fields.valor && fields.valor.valid}"
               id="valor" name="valor" placeholder="{{ trans('admin.boleto.columns.valor') }}">
        <div v-if="errors.has('valor')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('valor')
            }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('vencimento'), 'has-success': fields.vencimento && fields.vencimento.valid }">
    <label for="vencimento" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.boleto.columns.vencimento') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.vencimento" :config="datePickerConfig"
                      v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr"
                      :class="{'form-control-danger': errors.has('vencimento'), 'form-control-success': fields.vencimento && fields.vencimento.valid}"
                      id="vencimento" name="vencimento"
                      placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('vencimento')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('vencimento') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('dias_vencimento'), 'has-success': fields.dias_vencimento && fields.dias_vencimento.valid }">
    <label for="dias_vencimento" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.boleto.columns.dias_vencimento') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.dias_vencimento" v-validate="'decimal'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('dias_vencimento'), 'form-control-success': fields.dias_vencimento && fields.dias_vencimento.valid}"
               id="dias_vencimento" name="dias_vencimento"
               placeholder="{{ trans('admin.boleto.columns.dias_vencimento') }}">
        <div v-if="errors.has('dias_vencimento')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('dias_vencimento') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('multa'), 'has-success': fields.multa && fields.multa.valid }">
    <label for="multa" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.boleto.columns.multa') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-money="percent" :maxlength="7" v-model="form.multa" v-validate="''"
               @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('multa'), 'form-control-success': fields.multa && fields.multa.valid}"
               id="multa" name="multa" placeholder="{{ trans('admin.boleto.columns.multa') }}">
        <div v-if="errors.has('multa')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('multa') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('juros'), 'has-success': fields.juros && fields.juros.valid }">
    <label for="juros" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.boleto.columns.juros') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-money="percent" :maxlength="7" v-model="form.juros" v-validate="''"
               @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('juros'), 'form-control-success': fields.juros && fields.juros.valid}"
               id="juros" name="juros" placeholder="{{ trans('admin.boleto.columns.juros') }}">
        <div v-if="errors.has('juros')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('juros') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('desconto'), 'has-success': fields.desconto && fields.desconto.valid }">
    <label for="desconto" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.boleto.columns.desconto') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-money="money" :maxlength="17" v-model="form.desconto" v-validate="''"
               @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('desconto'), 'form-control-success': fields.desconto && fields.desconto.valid}"
               id="desconto" name="desconto" placeholder="{{ trans('admin.boleto.columns.desconto') }}">
        <div v-if="errors.has('desconto')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('desconto')
            }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('dias_desconto'), 'has-success': fields.dias_desconto && fields.dias_desconto.valid }">
    <label for="dias_desconto" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.boleto.columns.dias_desconto') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.dias_desconto" v-validate="'decimal'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('dias_desconto'), 'form-control-success': fields.dias_desconto && fields.dias_desconto.valid}"
               id="dias_desconto" name="dias_desconto" placeholder="{{ trans('admin.boleto.columns.dias_desconto') }}">
        <div v-if="errors.has('dias_desconto')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('dias_desconto') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('parcelas'), 'has-success': fields.parcelas && fields.parcelas.valid }">
    <label for="parcelas" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.boleto.columns.parcelas') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.parcelas" v-validate="'decimal'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('parcelas'), 'form-control-success': fields.parcelas && fields.parcelas.valid}"
               id="parcelas" name="parcelas" placeholder="{{ trans('admin.boleto.columns.parcelas') }}">
        <div v-if="errors.has('parcelas')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('parcelas') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('status'), 'has-success': fields.status && fields.status.valid }">
    <label for="status" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.boleto.columns.status') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect
            v-model="form.status"
            :options="statuses"
            :multiple="false"
            track-by="id"
            label="nome"
            tag-placeholder="{{ trans('admin.boleto.columns.status') }}"
            placeholder="{{ trans('admin.boleto.columns.status') }}">
        </multiselect>
        <div v-if="errors.has('status')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('status') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('gerar'), 'has-success': fields.gerar && fields.gerar.valid }">
    <label for="gerar" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.boleto.columns.gerar') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input class="form-check-input" id="gerar" type="checkbox" v-model="form.gerar" v-validate="''"
               data-vv-name="gerar" name="gerar_fake_element">
        <label class="form-check-label" for="gerar">
            {{ trans('admin.boleto.columns.gerar') }}
        </label>
        <input type="hidden" name="gerar" :value="form.gerar">
        <div v-if="errors.has('gerar')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('gerar')
            }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('notificar'), 'has-success': fields.notificar && fields.notificar.valid }">
    <label for="notificar" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.boleto.columns.notificar') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input class="form-check-input" id="notificar" type="checkbox" v-model="form.notificar" v-validate="''"
               data-vv-name="notificar" name="notificar_fake_element">
        <label class="form-check-label" for="notificar">
            {{ trans('admin.boleto.columns.notificar') }}
        </label>
        <input type="hidden" name="notificar" :value="form.notificar">
        <div v-if="errors.has('notificar')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('notificar')
            }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('valor_pago'), 'has-success': fields.valor_pago && fields.valor_pago.valid }">
    <label for="valor_pago" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.boleto.columns.valor_pago') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.valor_pago" v-money="money" v-validate="'required'"
               @input="validate($event)"
               class="form-control" disabled="{{$mode === 'create' ? 'disabled': ''}}"
               :class="{'form-control-danger': errors.has('valor_pago'), 'form-control-success': fields.valor_pago && fields.valor_pago.valid}"
               id="valor_pago" name="valor_pago" placeholder="{{ trans('admin.boleto.columns.valor_pago') }}">
        <div v-if="errors.has('valor_pago')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('valor_pago') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('pagamento'), 'has-success': fields.pagamento && fields.pagamento.valid }">
    <label for="pagamento" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.boleto.columns.pagamento') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.pagamento" :config="datePickerConfig"
                      v-validate="'date_format:yyyy-MM-dd HH:mm:ss'"
                      class="flatpickr" disabled="{{$mode === 'create' ? 'disabled': ''}}"
                      :class="{'form-control-danger': errors.has('pagamento'), 'form-control-success': fields.pagamento && fields.pagamento.valid}"
                      id="pagamento" name="pagamento"
                      placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('pagamento')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('pagamento') }}
        </div>
    </div>
</div>
