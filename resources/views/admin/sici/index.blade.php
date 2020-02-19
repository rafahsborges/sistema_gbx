@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.sici.actions.index'))

@section('body')

    <sici-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('admin/sicis') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.sici.actions.index') }}
                        <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('admin/sicis/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.sici.actions.create') }}</a>
                    </div>
                    <div class="card-body" v-cloak>
                        <div class="card-block">
                            <form @submit.prevent="">
                                <div class="row justify-content-md-between">
                                    <div class="col col-lg-7 col-xl-5 form-group">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="{{ trans('brackets/admin-ui::admin.placeholder.search') }}" v-model="search" @keyup.enter="filter('search', $event.target.value)" />
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-primary" @click="filter('search', search)"><i class="fa fa-search"></i>&nbsp; {{ trans('brackets/admin-ui::admin.btn.search') }}</button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-auto form-group ">
                                        <select class="form-control" v-model="pagination.state.per_page">
                                            
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                            </form>

                            <table class="table table-hover table-listing">
                                <thead>
                                    <tr>
                                        <th class="bulk-checkbox">
                                            <input class="form-check-input" id="enabled" type="checkbox" v-model="isClickedAll" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element" @click="onBulkItemsClickedAllWithPagination()">
                                            <label class="form-check-label" for="enabled">
                                                #
                                            </label>
                                        </th>

                                        <th is='sortable' :column="'id'">{{ trans('admin.sici.columns.id') }}</th>
                                        <th is='sortable' :column="'ano'">{{ trans('admin.sici.columns.ano') }}</th>
                                        <th is='sortable' :column="'mes'">{{ trans('admin.sici.columns.mes') }}</th>
                                        <th is='sortable' :column="'id_cliente'">{{ trans('admin.sici.columns.id_cliente') }}</th>
                                        <th is='sortable' :column="'id_servico'">{{ trans('admin.sici.columns.id_servico') }}</th>
                                        <th is='sortable' :column="'fistel'">{{ trans('admin.sici.columns.fistel') }}</th>
                                        <th is='sortable' :column="'id_cidade'">{{ trans('admin.sici.columns.id_cidade') }}</th>
                                        <th is='sortable' :column="'id_estado'">{{ trans('admin.sici.columns.id_estado') }}</th>
                                        <th is='sortable' :column="'iem1a'">{{ trans('admin.sici.columns.iem1a') }}</th>
                                        <th is='sortable' :column="'iem1b'">{{ trans('admin.sici.columns.iem1b') }}</th>
                                        <th is='sortable' :column="'iem1c'">{{ trans('admin.sici.columns.iem1c') }}</th>
                                        <th is='sortable' :column="'iem1d'">{{ trans('admin.sici.columns.iem1d') }}</th>
                                        <th is='sortable' :column="'iem1e'">{{ trans('admin.sici.columns.iem1e') }}</th>
                                        <th is='sortable' :column="'iem1f'">{{ trans('admin.sici.columns.iem1f') }}</th>
                                        <th is='sortable' :column="'iem1g'">{{ trans('admin.sici.columns.iem1g') }}</th>
                                        <th is='sortable' :column="'iem2a'">{{ trans('admin.sici.columns.iem2a') }}</th>
                                        <th is='sortable' :column="'iem2b'">{{ trans('admin.sici.columns.iem2b') }}</th>
                                        <th is='sortable' :column="'iem2c'">{{ trans('admin.sici.columns.iem2c') }}</th>
                                        <th is='sortable' :column="'iem3a'">{{ trans('admin.sici.columns.iem3a') }}</th>
                                        <th is='sortable' :column="'iem4a'">{{ trans('admin.sici.columns.iem4a') }}</th>
                                        <th is='sortable' :column="'iem5a'">{{ trans('admin.sici.columns.iem5a') }}</th>
                                        <th is='sortable' :column="'iem6a'">{{ trans('admin.sici.columns.iem6a') }}</th>
                                        <th is='sortable' :column="'iem7a'">{{ trans('admin.sici.columns.iem7a') }}</th>
                                        <th is='sortable' :column="'iem8a'">{{ trans('admin.sici.columns.iem8a') }}</th>
                                        <th is='sortable' :column="'iem8b'">{{ trans('admin.sici.columns.iem8b') }}</th>
                                        <th is='sortable' :column="'iem8c'">{{ trans('admin.sici.columns.iem8c') }}</th>
                                        <th is='sortable' :column="'iem8d'">{{ trans('admin.sici.columns.iem8d') }}</th>
                                        <th is='sortable' :column="'iem8e'">{{ trans('admin.sici.columns.iem8e') }}</th>
                                        <th is='sortable' :column="'iem9Fa'">{{ trans('admin.sici.columns.iem9Fa') }}</th>
                                        <th is='sortable' :column="'iem9Fb'">{{ trans('admin.sici.columns.iem9Fb') }}</th>
                                        <th is='sortable' :column="'iem9Fc'">{{ trans('admin.sici.columns.iem9Fc') }}</th>
                                        <th is='sortable' :column="'iem9Fd'">{{ trans('admin.sici.columns.iem9Fd') }}</th>
                                        <th is='sortable' :column="'iem9Fe'">{{ trans('admin.sici.columns.iem9Fe') }}</th>
                                        <th is='sortable' :column="'iem9Ja'">{{ trans('admin.sici.columns.iem9Ja') }}</th>
                                        <th is='sortable' :column="'iem9Jb'">{{ trans('admin.sici.columns.iem9Jb') }}</th>
                                        <th is='sortable' :column="'iem9Jc'">{{ trans('admin.sici.columns.iem9Jc') }}</th>
                                        <th is='sortable' :column="'iem9Jd'">{{ trans('admin.sici.columns.iem9Jd') }}</th>
                                        <th is='sortable' :column="'iem9Je'">{{ trans('admin.sici.columns.iem9Je') }}</th>
                                        <th is='sortable' :column="'iem10Fa'">{{ trans('admin.sici.columns.iem10Fa') }}</th>
                                        <th is='sortable' :column="'iem10Fb'">{{ trans('admin.sici.columns.iem10Fb') }}</th>
                                        <th is='sortable' :column="'iem10Fc'">{{ trans('admin.sici.columns.iem10Fc') }}</th>
                                        <th is='sortable' :column="'iem10Fd'">{{ trans('admin.sici.columns.iem10Fd') }}</th>
                                        <th is='sortable' :column="'iem10Ja'">{{ trans('admin.sici.columns.iem10Ja') }}</th>
                                        <th is='sortable' :column="'iem10Jb'">{{ trans('admin.sici.columns.iem10Jb') }}</th>
                                        <th is='sortable' :column="'iem10Jc'">{{ trans('admin.sici.columns.iem10Jc') }}</th>
                                        <th is='sortable' :column="'iem10Jd'">{{ trans('admin.sici.columns.iem10Jd') }}</th>
                                        <th is='sortable' :column="'iau1'">{{ trans('admin.sici.columns.iau1') }}</th>
                                        <th is='sortable' :column="'ipl1a'">{{ trans('admin.sici.columns.ipl1a') }}</th>
                                        <th is='sortable' :column="'ipl1b'">{{ trans('admin.sici.columns.ipl1b') }}</th>
                                        <th is='sortable' :column="'ipl1c'">{{ trans('admin.sici.columns.ipl1c') }}</th>
                                        <th is='sortable' :column="'ipl1d'">{{ trans('admin.sici.columns.ipl1d') }}</th>
                                        <th is='sortable' :column="'ipl2a'">{{ trans('admin.sici.columns.ipl2a') }}</th>
                                        <th is='sortable' :column="'ipl2b'">{{ trans('admin.sici.columns.ipl2b') }}</th>
                                        <th is='sortable' :column="'ipl2c'">{{ trans('admin.sici.columns.ipl2c') }}</th>
                                        <th is='sortable' :column="'ipl2d'">{{ trans('admin.sici.columns.ipl2d') }}</th>
                                        <th is='sortable' :column="'ipl3Fa'">{{ trans('admin.sici.columns.ipl3Fa') }}</th>
                                        <th is='sortable' :column="'ipl3Ja'">{{ trans('admin.sici.columns.ipl3Ja') }}</th>
                                        <th is='sortable' :column="'ipl6im'">{{ trans('admin.sici.columns.ipl6im') }}</th>
                                        <th is='sortable' :column="'qaipl4smAqaipl5sm'">{{ trans('admin.sici.columns.qaipl4smAqaipl5sm') }}</th>
                                        <th is='sortable' :column="'qaipl4smAtotal'">{{ trans('admin.sici.columns.qaipl4smAtotal') }}</th>
                                        <th is='sortable' :column="'qaipl4smA15'">{{ trans('admin.sici.columns.qaipl4smA15') }}</th>
                                        <th is='sortable' :column="'qaipl4smA16'">{{ trans('admin.sici.columns.qaipl4smA16') }}</th>
                                        <th is='sortable' :column="'qaipl4smA17'">{{ trans('admin.sici.columns.qaipl4smA17') }}</th>
                                        <th is='sortable' :column="'qaipl4smA18'">{{ trans('admin.sici.columns.qaipl4smA18') }}</th>
                                        <th is='sortable' :column="'qaipl4smA19'">{{ trans('admin.sici.columns.qaipl4smA19') }}</th>
                                        <th is='sortable' :column="'qaipl4smBqaipl5sm'">{{ trans('admin.sici.columns.qaipl4smBqaipl5sm') }}</th>
                                        <th is='sortable' :column="'qaipl4smBtotal'">{{ trans('admin.sici.columns.qaipl4smBtotal') }}</th>
                                        <th is='sortable' :column="'qaipl4smB15'">{{ trans('admin.sici.columns.qaipl4smB15') }}</th>
                                        <th is='sortable' :column="'qaipl4smB16'">{{ trans('admin.sici.columns.qaipl4smB16') }}</th>
                                        <th is='sortable' :column="'qaipl4smB17'">{{ trans('admin.sici.columns.qaipl4smB17') }}</th>
                                        <th is='sortable' :column="'qaipl4smB18'">{{ trans('admin.sici.columns.qaipl4smB18') }}</th>
                                        <th is='sortable' :column="'qaipl4smB19'">{{ trans('admin.sici.columns.qaipl4smB19') }}</th>
                                        <th is='sortable' :column="'qaipl4smCqaipl5sm'">{{ trans('admin.sici.columns.qaipl4smCqaipl5sm') }}</th>
                                        <th is='sortable' :column="'qaipl4smCtotal'">{{ trans('admin.sici.columns.qaipl4smCtotal') }}</th>
                                        <th is='sortable' :column="'qaipl4smC15'">{{ trans('admin.sici.columns.qaipl4smC15') }}</th>
                                        <th is='sortable' :column="'qaipl4smC16'">{{ trans('admin.sici.columns.qaipl4smC16') }}</th>
                                        <th is='sortable' :column="'qaipl4smC17'">{{ trans('admin.sici.columns.qaipl4smC17') }}</th>
                                        <th is='sortable' :column="'qaipl4smC18'">{{ trans('admin.sici.columns.qaipl4smC18') }}</th>
                                        <th is='sortable' :column="'qaipl4smC19'">{{ trans('admin.sici.columns.qaipl4smC19') }}</th>
                                        <th is='sortable' :column="'qaipl4smDqaipl5sm'">{{ trans('admin.sici.columns.qaipl4smDqaipl5sm') }}</th>
                                        <th is='sortable' :column="'qaipl4smDtotal'">{{ trans('admin.sici.columns.qaipl4smDtotal') }}</th>
                                        <th is='sortable' :column="'qaipl4smD15'">{{ trans('admin.sici.columns.qaipl4smD15') }}</th>
                                        <th is='sortable' :column="'qaipl4smD16'">{{ trans('admin.sici.columns.qaipl4smD16') }}</th>
                                        <th is='sortable' :column="'qaipl4smD17'">{{ trans('admin.sici.columns.qaipl4smD17') }}</th>
                                        <th is='sortable' :column="'qaipl4smD18'">{{ trans('admin.sici.columns.qaipl4smD18') }}</th>
                                        <th is='sortable' :column="'qaipl4smD19'">{{ trans('admin.sici.columns.qaipl4smD19') }}</th>
                                        <th is='sortable' :column="'qaipl4smEqaipl5sm'">{{ trans('admin.sici.columns.qaipl4smEqaipl5sm') }}</th>
                                        <th is='sortable' :column="'qaipl4smEtotal'">{{ trans('admin.sici.columns.qaipl4smEtotal') }}</th>
                                        <th is='sortable' :column="'qaipl4smE15'">{{ trans('admin.sici.columns.qaipl4smE15') }}</th>
                                        <th is='sortable' :column="'qaipl4smE16'">{{ trans('admin.sici.columns.qaipl4smE16') }}</th>
                                        <th is='sortable' :column="'qaipl4smE17'">{{ trans('admin.sici.columns.qaipl4smE17') }}</th>
                                        <th is='sortable' :column="'qaipl4smE18'">{{ trans('admin.sici.columns.qaipl4smE18') }}</th>
                                        <th is='sortable' :column="'qaipl4smE19'">{{ trans('admin.sici.columns.qaipl4smE19') }}</th>
                                        <th is='sortable' :column="'qaipl4smFqaipl5sm'">{{ trans('admin.sici.columns.qaipl4smFqaipl5sm') }}</th>
                                        <th is='sortable' :column="'qaipl4smFtotal'">{{ trans('admin.sici.columns.qaipl4smFtotal') }}</th>
                                        <th is='sortable' :column="'qaipl4smF15'">{{ trans('admin.sici.columns.qaipl4smF15') }}</th>
                                        <th is='sortable' :column="'qaipl4smF16'">{{ trans('admin.sici.columns.qaipl4smF16') }}</th>
                                        <th is='sortable' :column="'qaipl4smF17'">{{ trans('admin.sici.columns.qaipl4smF17') }}</th>
                                        <th is='sortable' :column="'qaipl4smF18'">{{ trans('admin.sici.columns.qaipl4smF18') }}</th>
                                        <th is='sortable' :column="'qaipl4smF19'">{{ trans('admin.sici.columns.qaipl4smF19') }}</th>
                                        <th is='sortable' :column="'qaipl4smGqaipl5sm'">{{ trans('admin.sici.columns.qaipl4smGqaipl5sm') }}</th>
                                        <th is='sortable' :column="'qaipl4smGtotal'">{{ trans('admin.sici.columns.qaipl4smGtotal') }}</th>
                                        <th is='sortable' :column="'qaipl4smG15'">{{ trans('admin.sici.columns.qaipl4smG15') }}</th>
                                        <th is='sortable' :column="'qaipl4smG16'">{{ trans('admin.sici.columns.qaipl4smG16') }}</th>
                                        <th is='sortable' :column="'qaipl4smG17'">{{ trans('admin.sici.columns.qaipl4smG17') }}</th>
                                        <th is='sortable' :column="'qaipl4smG18'">{{ trans('admin.sici.columns.qaipl4smG18') }}</th>
                                        <th is='sortable' :column="'qaipl4smG19'">{{ trans('admin.sici.columns.qaipl4smG19') }}</th>
                                        <th is='sortable' :column="'qaipl4smHqaipl5sm'">{{ trans('admin.sici.columns.qaipl4smHqaipl5sm') }}</th>
                                        <th is='sortable' :column="'qaipl4smHtotal'">{{ trans('admin.sici.columns.qaipl4smHtotal') }}</th>
                                        <th is='sortable' :column="'qaipl4smH15'">{{ trans('admin.sici.columns.qaipl4smH15') }}</th>
                                        <th is='sortable' :column="'qaipl4smH16'">{{ trans('admin.sici.columns.qaipl4smH16') }}</th>
                                        <th is='sortable' :column="'qaipl4smH17'">{{ trans('admin.sici.columns.qaipl4smH17') }}</th>
                                        <th is='sortable' :column="'qaipl4smH18'">{{ trans('admin.sici.columns.qaipl4smH18') }}</th>
                                        <th is='sortable' :column="'qaipl4smH19'">{{ trans('admin.sici.columns.qaipl4smH19') }}</th>
                                        <th is='sortable' :column="'qaipl4smIqaipl5sm'">{{ trans('admin.sici.columns.qaipl4smIqaipl5sm') }}</th>
                                        <th is='sortable' :column="'qaipl4smItotal'">{{ trans('admin.sici.columns.qaipl4smItotal') }}</th>
                                        <th is='sortable' :column="'qaipl4smI15'">{{ trans('admin.sici.columns.qaipl4smI15') }}</th>
                                        <th is='sortable' :column="'qaipl4smI16'">{{ trans('admin.sici.columns.qaipl4smI16') }}</th>
                                        <th is='sortable' :column="'qaipl4smI17'">{{ trans('admin.sici.columns.qaipl4smI17') }}</th>
                                        <th is='sortable' :column="'qaipl4smI18'">{{ trans('admin.sici.columns.qaipl4smI18') }}</th>
                                        <th is='sortable' :column="'qaipl4smI19'">{{ trans('admin.sici.columns.qaipl4smI19') }}</th>
                                        <th is='sortable' :column="'qaipl4smJqaipl5sm'">{{ trans('admin.sici.columns.qaipl4smJqaipl5sm') }}</th>
                                        <th is='sortable' :column="'qaipl4smJtotal'">{{ trans('admin.sici.columns.qaipl4smJtotal') }}</th>
                                        <th is='sortable' :column="'qaipl4smJ15'">{{ trans('admin.sici.columns.qaipl4smJ15') }}</th>
                                        <th is='sortable' :column="'qaipl4smJ16'">{{ trans('admin.sici.columns.qaipl4smJ16') }}</th>
                                        <th is='sortable' :column="'qaipl4smJ17'">{{ trans('admin.sici.columns.qaipl4smJ17') }}</th>
                                        <th is='sortable' :column="'qaipl4smJ18'">{{ trans('admin.sici.columns.qaipl4smJ18') }}</th>
                                        <th is='sortable' :column="'qaipl4smJ19'">{{ trans('admin.sici.columns.qaipl4smJ19') }}</th>
                                        <th is='sortable' :column="'qaipl4smKqaipl5sm'">{{ trans('admin.sici.columns.qaipl4smKqaipl5sm') }}</th>
                                        <th is='sortable' :column="'qaipl4smKtotal'">{{ trans('admin.sici.columns.qaipl4smKtotal') }}</th>
                                        <th is='sortable' :column="'qaipl4smK15'">{{ trans('admin.sici.columns.qaipl4smK15') }}</th>
                                        <th is='sortable' :column="'qaipl4smK16'">{{ trans('admin.sici.columns.qaipl4smK16') }}</th>
                                        <th is='sortable' :column="'qaipl4smK17'">{{ trans('admin.sici.columns.qaipl4smK17') }}</th>
                                        <th is='sortable' :column="'qaipl4smK18'">{{ trans('admin.sici.columns.qaipl4smK18') }}</th>
                                        <th is='sortable' :column="'qaipl4smK19'">{{ trans('admin.sici.columns.qaipl4smK19') }}</th>
                                        <th is='sortable' :column="'qaipl4smLqaipl5sm'">{{ trans('admin.sici.columns.qaipl4smLqaipl5sm') }}</th>
                                        <th is='sortable' :column="'qaipl4smLtotal'">{{ trans('admin.sici.columns.qaipl4smLtotal') }}</th>
                                        <th is='sortable' :column="'qaipl4smL15'">{{ trans('admin.sici.columns.qaipl4smL15') }}</th>
                                        <th is='sortable' :column="'qaipl4smL16'">{{ trans('admin.sici.columns.qaipl4smL16') }}</th>
                                        <th is='sortable' :column="'qaipl4smL17'">{{ trans('admin.sici.columns.qaipl4smL17') }}</th>
                                        <th is='sortable' :column="'qaipl4smL18'">{{ trans('admin.sici.columns.qaipl4smL18') }}</th>
                                        <th is='sortable' :column="'qaipl4smL19'">{{ trans('admin.sici.columns.qaipl4smL19') }}</th>
                                        <th is='sortable' :column="'qaipl4smMqaipl5sm'">{{ trans('admin.sici.columns.qaipl4smMqaipl5sm') }}</th>
                                        <th is='sortable' :column="'qaipl4smMtotal'">{{ trans('admin.sici.columns.qaipl4smMtotal') }}</th>
                                        <th is='sortable' :column="'qaipl4smM15'">{{ trans('admin.sici.columns.qaipl4smM15') }}</th>
                                        <th is='sortable' :column="'qaipl4smM16'">{{ trans('admin.sici.columns.qaipl4smM16') }}</th>
                                        <th is='sortable' :column="'qaipl4smM17'">{{ trans('admin.sici.columns.qaipl4smM17') }}</th>
                                        <th is='sortable' :column="'qaipl4smM18'">{{ trans('admin.sici.columns.qaipl4smM18') }}</th>
                                        <th is='sortable' :column="'qaipl4smM19'">{{ trans('admin.sici.columns.qaipl4smM19') }}</th>
                                        <th is='sortable' :column="'qaipl4smNqaipl5sm'">{{ trans('admin.sici.columns.qaipl4smNqaipl5sm') }}</th>
                                        <th is='sortable' :column="'qaipl4smNtotal'">{{ trans('admin.sici.columns.qaipl4smNtotal') }}</th>
                                        <th is='sortable' :column="'qaipl4smN15'">{{ trans('admin.sici.columns.qaipl4smN15') }}</th>
                                        <th is='sortable' :column="'qaipl4smN16'">{{ trans('admin.sici.columns.qaipl4smN16') }}</th>
                                        <th is='sortable' :column="'qaipl4smN17'">{{ trans('admin.sici.columns.qaipl4smN17') }}</th>
                                        <th is='sortable' :column="'qaipl4smN18'">{{ trans('admin.sici.columns.qaipl4smN18') }}</th>
                                        <th is='sortable' :column="'qaipl4smN19'">{{ trans('admin.sici.columns.qaipl4smN19') }}</th>
                                        <th is='sortable' :column="'qaipl4smOqaipl5sm'">{{ trans('admin.sici.columns.qaipl4smOqaipl5sm') }}</th>
                                        <th is='sortable' :column="'qaipl4smOtotal'">{{ trans('admin.sici.columns.qaipl4smOtotal') }}</th>
                                        <th is='sortable' :column="'qaipl4smO15'">{{ trans('admin.sici.columns.qaipl4smO15') }}</th>
                                        <th is='sortable' :column="'qaipl4smO16'">{{ trans('admin.sici.columns.qaipl4smO16') }}</th>
                                        <th is='sortable' :column="'qaipl4smO17'">{{ trans('admin.sici.columns.qaipl4smO17') }}</th>
                                        <th is='sortable' :column="'qaipl4smO18'">{{ trans('admin.sici.columns.qaipl4smO18') }}</th>
                                        <th is='sortable' :column="'qaipl4smO19'">{{ trans('admin.sici.columns.qaipl4smO19') }}</th>
                                        <th is='sortable' :column="'status'">{{ trans('admin.sici.columns.status') }}</th>

                                        <th></th>
                                    </tr>
                                    <tr v-show="(clickedBulkItemsCount > 0) || isClickedAll">
                                        <td class="bg-bulk-info d-table-cell text-center" colspan="166">
                                            <span class="align-middle font-weight-light text-dark">{{ trans('brackets/admin-ui::admin.listing.selected_items') }} @{{ clickedBulkItemsCount }}.  <a href="#" class="text-primary" @click="onBulkItemsClickedAll('/admin/sicis')" v-if="(clickedBulkItemsCount < pagination.state.total)"> <i class="fa" :class="bulkCheckingAllLoader ? 'fa-spinner' : ''"></i> {{ trans('brackets/admin-ui::admin.listing.check_all_items') }} @{{ pagination.state.total }}</a> <span class="text-primary">|</span> <a
                                                        href="#" class="text-primary" @click="onBulkItemsClickedAllUncheck()">{{ trans('brackets/admin-ui::admin.listing.uncheck_all_items') }}</a>  </span>

                                            <span class="pull-right pr-2">
                                                <button class="btn btn-sm btn-danger pr-3 pl-3" @click="bulkDelete('/admin/sicis/bulk-destroy')">{{ trans('brackets/admin-ui::admin.btn.delete') }}</button>
                                            </span>

                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in collection" :key="item.id" :class="bulkItems[item.id] ? 'bg-bulk' : ''">
                                        <td class="bulk-checkbox">
                                            <input class="form-check-input" :id="'enabled' + item.id" type="checkbox" v-model="bulkItems[item.id]" v-validate="''" :data-vv-name="'enabled' + item.id"  :name="'enabled' + item.id + '_fake_element'" @click="onBulkItemClicked(item.id)" :disabled="bulkCheckingAllLoader">
                                            <label class="form-check-label" :for="'enabled' + item.id">
                                            </label>
                                        </td>

                                    <td>@{{ item.id }}</td>
                                        <td>@{{ item.ano }}</td>
                                        <td>@{{ item.mes }}</td>
                                        <td>@{{ item.id_cliente }}</td>
                                        <td>@{{ item.id_servico }}</td>
                                        <td>@{{ item.fistel }}</td>
                                        <td>@{{ item.id_cidade }}</td>
                                        <td>@{{ item.id_estado }}</td>
                                        <td>@{{ item.iem1a }}</td>
                                        <td>@{{ item.iem1b }}</td>
                                        <td>@{{ item.iem1c }}</td>
                                        <td>@{{ item.iem1d }}</td>
                                        <td>@{{ item.iem1e }}</td>
                                        <td>@{{ item.iem1f }}</td>
                                        <td>@{{ item.iem1g }}</td>
                                        <td>@{{ item.iem2a }}</td>
                                        <td>@{{ item.iem2b }}</td>
                                        <td>@{{ item.iem2c }}</td>
                                        <td>@{{ item.iem3a }}</td>
                                        <td>@{{ item.iem4a }}</td>
                                        <td>@{{ item.iem5a }}</td>
                                        <td>@{{ item.iem6a }}</td>
                                        <td>@{{ item.iem7a }}</td>
                                        <td>@{{ item.iem8a }}</td>
                                        <td>@{{ item.iem8b }}</td>
                                        <td>@{{ item.iem8c }}</td>
                                        <td>@{{ item.iem8d }}</td>
                                        <td>@{{ item.iem8e }}</td>
                                        <td>@{{ item.iem9Fa }}</td>
                                        <td>@{{ item.iem9Fb }}</td>
                                        <td>@{{ item.iem9Fc }}</td>
                                        <td>@{{ item.iem9Fd }}</td>
                                        <td>@{{ item.iem9Fe }}</td>
                                        <td>@{{ item.iem9Ja }}</td>
                                        <td>@{{ item.iem9Jb }}</td>
                                        <td>@{{ item.iem9Jc }}</td>
                                        <td>@{{ item.iem9Jd }}</td>
                                        <td>@{{ item.iem9Je }}</td>
                                        <td>@{{ item.iem10Fa }}</td>
                                        <td>@{{ item.iem10Fb }}</td>
                                        <td>@{{ item.iem10Fc }}</td>
                                        <td>@{{ item.iem10Fd }}</td>
                                        <td>@{{ item.iem10Ja }}</td>
                                        <td>@{{ item.iem10Jb }}</td>
                                        <td>@{{ item.iem10Jc }}</td>
                                        <td>@{{ item.iem10Jd }}</td>
                                        <td>@{{ item.iau1 }}</td>
                                        <td>@{{ item.ipl1a }}</td>
                                        <td>@{{ item.ipl1b }}</td>
                                        <td>@{{ item.ipl1c }}</td>
                                        <td>@{{ item.ipl1d }}</td>
                                        <td>@{{ item.ipl2a }}</td>
                                        <td>@{{ item.ipl2b }}</td>
                                        <td>@{{ item.ipl2c }}</td>
                                        <td>@{{ item.ipl2d }}</td>
                                        <td>@{{ item.ipl3Fa }}</td>
                                        <td>@{{ item.ipl3Ja }}</td>
                                        <td>@{{ item.ipl6im }}</td>
                                        <td>@{{ item.qaipl4smAqaipl5sm }}</td>
                                        <td>@{{ item.qaipl4smAtotal }}</td>
                                        <td>@{{ item.qaipl4smA15 }}</td>
                                        <td>@{{ item.qaipl4smA16 }}</td>
                                        <td>@{{ item.qaipl4smA17 }}</td>
                                        <td>@{{ item.qaipl4smA18 }}</td>
                                        <td>@{{ item.qaipl4smA19 }}</td>
                                        <td>@{{ item.qaipl4smBqaipl5sm }}</td>
                                        <td>@{{ item.qaipl4smBtotal }}</td>
                                        <td>@{{ item.qaipl4smB15 }}</td>
                                        <td>@{{ item.qaipl4smB16 }}</td>
                                        <td>@{{ item.qaipl4smB17 }}</td>
                                        <td>@{{ item.qaipl4smB18 }}</td>
                                        <td>@{{ item.qaipl4smB19 }}</td>
                                        <td>@{{ item.qaipl4smCqaipl5sm }}</td>
                                        <td>@{{ item.qaipl4smCtotal }}</td>
                                        <td>@{{ item.qaipl4smC15 }}</td>
                                        <td>@{{ item.qaipl4smC16 }}</td>
                                        <td>@{{ item.qaipl4smC17 }}</td>
                                        <td>@{{ item.qaipl4smC18 }}</td>
                                        <td>@{{ item.qaipl4smC19 }}</td>
                                        <td>@{{ item.qaipl4smDqaipl5sm }}</td>
                                        <td>@{{ item.qaipl4smDtotal }}</td>
                                        <td>@{{ item.qaipl4smD15 }}</td>
                                        <td>@{{ item.qaipl4smD16 }}</td>
                                        <td>@{{ item.qaipl4smD17 }}</td>
                                        <td>@{{ item.qaipl4smD18 }}</td>
                                        <td>@{{ item.qaipl4smD19 }}</td>
                                        <td>@{{ item.qaipl4smEqaipl5sm }}</td>
                                        <td>@{{ item.qaipl4smEtotal }}</td>
                                        <td>@{{ item.qaipl4smE15 }}</td>
                                        <td>@{{ item.qaipl4smE16 }}</td>
                                        <td>@{{ item.qaipl4smE17 }}</td>
                                        <td>@{{ item.qaipl4smE18 }}</td>
                                        <td>@{{ item.qaipl4smE19 }}</td>
                                        <td>@{{ item.qaipl4smFqaipl5sm }}</td>
                                        <td>@{{ item.qaipl4smFtotal }}</td>
                                        <td>@{{ item.qaipl4smF15 }}</td>
                                        <td>@{{ item.qaipl4smF16 }}</td>
                                        <td>@{{ item.qaipl4smF17 }}</td>
                                        <td>@{{ item.qaipl4smF18 }}</td>
                                        <td>@{{ item.qaipl4smF19 }}</td>
                                        <td>@{{ item.qaipl4smGqaipl5sm }}</td>
                                        <td>@{{ item.qaipl4smGtotal }}</td>
                                        <td>@{{ item.qaipl4smG15 }}</td>
                                        <td>@{{ item.qaipl4smG16 }}</td>
                                        <td>@{{ item.qaipl4smG17 }}</td>
                                        <td>@{{ item.qaipl4smG18 }}</td>
                                        <td>@{{ item.qaipl4smG19 }}</td>
                                        <td>@{{ item.qaipl4smHqaipl5sm }}</td>
                                        <td>@{{ item.qaipl4smHtotal }}</td>
                                        <td>@{{ item.qaipl4smH15 }}</td>
                                        <td>@{{ item.qaipl4smH16 }}</td>
                                        <td>@{{ item.qaipl4smH17 }}</td>
                                        <td>@{{ item.qaipl4smH18 }}</td>
                                        <td>@{{ item.qaipl4smH19 }}</td>
                                        <td>@{{ item.qaipl4smIqaipl5sm }}</td>
                                        <td>@{{ item.qaipl4smItotal }}</td>
                                        <td>@{{ item.qaipl4smI15 }}</td>
                                        <td>@{{ item.qaipl4smI16 }}</td>
                                        <td>@{{ item.qaipl4smI17 }}</td>
                                        <td>@{{ item.qaipl4smI18 }}</td>
                                        <td>@{{ item.qaipl4smI19 }}</td>
                                        <td>@{{ item.qaipl4smJqaipl5sm }}</td>
                                        <td>@{{ item.qaipl4smJtotal }}</td>
                                        <td>@{{ item.qaipl4smJ15 }}</td>
                                        <td>@{{ item.qaipl4smJ16 }}</td>
                                        <td>@{{ item.qaipl4smJ17 }}</td>
                                        <td>@{{ item.qaipl4smJ18 }}</td>
                                        <td>@{{ item.qaipl4smJ19 }}</td>
                                        <td>@{{ item.qaipl4smKqaipl5sm }}</td>
                                        <td>@{{ item.qaipl4smKtotal }}</td>
                                        <td>@{{ item.qaipl4smK15 }}</td>
                                        <td>@{{ item.qaipl4smK16 }}</td>
                                        <td>@{{ item.qaipl4smK17 }}</td>
                                        <td>@{{ item.qaipl4smK18 }}</td>
                                        <td>@{{ item.qaipl4smK19 }}</td>
                                        <td>@{{ item.qaipl4smLqaipl5sm }}</td>
                                        <td>@{{ item.qaipl4smLtotal }}</td>
                                        <td>@{{ item.qaipl4smL15 }}</td>
                                        <td>@{{ item.qaipl4smL16 }}</td>
                                        <td>@{{ item.qaipl4smL17 }}</td>
                                        <td>@{{ item.qaipl4smL18 }}</td>
                                        <td>@{{ item.qaipl4smL19 }}</td>
                                        <td>@{{ item.qaipl4smMqaipl5sm }}</td>
                                        <td>@{{ item.qaipl4smMtotal }}</td>
                                        <td>@{{ item.qaipl4smM15 }}</td>
                                        <td>@{{ item.qaipl4smM16 }}</td>
                                        <td>@{{ item.qaipl4smM17 }}</td>
                                        <td>@{{ item.qaipl4smM18 }}</td>
                                        <td>@{{ item.qaipl4smM19 }}</td>
                                        <td>@{{ item.qaipl4smNqaipl5sm }}</td>
                                        <td>@{{ item.qaipl4smNtotal }}</td>
                                        <td>@{{ item.qaipl4smN15 }}</td>
                                        <td>@{{ item.qaipl4smN16 }}</td>
                                        <td>@{{ item.qaipl4smN17 }}</td>
                                        <td>@{{ item.qaipl4smN18 }}</td>
                                        <td>@{{ item.qaipl4smN19 }}</td>
                                        <td>@{{ item.qaipl4smOqaipl5sm }}</td>
                                        <td>@{{ item.qaipl4smOtotal }}</td>
                                        <td>@{{ item.qaipl4smO15 }}</td>
                                        <td>@{{ item.qaipl4smO16 }}</td>
                                        <td>@{{ item.qaipl4smO17 }}</td>
                                        <td>@{{ item.qaipl4smO18 }}</td>
                                        <td>@{{ item.qaipl4smO19 }}</td>
                                        <td>@{{ item.status }}</td>
                                        
                                        <td>
                                            <div class="row no-gutters">
                                                <div class="col-auto">
                                                    <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/edit'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button"><i class="fa fa-edit"></i></a>
                                                </div>
                                                <form class="col" @submit.prevent="deleteItem(item.resource_url)">
                                                    <button type="submit" class="btn btn-sm btn-danger" title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i class="fa fa-trash-o"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="row" v-if="pagination.state.total > 0">
                                <div class="col-sm">
                                    <span class="pagination-caption">{{ trans('brackets/admin-ui::admin.pagination.overview') }}</span>
                                </div>
                                <div class="col-sm-auto">
                                    <pagination></pagination>
                                </div>
                            </div>

                            <div class="no-items-found" v-if="!collection.length > 0">
                                <i class="icon-magnifier"></i>
                                <h3>{{ trans('brackets/admin-ui::admin.index.no_items') }}</h3>
                                <p>{{ trans('brackets/admin-ui::admin.index.try_changing_items') }}</p>
                                <a class="btn btn-primary btn-spinner" href="{{ url('admin/sicis/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.sici.actions.create') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </sici-listing>

@endsection