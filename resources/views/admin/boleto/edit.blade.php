@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.boleto.actions.edit', ['name' => $boleto->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <boleto-form
                :action="'{{ $boleto->resource_url }}'"
                :data="{{ $boleto->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.boleto.actions.edit', ['name' => $boleto->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.boleto.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </boleto-form>

        </div>
    
</div>

@endsection