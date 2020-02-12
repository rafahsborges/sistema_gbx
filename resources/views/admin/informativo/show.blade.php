@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.informativo.actions.show', ['name' => $informativo->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <informativo-form
                :action="'{{ $informativo->resource_url }}'"
                :data="{{ $informativo->toJson() }}"
                :servicos="{{$servicos->toJson()}}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action"
                      novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.informativo.actions.show', ['name' => $informativo->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.informativo.components.form-elements-show')
                    </div>

                </form>

            </informativo-form>

        </div>

    </div>

@endsection
