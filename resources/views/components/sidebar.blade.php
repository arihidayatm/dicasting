<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <img class="rounded-circle mr-3"
                width="60"
                src="{{ asset('img/dicasting.png') }}"
                alt="avatar">
            <a href="{{ url('home') }}">Dicasting</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <img class="rounded-circle mr-3"
                width="60"
                src="{{ asset('img/dicasting.png') }}"
                alt="avatar">
            {{-- <a href="{{ url('home') }}">DC</a> --}}
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item  ">
                <a href="{{ url('home') }}" class="nav-link ">
                    <i class="fas fa-home">
                    </i><span>Dashboard</span>
                </a>
            </li>

            <li class="menu-header">Masters</li>
            <li class="nav-item ">
                <a href="#" class="nav-link ">
                    <i class="fas fa-users"></i>
                    <span>Users</span>
                </a>
            </li>

            <li class="nav-item dropdown {{ Request::is('home') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-file-invoice"></i>
                    <span>Data Stunting</span>
                </a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('stuntings') ? 'active' : '' }}'>
                        <a class="nav-link"
                            href="#">
                            <i class="fas fa-file-import"></i>Data EPPGBM</a>
                    </li>
                    <li class='{{ Request::is('stuntings') ? 'active' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('stuntings.index') }}">
                            <i class="fas fa-file"></i>Management Data</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('home') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-user-circle"></i>
                    <span>Bapak Asuh</span>
                </a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('bapakasuhs') ? 'active' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('bapakasuhs.index') }}">
                            <i class="fas fa-user-circle"></i>Data Bapak Asuh</a>
                    </li>
                    <li class='{{ Request::is('bapakasuhs') ? 'active' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('anakasuhs.index') }}">
                            <i class="fas fa-file"></i>Data Anak Asuh</a>
                    </li>
                </ul>
            </li>

            {{-- Intervensi --}}
            <li class="nav-item dropdown {{ Request::is('home') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-handshake"></i>
                    <span>Intervensi</span>
                </a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('intervensi') ? 'active' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('intervensi.index') }}">
                            <i class="fas fa-marker"></i>Data Intervensi</a>
                    </li>
                    <li class='{{ Request::is('intervensis') ? 'active' : '' }}'>
                        <a class="nav-link"
                            href="#">
                            <i class="fas fa-file-import"></i>BPAS</a>
                    </li>
                    <li class='{{ Request::is('intervensis') ? 'active' : '' }}'>
                        <a class="nav-link"
                            href="#">
                            <i class="fas fa-file-import"></i>Non BPAS</a>
                    </li>
                </ul>
            </li>
{{--
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-marker"></i>
                    <span>Intervensi</span>
                </a>
            </li>
-- }}
{{--
            <li class="nav-item">
                <a href="{{ route('permissions.index') }}" class="nav-link">
                    <i class="fas fa-file-signature"></i>
                    <span>Permission</span>
                </a>
            </li>
--}}
            <li class="menu-header">Laporan</li>
            <li class="nav-item dropdown {{ Request::is('home') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-file-invoice"></i>
                    <span>Laporan</span>
                </a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('home') ? 'active' : '' }}'>
                        <a class="nav-link"
                            href="#">Buku Stunting</a>
                    </li>
                    <li class="{{ Request::is('home') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="#">Kasus Aktif</a>
                    </li>
                    <li class='{{ Request::is('home') ? 'active' : '' }}'>
                        <a class="nav-link"
                            href="#">Kasus Belum Intervensi</a>
                    </li>
                    <li class="{{ Request::is('home') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="#">Balita Resiko Tinggi</a>
                    </li>
                    <li class='{{ Request::is('home') ? 'active' : '' }}'>
                        <a class="nav-link"
                            href="#">Wisuda Stunting</a>
                    </li>
                    <li class="{{ Request::is('home') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="#">Peta Stunting</a>
                    </li>
                </ul>
            </li>

{{--
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-file-invoice"></i>
                    <span>Laporan</span>
                </a>

                <ul class="dropdwon-menu">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-file-invoice"></i>
                        <span>Buku Stunting</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-file-invoice"></i>
                        <span>Kasus Aktif</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-file-invoice"></i>
                        <span>Kasus Belum Intervensi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-file-invoice"></i>
                        <span>Balita Resiko Tinggi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-file-invoice"></i>
                        <span>Wisuda Stunting</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-file-invoice"></i>
                        <span>Peta Stunting</span>
                    </a>
                </li>
            </li>
         --}}


        <div class="hide-sidebar-mini mt-4 mb-4 p-3">
            <a href="https://getstisla.com/docs"
                class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-book"></i> Documentation
            </a>
        </div>
    </ul>
    </aside>
</div>
