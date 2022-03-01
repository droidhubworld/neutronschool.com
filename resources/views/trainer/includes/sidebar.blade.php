<nav id="sidebar" class="sidebar">
<div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
    {{-- <img src="{{ asset('img/frontend/img/logo/logo.png') }}" alt="Eduboat" > --}}
  <span class="align-middle me-3">Eduboat</span>
</a>

        <ul class="sidebar-nav">
            <li class="sidebar-header nav-title">
                @lang('menus.backend.sidebar.general')
            </li>

            <li class="sidebar-item {{
                    active_class(Route::is('trainer.dashboard'))
                }}">
                <a class="sidebar-link" href="{{ route('trainer.dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">@lang('menus.backend.sidebar.dashboard')</span>
                </a>
            </li>
            <li class="sidebar-item {{
                    active_class(Route::is('trainer.myaccount*'))
                }}">
                <a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link {{
                    active_class(Route::is('trainer.myaccount*'),'collapsed')
                }}" aria-expanded="{{
                    expanded(Route::is('trainer.myaccount*'))
                }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">{{ __('menus.backend.sidebar.my_ccount') }}</span>
                </a>
                <ul id="pages" class="sidebar-dropdown list-unstyled collapse {{
                    active_class(Route::is('trainer.myaccount*'),'show')
                }}" data-bs-parent="#sidebar">
                    <li class="sidebar-item {{
                            active_class(Route::is('trainer.myaccount.profile'))
                        }}">
                        <a class="sidebar-link" href="{{ route('trainer.myaccount.profile') }}">{{ __('menus.backend.sidebar.profile') }}</a>
                    </li>
                    
                    <li class="sidebar-item {{
                            active_class(Route::is('trainer.address.index'))
                        }}">
                        <a class="sidebar-link" href="{{ route('trainer.address.index') }}">{{ __('menus.backend.sidebar.address') }}</a>
                    </li>

                    <li class="sidebar-item {{
                            active_class(Route::is('trainer.myaccount.setting'))
                        }}">
                        <a class="sidebar-link" href="{{ route('trainer.myaccount.setting') }}">{{ __('menus.backend.sidebar.setting') }}</a>
                    </li>
                    {{--  <li class="sidebar-item"><a class="sidebar-link" href="{{ route('trainer.address.index') }}">{{ __('menus.backend.sidebar.address') }}</a></li> --}}
                    {{-- <li class="sidebar-item"><a class="sidebar-link" href="pages-settings.html">{{ __('labels.general.document') }}</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="pages-settings.html">{{ __('labels.general.bank_account') }}</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="pages-clients.html">{{ __('labels.general.chnage_password') }}</a></li> --}}
                    {{-- <li class="sidebar-item">
                        <a data-bs-target="#projects" data-bs-toggle="collapse" class="sidebar-link collapsed">
                        Projects
                        </a>
                        <ul id="projects" class="sidebar-dropdown list-unstyled collapse ">
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="pages-projects-list.html">List</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="pages-projects-detail.html">Detail <span class="badge badge-sidebar-primary">New</span></a>
                            </li>
                        </ul>
                    </li> --}}
                </ul>
            </li>
            <li class="sidebar-item {{
                    active_class(Route::is('trainer.video*'))
                }}">
                <a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link {{
                    active_class(Route::is('trainer.video*'),'collapsed')
                }}" aria-expanded="{{
                    expanded(Route::is('trainer.video*'))
                }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Video</span>
                </a>
                <ul id="pages" class="sidebar-dropdown list-unstyled collapse {{
                    active_class(Route::is('trainer.video*'),'show')
                }}" data-bs-parent="#sidebar">
                    <li class="sidebar-item {{
                            active_class(Route::is('trainer.video-upload.index'))
                        }}">
                        <a class="sidebar-link" href="{{ route('trainer.video-upload.index') }}">Upload Video</a>
                    </li>
                </ul>
            </li>
        </ul>

    </div>
</nav>
