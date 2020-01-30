@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.ponto.actions.index'))

@section('body')

    <ponto-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('admin/pontos') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.ponto.actions.index') }}
                        <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('admin/pontos/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.ponto.actions.create') }}</a>
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
                                    <div class="col form-group deadline-checkbox-col">
                                        <div class="switch-filter-wrap">
                                            <label class="switch switch-3d switch-primary">
                                                <input type="checkbox" class="switch-input"
                                                       v-model="showAdvancedFilter">
                                                <span class="switch-slider"></span>
                                            </label>
                                            <span class="authors-filter">&nbsp;{{ __('Filtros Avançados') }}</span>
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
                                <div class="row" v-if="showAdvancedFilter">
                                    <div class="col col-lg-12 col-xl-12 form-group">
                                        <multiselect v-model="clientesMultiselect"
                                                     :options="{{ $clientes->map(function($cliente) { return ['key' => $cliente->id, 'label' =>  $cliente->nome]; })->toJson() }}"
                                                     label="label"
                                                     track-by="key"
                                                     placeholder="{{ __('Type to search a cliente/s') }}"
                                                     :limit="2"
                                                     :multiple="true">
                                        </multiselect>
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

                                        <th is='sortable' :column="'id'">{{ trans('admin.ponto.columns.id') }}</th>
                                        <th is='sortable' :column="'nome'">{{ trans('admin.ponto.columns.nome') }}</th>
                                        <th is='sortable' :column="'logradouro'">{{ trans('admin.ponto.columns.logradouro') }}</th>
                                        <th is='sortable' :column="'numero'">{{ trans('admin.ponto.columns.numero') }}</th>
                                        <th is='sortable' :column="'complemento'">{{ trans('admin.ponto.columns.complemento') }}</th>
                                        <th is='sortable' :column="'bairro'">{{ trans('admin.ponto.columns.bairro') }}</th>
                                        <th is='sortable' :column="'cidade'">{{ trans('admin.ponto.columns.cidade') }}</th>
                                        <th is='sortable' :column="'uf'">{{ trans('admin.ponto.columns.uf') }}</th>
                                        <th is='sortable' :column="'cep'">{{ trans('admin.ponto.columns.cep') }}</th>
                                        <th is='sortable' :column="'estacao'">{{ trans('admin.ponto.columns.estacao') }}</th>
                                        <th is='sortable' :column="'entidade'">{{ trans('admin.ponto.columns.entidade') }}</th>
                                        <th is='sortable' :column="'latitude'">{{ trans('admin.ponto.columns.latitude') }}</th>
                                        <th is='sortable' :column="'longitude'">{{ trans('admin.ponto.columns.longitude') }}</th>
                                        <th is='sortable' :column="'altura'">{{ trans('admin.ponto.columns.altura') }}</th>
                                        <th is='sortable' :column="'id_cliente'">{{ trans('admin.ponto.columns.id_cliente') }}</th>

                                        <th></th>
                                    </tr>
                                    <tr v-show="(clickedBulkItemsCount > 0) || isClickedAll">
                                        <td class="bg-bulk-info d-table-cell text-center" colspan="17">
                                            <span class="align-middle font-weight-light text-dark">{{ trans('brackets/admin-ui::admin.listing.selected_items') }} @{{ clickedBulkItemsCount }}.  <a href="#" class="text-primary" @click="onBulkItemsClickedAll('/admin/pontos')" v-if="(clickedBulkItemsCount < pagination.state.total)"> <i class="fa" :class="bulkCheckingAllLoader ? 'fa-spinner' : ''"></i> {{ trans('brackets/admin-ui::admin.listing.check_all_items') }} @{{ pagination.state.total }}</a> <span class="text-primary">|</span> <a
                                                        href="#" class="text-primary" @click="onBulkItemsClickedAllUncheck()">{{ trans('brackets/admin-ui::admin.listing.uncheck_all_items') }}</a>  </span>

                                            <span class="pull-right pr-2">
                                                <button class="btn btn-sm btn-danger pr-3 pl-3" @click="bulkDelete('/admin/pontos/bulk-destroy')">{{ trans('brackets/admin-ui::admin.btn.delete') }}</button>
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
                                        <td>@{{ item.nome }}</td>
                                        <td>@{{ item.logradouro }}</td>
                                        <td>@{{ item.numero }}</td>
                                        <td>@{{ item.complemento }}</td>
                                        <td>@{{ item.bairro }}</td>
                                        <td>@{{ item.cidade }}</td>
                                        <td>@{{ item.uf }}</td>
                                        <td>@{{ item.cep }}</td>
                                        <td>@{{ item.estacao }}</td>
                                        <td>@{{ item.entidade }}</td>
                                        <td>@{{ item.latitude }}</td>
                                        <td>@{{ item.longitude }}</td>
                                        <td>@{{ item.altura }}</td>
                                        <td>@{{ item.cliente.nome }}</td>

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
                                <a class="btn btn-primary btn-spinner" href="{{ url('admin/pontos/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.ponto.actions.create') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </ponto-listing>

@endsection
