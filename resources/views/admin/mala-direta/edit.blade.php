@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.mala-direta.actions.edit', ['name' => $malaDiretum->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <mala-direta-form
                :action="'{{ $malaDiretum->resource_url }}'"
                :data="{{ $malaDiretum->toJson() }}"
                :clientes="{{ $clientes->toJson() }}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action"
                      novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.mala-direta.actions.edit', ['name' => $malaDiretum->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.mala-direta.components.form-elements')
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>

                </form>

            </mala-direta-form>

        </div>

    </div>

@endsection
