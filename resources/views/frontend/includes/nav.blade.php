<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4" >
    
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('labels.general.toggle_navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>


<div class="collapse navbar-collapse justify-content-front" id="navbarSupportedContent">
        <ul class="navbar-nav">

 <li class="nav-item"><a href="{{route('frontend.user.dashboard')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.user.dashboard')) }}"><img src="/img/frontend/logo.png"></a></li>
</ul>
</div>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
            @if (config('locale.status') && count(config('locale.languages')) > 1)
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownLanguageLink" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false" style="font-weight: bold;">{{ __('menus.language-picker.language') }} ({{ strtoupper(app()->getLocale()) }})</a>

                    @include('includes.partials.lang')
                </li>
            @endif

            @auth
                <li class="nav-item"><a href="{{route('frontend.user.dashboard')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.user.dashboard')) }}" style="font-weight: bold;">{{ __('navs.frontend.dashboard') }}</a></li>
            @endauth

            @guest
                <li class="nav-item"><a href="{{route('frontend.auth.login')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.auth.login')) }}" style="font-weight: bold;">{{ __('navs.frontend.login') }}</a></li>


            @else
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuUser" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false" style="font-weight: bold;">{{ $logged_in_user->name }}</a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuUser">
                        @can('view backend')
                            <a href="{{ route('admin.dashboard') }}" class="dropdown-item" style="font-weight: bold;">{{ __('navs.frontend.user.administration') }}</a>
                        @endcan

                        <a href="{{ route('frontend.user.account') }}" class="dropdown-item {{ active_class(Active::checkRoute('frontend.user.account')) }}" style="font-weight: bold;">{{ __('navs.frontend.user.account') }}</a>
                        <a href="{{ route('frontend.auth.logout') }}" class="dropdown-item" style="font-weight: bold;">{{ __('navs.general.logout') }}</a>
                    </div>
                </li>
            @endguest

            <li class="nav-item"><a href="{{route('frontend.contact')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.contact')) }}" style="font-weight: bold;">{{ __('navs.frontend.contact') }}</a></li>


        </ul>
    </div>
</nav>
