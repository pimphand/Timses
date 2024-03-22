<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="index.html" class="logo logo-light">
        <span class="logo-lg">
            <img src="{{ asset('assets') }}/images/logo.png" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('assets') }}/images/logo-sm.png" alt="small logo">
        </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="index.html" class="logo logo-dark">
        <span class="logo-lg">
            <img src="{{ asset('assets') }}/images/logo-dark.png" alt="dark logo">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('assets') }}/images/logo-sm.png" alt="small logo">
        </span>
    </a>
    <!-- Full Sidebar Menu Close Button -->
    <div class="button-close-fullsidebar">
        <i class="ri-close-fill align-middle"></i>
    </div>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!-- Leftbar User -->
        <div class="leftbar-user">
            <a href="pages-profile.html">
                <img src="{{ asset('assets') }}/images/users/avatar-1.jpg" alt="user-image" height="42"
                    class="rounded-circle shadow-sm">
                <span class="leftbar-user-name mt-2">Michael Berndt</span>
            </a>
        </div>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title">Main</li>

            <li class="side-nav-item">
                <a href="{{route('dashboard')}}" class="side-nav-link">
                    <i class="ri-dashboard-2-fill"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{route('quickCount')}}" class="side-nav-link">
                    <i class="ri-calendar-event-fill"></i>
                    <span> Quick Count </span>
                </a>
            </li>

            @if(auth()->user()->role != null)
            <li class="side-nav-item">
                <a href="{{route('data-recap.create')}}" aria-expanded="false" aria-controls="sidebarMaps"
                    class="side-nav-link">
                    <i class="ri-treasure-map-fill"></i>
                    <span> Input Rekap </span>
                </a>
            </li>
            @endif

            @if(auth()->user()->role == null)
            <li class="side-nav-title">Data Master</li>

            {{-- <li class="side-nav-item">--}}
                {{-- <a href="{{ route('volunteers.index') }}" aria-expanded="false" aria-controls="sidebarBaseUI" --}}
                    {{-- class="side-nav-link">--}}
                    {{-- <i class="ri-briefcase-fill"></i>--}}
                    {{-- <span> Relawan </span>--}}
                    {{-- </a>--}}

                {{-- </li>--}}
            <li class="side-nav-item">
                <a href="{{ route('voters.index') }}" aria-expanded="false" aria-controls="sidebarBaseUI"
                    class="side-nav-link">
                    <i class="ri-survey-fill"></i>
                    <span> Relawan </span>
                </a>

            </li>

            <li class="side-nav-item">
                <a href="{{ route('witnesses.index') }}" aria-expanded="false" aria-controls="sidebarBaseUI"
                    class="side-nav-link">
                    <i class="ri-pages-fill"></i>
                    <span> Saksi </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('tps.index') }}" aria-expanded="false" aria-controls="sidebarBaseUI"
                    class="side-nav-link">
                    <i class="ri-table-fill"></i>
                    <span> TPS </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('candidates.index') }}" aria-expanded="false" aria-controls="sidebarBaseUI"
                    class="side-nav-link">
                    <i class="ri-user-fill"></i>
                    <span> Paslon </span>
                </a>
            </li>

            <li class="side-nav-title">Kegiatan</li>

            <li class="side-nav-item">
                <a href="{{route('news.index')}}" aria-expanded="false" aria-controls="sidebarPagesAuth"
                    class="side-nav-link">
                    <i class="ri-share-fill"></i>
                    <span> Berita </span>

                </a>
            </li>

            <li class="side-nav-title">Pengaturan</li>

            <li class="side-nav-item">
                <a href="{{route('settings.index')}}" aria-expanded="false" aria-controls="sidebarPagesAuth"
                    class="side-nav-link">
                    <i class="ri-html5-fill"></i>
                    <span> Website </span>
                </a>
            </li>
            @endif

        </ul>

        <div class="clearfix"></div>
    </div>
</div>
<!-- ========== Left Sidebar End ========== -->