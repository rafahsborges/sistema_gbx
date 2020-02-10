@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.etapa.actions.edit', ['name' => $etapa->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <etapa-form
                :action="'{{ $etapa->resource_url }}'"
                :data="{{ $etapa->toJson() }}"
                :statuses="{{$statuses->toJson()}}"
                :servicos="{{$servicos->toJson()}}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.etapa.actions.edit', ['name' => $etapa->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.etapa.components.form-elements')
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>

                </form>

        </etapa-form>

        </div>

</div>

@endsection
