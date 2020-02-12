@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.informativo.actions.edit', ['name' => $informativo->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <informativo-form
                :action="'{{ $informativo->resource_url }}'"
                :data="{{ $informativo->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.informativo.actions.edit', ['name' => $informativo->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.informativo.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </informativo-form>

        </div>
    
</div>

@endsection