<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/informativos') }}"><i
                        class="nav-icon icon-energy"></i> {{ trans('admin.informativo.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/boletos') }}"><i
                        class="nav-icon icon-energy"></i> {{ trans('admin.boleto.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/sicis') }}"><i
                        class="nav-icon icon-energy"></i> {{ trans('admin.sici.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/documentos') }}"><i
                        class="nav-icon icon-energy"></i> {{ trans('admin.documento.title') }}</a></li>
            <li class="nav-item" data-toggle="collapse" data-target="#profile" class="collapsed active">
                <a class="nav-link"><i
                        class="nav-icon icon-energy"></i> {{ trans('brackets/admin-ui::admin.profile_dropdown.account') }}
                    <span class="arrow"></span>
                </a>
            </li>
            <div class="sub-menu collapse" id="profile">
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/profile') }}"><i
                            class="nav-icon icon-energy"></i> {{ trans('admin.profile.title') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/representantes') }}"><i
                            class="nav-icon icon-energy"></i> {{ trans('admin.representante.title') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/pontos') }}"><i
                            class="nav-icon icon-compass"></i> {{ trans('admin.ponto.title') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/apontamentos') }}"><i
                            class="nav-icon icon-diamond"></i> {{ trans('admin.apontamento.title') }}</a></li>
            </div>
            <li class="nav-item"><a class="nav-link" href="http://sei.anatel.gov.br" target="_blank"><i
                        class="nav-icon icon-energy"></i> {{ trans('admin.anatel.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/chats') }}"><i
                        class="nav-icon icon-energy"></i> {{ trans('admin.chat.title') }}</a></li>
            {{-- Do not delete me :) I'm used for auto-generation menu items --}}
            @if(auth()->user()->is_admin == 1)
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i
                            class="nav-icon icon-user"></i> {{ trans('admin.admin-user.title') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/servicos') }}"><i
                            class="nav-icon icon-star"></i> {{ trans('admin.servico.title') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/notifications') }}"><i
                            class="nav-icon icon-diamond"></i> {{ trans('admin.notification.title') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/etapas') }}"><i
                            class="nav-icon icon-flag"></i> {{ trans('admin.etapa.title') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/itens') }}"><i
                            class="nav-icon icon-energy"></i> {{ trans('admin.item.title') }}</a></li>
                <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/status') }}"><i
                            class="nav-icon icon-star"></i> {{ trans('admin.status.title') }}</a></li>
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
