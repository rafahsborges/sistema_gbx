<div class="form-group row align-items-center" :class="{'has-danger': errors.has('valor'), 'has-success': fields.valor && fields.valor.valid }">
    <label for="valor" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.boleto.columns.valor') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.valor" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('valor'), 'form-control-success': fields.valor && fields.valor.valid}" id="valor" name="valor" placeholder="{{ trans('admin.boleto.columns.valor') }}">
        <div v-if="errors.has('valor')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('valor') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('vencimento'), 'has-success': fields.vencimento && fields.vencimento.valid }">
    <label for="vencimento" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.boleto.columns.vencimento') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.vencimento" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('vencimento'), 'form-control-success': fields.vencimento && fields.vencimento.valid}" id="vencimento" name="vencimento" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('vencimento')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('vencimento') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('valor_pago'), 'has-success': fields.valor_pago && fields.valor_pago.valid }">
    <label for="valor_pago" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.boleto.columns.valor_pago') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.valor_pago" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('valor_pago'), 'form-control-success': fields.valor_pago && fields.valor_pago.valid}" id="valor_pago" name="valor_pago" placeholder="{{ trans('admin.boleto.columns.valor_pago') }}">
        <div v-if="errors.has('valor_pago')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('valor_pago') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('pagamento'), 'has-success': fields.pagamento && fields.pagamento.valid }">
    <label for="pagamento" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.boleto.columns.pagamento') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.pagamento" :config="datePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('pagamento'), 'form-control-success': fields.pagamento && fields.pagamento.valid}" id="pagamento" name="pagamento" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('pagamento')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('pagamento') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_cliente'), 'has-success': fields.id_cliente && fields.id_cliente.valid }">
    <label for="id_cliente" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.boleto.columns.id_cliente') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_cliente" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_cliente'), 'form-control-success': fields.id_cliente && fields.id_cliente.valid}" id="id_cliente" name="id_cliente" placeholder="{{ trans('admin.boleto.columns.id_cliente') }}">
        <div v-if="errors.has('id_cliente')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_cliente') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('status'), 'has-success': fields.status && fields.status.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="status" type="checkbox" v-model="form.status" v-validate="''" data-vv-name="status"  name="status_fake_element">
        <label class="form-check-label" for="status">
            {{ trans('admin.boleto.columns.status') }}
        </label>
        <input type="hidden" name="status" :value="form.status">
        <div v-if="errors.has('status')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('status') }}</div>
    </div>
</div>


