@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.admin-user.actions.index'))

@section('body')

    <admin-user-listing
        :data="{{ $data->toJson() }}"
        :activation="!!'{{ $activation }}'"
        :url="'{{ url('admin/admin-users') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.admin-user.actions.index') }}
                        <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('admin/admin-users/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.admin-user.actions.create') }}</a>
                    </div>
                    <div class="card-body" v-cloak>
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
                                    <th is='sortable' :column="'id'">{{ trans('admin.admin-user.columns.id') }}</th>
                                    <th is='sortable' :column="'tipo'">{{ trans('admin.admin-user.columns.tipo') }}</th>
                                    <th is='sortable' :column="'nome'">{{ trans('admin.admin-user.columns.nome') }}</th>
                                    <th is='sortable' :column="'razao_social'">{{ trans('admin.admin-user.columns.razao_social') }}</th>
                                    <th is='sortable' :column="'cpf'">{{ trans('admin.admin-user.columns.cpf') }}</th>
                                    <th is='sortable' :column="'cnpj'">{{ trans('admin.admin-user.columns.cnpj') }}</th>
                                    <th is='sortable' :column="'email'">{{ trans('admin.admin-user.columns.email') }}</th>
                                    <th is='sortable' :column="'email2'">{{ trans('admin.admin-user.columns.email2') }}</th>
                                    <th is='sortable' :column="'email3'">{{ trans('admin.admin-user.columns.email3') }}</th>
                                    <th is='sortable' :column="'telefone'">{{ trans('admin.admin-user.columns.telefone') }}</th>
                                    <th is='sortable' :column="'celular'">{{ trans('admin.admin-user.columns.celular') }}</th>
                                    <th is='sortable' :column="'logradouro'">{{ trans('admin.admin-user.columns.logradouro') }}</th>
                                    <th is='sortable' :column="'numero'">{{ trans('admin.admin-user.columns.numero') }}</th>
                                    <th is='sortable' :column="'complemento'">{{ trans('admin.admin-user.columns.complemento') }}</th>
                                    <th is='sortable' :column="'bairro'">{{ trans('admin.admin-user.columns.bairro') }}</th>
                                    <th is='sortable' :column="'cidade'">{{ trans('admin.admin-user.columns.cidade') }}</th>
                                    <th is='sortable' :column="'uf'">{{ trans('admin.admin-user.columns.uf') }}</th>
                                    <th is='sortable' :column="'cep'">{{ trans('admin.admin-user.columns.cep') }}</th>
                                    <th is='sortable' :column="'vencimento'">{{ trans('admin.admin-user.columns.vencimento') }}</th>
                                    <th is='sortable' :column="'valor'">{{ trans('admin.admin-user.columns.valor') }}</th>
                                    <th is='sortable' :column="'ini_contrato'">{{ trans('admin.admin-user.columns.ini_contrato') }}</th>
                                    <th is='sortable' :column="'fim_contrato'">{{ trans('admin.admin-user.columns.fim_contrato') }}</th>
                                    <th is='sortable' :column="'fistel'">{{ trans('admin.admin-user.columns.fistel') }}</th>
                                    <th is='sortable' :column="'is_admin'">{{ trans('admin.admin-user.columns.is_admin') }}</th>
                                    <th is='sortable' :column="'activated'" v-if="activation">{{ trans('admin.admin-user.columns.activated') }}</th>
                                    <th is='sortable' :column="'forbidden'">{{ trans('admin.admin-user.columns.forbidden') }}</th>
                                    <th is='sortable' :column="'language'">{{ trans('admin.admin-user.columns.language') }}</th>
                                    <th is='sortable' :column="'enabled'">{{ trans('admin.admin-user.columns.enabled') }}</th>
                                    
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in collection">
                                    <td >@{{ item.id }}</td>
                                    <td >@{{ item.tipo }}</td>
                                    <td >@{{ item.nome }}</td>
                                    <td >@{{ item.razao_social }}</td>
                                    <td >@{{ item.cpf }}</td>
                                    <td >@{{ item.cnpj }}</td>
                                    <td >@{{ item.email }}</td>
                                    <td >@{{ item.email2 }}</td>
                                    <td >@{{ item.email3 }}</td>
                                    <td >@{{ item.telefone }}</td>
                                    <td >@{{ item.celular }}</td>
                                    <td >@{{ item.logradouro }}</td>
                                    <td >@{{ item.numero }}</td>
                                    <td >@{{ item.complemento }}</td>
                                    <td >@{{ item.bairro }}</td>
                                    <td >@{{ item.cidade }}</td>
                                    <td >@{{ item.uf }}</td>
                                    <td >@{{ item.cep }}</td>
                                    <td >@{{ item.vencimento | date }}</td>
                                    <td >@{{ item.valor }}</td>
                                    <td >@{{ item.ini_contrato | date }}</td>
                                    <td >@{{ item.fim_contrato | date }}</td>
                                    <td >@{{ item.fistel }}</td>
                                    <td >@{{ item.is_admin }}</td>
                                    <td v-if="activation">
                                        <label class="switch switch-3d switch-success">
                                            <input type="checkbox" class="switch-input" v-model="collection[index].activated" @change="toggleSwitch(item.resource_url, 'activated', collection[index])">
                                            <span class="switch-slider"></span>
                                        </label>
                                    </td>
                                    <td >
                                        <label class="switch switch-3d switch-danger">
                                            <input type="checkbox" class="switch-input" v-model="collection[index].forbidden" @change="toggleSwitch(item.resource_url, 'forbidden', collection[index])">
                                            <span class="switch-slider"></span>
                                        </label>
                                    </td>
                                    <td >@{{ item.language }}</td>
                                    <td >
                                        <label class="switch switch-3d switch-success">
                                            <input type="checkbox" class="switch-input" v-model="collection[index].enabled" @change="toggleSwitch(item.resource_url, 'enabled', collection[index])">
                                            <span class="switch-slider"></span>
                                        </label>
                                    </td>
                                    
                                    <td>
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                                <button class="btn btn-sm btn-warning" v-show="!item.activated" @click="resendActivation(item.resource_url + '/resend-activation')" title="Resend activation" role="button"><i class="fa fa-envelope-o"></i></button>
                                            </div>
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
                            <a class="btn btn-primary btn-spinner" href="{{ url('admin/admin-users/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('brackets/admin-ui::admin.btn.new') }} AdminUser</a>
	                    </div>
                    </div>
                </div>
            </div>
        </div>
    </admin-user-listing>

@endsection
