@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.orcamento.actions.edit', ['name' => $orcamento->email]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <orcamento-form
                :action="'{{ $orcamento->resource_url }}'"
                :data="{{ $orcamento->toJson() }}"
                :estados="{{$estados->toJson()}}"
                :cidades="{{$cidades->toJson()}}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action"
                      novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.orcamento.actions.edit', ['name' => $orcamento->email]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.orcamento.components.form-elements')
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>

                </form>

            </orcamento-form>

        </div>

    </div>

@endsection
