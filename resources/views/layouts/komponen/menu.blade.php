<!-- BEGIN: Main Menu-->

<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        @if (url()->current() == route('home'))
            <li class="active">
        @else
            <li class=" nav-item">
        @endif
            <a href="{{route('home')}}">
            <i class="la la-tasks"></i><span class="menu-title" data-i18n="Home">Home</span>
        </a>
        </li>

        @if (\Str::contains(Route::currentRouteName(), ['user']))
            <li class="active">
        @else
            <li class=" nav-item">
        @endif
            <a href="{{route('user.index')}}">
            <i class="la la-users"></i><span class="menu-title" data-i18n="User">User</span>
        </a>
        </li>
        
        @if (\Str::contains(Route::currentRouteName(), ['kios']))
            <li class="active">
        @else
            <li class=" nav-item">
        @endif
            <a href="{{route('kios.index')}}">
            <i class="la la-home"></i><span class="menu-title" data-i18n="Kios">Kios</span>
        </a>
        </li>
    </ul>
    </div>
</div>

<!-- END: Main Menu-->