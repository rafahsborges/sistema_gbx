<div class="card" v-if="Object.keys(data).length === 0">

    <div class="card-header">
        <i class="fa fa-align-justify"></i> {{ trans('admin.apontamento.actions.index') }}
        <button type="button" class="btn btn-primary btn-sm pull-right m-b-0" @click="addRowApontamento"><i
                class="fa fa-plus"></i>&nbsp; {{ trans('admin.apontamento.actions.create') }}</button>
    </div>

    <div class="card-body">

        <div v-for="(row, index) in form.apontamentos">

            <div class="row">
                <div class="col-12">
                    <button type="button" class="btn btn-danger btn-sm pull-right m-b-0"
                            v-on:click="removeElementApontamento(index)"><i
                            class="fa fa-plus"></i> {{ trans('brackets/admin-ui::admin.btn.delete') }}</button>
                </div>
            </div>

            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('descricao'), 'has-success': fields.descricao && fields.descricao.valid }">
                <label for="descricao" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.apontamento.columns.descricao') }}</label>
                <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                    <div>
                        <wysiwyg v-model="row.descricao" v-validate="'required'" id="descricao" name="descricao" :config="mediaWysiwygConfig"></wysiwyg>
                    </div>
                    <div v-if="errors.has('descricao')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('descricao') }}</div>
                </div>
            </div>

            <hr>

        </div>

    </div>

</div>
