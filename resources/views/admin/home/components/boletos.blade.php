<boleto-home-listing
    :data="{{ $boletos->toJson() }}"
    :url="'{{ url('admin/') }}'"
    inline-template>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i> {{ trans('admin.boleto.actions.index') }}
                </div>
                <div class="card-body" v-cloak>
                    <div class="card-block">

                        <table class="table table-hover table-listing">
                            <thead>
                            <tr>
                                <th is='sortable' :column="'id'">{{ trans('admin.boleto.columns.id') }}</th>
                                <th is='sortable'
                                    :column="'descricao'">{{ trans('admin.boleto.columns.descricao') }}</th>
                                <th is='sortable'
                                    :column="'id_cliente'">{{ trans('admin.boleto.columns.id_cliente') }}</th>
                                <th is='sortable'
                                    :column="'id_servico'">{{ trans('admin.boleto.columns.id_servico') }}</th>
                                <th is='sortable'
                                    :column="'vencimento'">{{ trans('admin.boleto.columns.vencimento') }}</th>
                                <th is='sortable' :column="'valor'">{{ trans('admin.boleto.columns.valor') }}</th>
                                <th is='sortable'
                                    :column="'pagamento'">{{ trans('admin.boleto.columns.pagamento') }}</th>
                                <th is='sortable'
                                    :column="'valor_pago'">{{ trans('admin.boleto.columns.valor_pago') }}</th>
                                <th is='sortable' :column="'status'">{{ trans('admin.boleto.columns.status') }}</th>

                                <th></th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(item, index) in collection" :key="item.id"
                                :class="bulkItems[item.id] ? 'bg-bulk' : ''">

                                <td>@{{ item.id }}</td>
                                <td>@{{ item.descricao }}</td>
                                <td>@{{ item.cliente !== null ? item.cliente.nome : '' }}</td>
                                <td>@{{ item.servico !== null ? item.servico.nome : '' }}</td>
                                <td>@{{ item.vencimento | date('DD/MM/YYYY')}}</td>
                                <td>R$ @{{ item.valor }}</td>
                                <td>@{{ item.pagamento | date('DD/MM/YYYY')}}</td>
                                <td>R$ @{{ item.valor_pago }}</td>
                                <td>@{{ item.status == 0 ? 'A Pagar' : item.status == 1 ? 'Pago' : item.status == 2
                                    ? 'Vencido' : 'Cancelado' }}
                                </td>

                                <td>
                                    <div class="row no-gutters" v-if="item.status !== 3">
                                        <div class="col-auto" v-if="item.status !== 1">
                                            <a class="btn btn-sm btn-spinner btn-warning"
                                               :href="'admin/' + item.id + '/status'"
                                               title="{{ trans('admin.boleto.actions.status') }}"
                                               role="button"><i class="fa fa-check"></i></a>
                                        </div>
                                        <div class="col-auto" v-if="item.status !== 1">
                                            <a class="btn btn-sm btn-spinner btn-success"
                                               :href="'admin/' + item.id + '/boleto'"
                                               title="{{ trans('admin.boleto.actions.boleto') }}"
                                               role="button"><i class="fa fa-money"></i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="row" v-if="pagination.state.total > 0">
                            <div class="col-sm">
                                    <span
                                        class="pagination-caption">{{ trans('brackets/admin-ui::admin.pagination.overview') }}</span>
                            </div>
                            <div class="col-sm-auto">
                                <pagination></pagination>
                            </div>
                        </div>

                        <div class="no-items-found" v-if="!collection.length > 0">
                            <i class="icon-magnifier"></i>
                            <h3>{{ trans('brackets/admin-ui::admin.index.no_items') }}</h3>
                            <p>{{ trans('brackets/admin-ui::admin.index.try_changing_items') }}</p>
                            <a class="btn btn-primary btn-spinner" href="{{ url('admin/boletos/create') }}"
                               role="button"><i
                                    class="fa fa-plus"></i>&nbsp; {{ trans('admin.boleto.actions.create') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</boleto-home-listing>
