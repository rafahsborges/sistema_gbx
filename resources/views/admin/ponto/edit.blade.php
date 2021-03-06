@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.ponto.actions.edit', ['name' => $ponto->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <ponto-form
                :action="'{{ $ponto->resource_url }}'"
                :data="{{ $ponto->toJson() }}"
                :clientes="{{$clientes->toJson()}}"
                :estados="{{$estados->toJson()}}"
                :cidades="{{$cidades->toJson()}}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action"
                      novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.ponto.actions.edit', ['name' => $ponto->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.ponto.components.form-elements')
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>

                </form>

            </ponto-form>

        </div>

    </div>

@endsection
