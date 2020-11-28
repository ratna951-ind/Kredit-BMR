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

        @if(Auth::user()->peran_id == 1)

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

        @elseif(Auth::user()->peran_id == 2)

            @if (\Str::contains(Route::currentRouteName(), ['konsumen']))
                <li class="active">
            @else
                <li class=" nav-item">
            @endif
                <a href="{{route('konsumen.index')}}">
                <i class="la la-user"></i><span class="menu-title" data-i18n="Konsumen">Konsumen</span>
            </a>
            </li>

            @if (\Str::contains(Route::currentRouteName(), ['jadwal']))
                <li class="active">
            @else
                <li class=" nav-item">
            @endif
                <a href="{{route('jadwal.index')}}">
                <i class="la la-calendar"></i><span class="menu-title" data-i18n="Jadwal">Jadwal</span>
            </a>
            </li>

            @if (\Str::contains(Route::currentRouteName(), ['order']))
                <li class="active">
            @else
                <li class=" nav-item">
            @endif
                <a href="{{route('order.index')}}">
                <i class="la la-check-square"></i><span class="menu-title" data-i18n="Order">Order</span>
            </a>
            </li>

            @if (\Str::contains(Route::currentRouteName(), ['pembebanan']))
                <li class="active">
            @else
                <li class=" nav-item">
            @endif
                <a href="{{route('pembebanan.index')}}">
                <i class="la la-money"></i><span class="menu-title" data-i18n="Pembebanan">Pembebanan</span>
            </a>
            </li>

        @elseif(Auth::user()->peran_id == 3)

            @if (\Str::contains(Route::currentRouteName(), ['jadwal']))
                <li class="active">
            @else
                <li class=" nav-item">
            @endif
                <a href="{{route('jadwal.index')}}">
                <i class="la la-calendar"></i><span class="menu-title" data-i18n="Jadwal">Jadwal</span>
            </a>
            </li>

            @if (\Str::contains(Route::currentRouteName(), ['laporan']))
                <li class="active">
            @else
                <li class=" nav-item">
            @endif
                <a href="{{route('laporan.order')}}">
                <i class="la la-sticky-note"></i><span class="menu-title" data-i18n="Laporan">Laporan</span>
            </a>
            </li>

        @elseif(Auth::user()->peran_id == 4)

            @if (\Str::contains(Route::currentRouteName(), ['order']))
                <li class="active">
            @else
                <li class=" nav-item">
            @endif
                <a href="{{route('order.index')}}">
                <i class="la la-check-square"></i><span class="menu-title" data-i18n="Order">Order</span>
            </a>
            </li>
            
            @if (\Str::contains(Route::currentRouteName(), ['kas_bank']))
                <li class="active">
            @else
                <li class=" nav-item">
            @endif
                <a href="{{route('kas_bank.index')}}">
                <i class="la la-bank"></i><span class="menu-title" data-i18n="Kas & Bank">Kas & Bank</span>
            </a>
            </li>

            @if (\Str::contains(Route::currentRouteName(), ['laporan']))
                <li class="active">
            @else
                <li class=" nav-item">
            @endif
                <a href="{{route('laporan.keuangan')}}">
                <i class="la la-sticky-note"></i><span class="menu-title" data-i18n="Laporan">Laporan</span>
            </a>
            </li>
        
        @elseif(Auth::user()->peran_id == 5)

            @if (\Str::contains(Route::currentRouteName(), ['laporan']))
                <li class="active">
            @else
                <li class=" nav-item">
            @endif
                <a href="{{route('laporan.keuangan.index')}}">
                <i class="la la-sticky-note"></i><span class="menu-title" data-i18n="Laporan">Laporan</span>
            </a>
            </li>

        @elseif(Auth::user()->peran_id == 6)

            @if (\Str::contains(Route::currentRouteName(), ['laporan.order']))
                <li class="active">
            @else
                <li class=" nav-item">
            @endif
                <a href="{{route('laporan.order.index')}}">
                <i class="la la-sticky-note"></i><span class="menu-title" data-i18n="Laporan Order">Laporan Order</span>
            </a>
            </li>

            @if (\Str::contains(Route::currentRouteName(), ['laporan.keuangan']))
                <li class="active">
            @else
                <li class=" nav-item">
            @endif
                <a href="{{route('laporan.keuangan.index')}}">
                <i class="la la-money"></i><span class="menu-title" data-i18n="Laporan Keuangan">Laporan Keuangan</span>
            </a>
            </li>

        @endif
    </ul>
    </div>
</div>

<!-- END: Main Menu-->