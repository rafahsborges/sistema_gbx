@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.apontamento.actions.edit', ['name' => $apontamento->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <apontamento-form
                :action="'{{ $apontamento->resource_url }}'"
                :data="{{ $apontamento->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.apontamento.actions.edit', ['name' => $apontamento->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.apontamento.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </apontamento-form>

        </div>
    
</div>

@endsection