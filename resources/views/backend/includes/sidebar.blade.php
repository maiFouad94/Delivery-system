<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                {{ __('menus.backend.sidebar.general') }}
            </li>

            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/dashboard')) }}" href="{{ route('admin.dashboard') }}"><i class="icon-speedometer"></i> {{ __('menus.backend.sidebar.dashboard') }}</a>
            </li>

            <li class="nav-title">
                {{ __('menus.backend.sidebar.system') }}
            </li>

            @if ($logged_in_user->isAdmin())
                <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/auth*'), 'open') }}">
                    <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/auth*')) }}" href="#">
                        <i class="icon-user"></i> {{ __('menus.backend.access.title') }}

                        @if ($pending_approval > 0)
                            <span class="badge badge-danger">{{ $pending_approval }}</span>
                        @endif
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/auth/user*')) }}" href="{{ route('admin.auth.user.index') }}">
                                {{ __('labels.backend.access.users.management') }}

                                @if ($pending_approval > 0)
                                    <span class="badge badge-danger">{{ $pending_approval }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/auth/role*')) }}" href="{{ route('admin.auth.role.index') }}">
                                {{ __('labels.backend.access.roles.management') }}
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            <li class="nav-item  ">
                <a class="nav-link  " href="/admin/orders">
                    <i class="icon-list"></i> Manage orders
                </a>
            </li>
            <li class="nav-item  ">
                <a class="nav-link  " href="/admin/archive/assigned">
                    <i class="icon-list"></i> Assigned orders
                </a>
            </li>
            <li class="nav-item  ">
                <a class="nav-link  " href="/admin/archive/picked">
                    <i class="icon-list"></i> Picked orders
                </a>
            </li>
            <li class="nav-item  ">
                <a class="nav-link  " href="/admin/archive/delivered">
                    <i class="icon-list"></i> Delivered orders
                </a>
            </li>
             <li class="nav-item  ">
                <a class="nav-link  " href="/admin/archive/failed">
                    <i class="icon-list"></i> Failed orders
                </a>
            </li>
            <li class="nav-item  ">
                <a class="nav-link  " href="/admin/location">
                    <i class="icon-list"></i> change location
                </a>
            </li>
           
        </ul>
    </nav>
</div><!--sidebar-->