@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.estado.actions.edit', ['name' => $estado->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <estado-form
                :action="'{{ $estado->resource_url }}'"
                :data="{{ $estado->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.estado.actions.edit', ['name' => $estado->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.estado.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </estado-form>

        </div>
    
</div>

@endsection