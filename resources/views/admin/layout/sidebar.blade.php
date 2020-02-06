<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/representantes') }}"><i
                        class="nav-icon icon-energy"></i> {{ trans('admin.representante.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/pontos') }}"><i
                        class="nav-icon icon-compass"></i> {{ trans('admin.ponto.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/apontamentos') }}"><i
                        class="nav-icon icon-diamond"></i> {{ trans('admin.apontamento.title') }}</a></li>
            {{-- Do not delete me :) I'm used for auto-generation menu items --}}
            @if(auth()->user()->is_admin == 1)
                <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i
                            class="nav-icon icon-user"></i> {{ trans('admin.admin-user.title') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/servicos') }}"><i
                            class="nav-icon icon-star"></i> {{ trans('admin.servico.title') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/status') }}"><i
                            class="nav-icon icon-star"></i> {{ trans('admin.status.title') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/etapas') }}"><i
                            class="nav-icon icon-flag"></i> {{ trans('admin.etapa.title') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/itens') }}"><i
                            class="nav-icon icon-energy"></i> {{ trans('admin.item.title') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/estados') }}"><i
                            class="nav-icon icon-diamond"></i> {{ trans('admin.estado.title') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/cidades') }}"><i
                            class="nav-icon icon-drop"></i> {{ trans('admin.cidade.title') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i
                            class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            @endif
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
