@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.cidade.actions.edit', ['name' => $cidade->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <cidade-form
                :action="'{{ $cidade->resource_url }}'"
                :data="{{ $cidade->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.cidade.actions.edit', ['name' => $cidade->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.cidade.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </cidade-form>

        </div>
    
</div>

@endsection