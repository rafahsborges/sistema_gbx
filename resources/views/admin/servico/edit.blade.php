@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.servico.actions.edit', ['name' => $servico->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <servico-form
                :action="'{{ $servico->resource_url }}'"
                :data="{{ $servico->toJson() }}"
                :statuses="{{$statuses->toJson()}}"
                :etapas="{{$etapas->toJson()}}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action"
                      novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.servico.actions.edit', ['name' => $servico->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.servico.components.form-elements')
                    </div>

                    @if(auth()->user()->is_admin === 1)
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" :disabled="submiting">
                                <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                                {{ trans('brackets/admin-ui::admin.btn.save') }}
                            </button>
                        </div>
                    @endif

                </form>

            </servico-form>

        </div>

    </div>

@endsection
