<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/representantes') }}"><i
                        class="nav-icon icon-energy"></i> {{ trans('admin.representante.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/servicos') }}"><i
                        class="nav-icon icon-star"></i> {{ trans('admin.servico.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/pontos') }}"><i
                        class="nav-icon icon-compass"></i> {{ trans('admin.ponto.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/observacoes') }}"><i
                        class="nav-icon icon-magnet"></i> {{ trans('admin.observacao.title') }}</a></li>
            {{-- Do not delete me :) I'm used for auto-generation menu items --}}
            @if(auth()->user()->is_admin == 1)
                <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i
                            class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i
                            class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            @endif
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
