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

            <li class="nav-item dropdown {{ Request::is('home') ? '' : '' }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fa-solid fa-users-rectangle"></i>
                    <span>Users</span>
                </a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('users') ? '' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('users.index') }}">
                            <i class="fas fa-file"></i>Management User</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('home') ? '' : '' }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fa-solid fa-people-roof"></i>
                    <span>Keluarga</span>
                </a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('keluargas') ? '' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('keluargas.index') }}">
                            <i class="fas fa-file"></i>Management Keluarga</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('home') ? '' : '' }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fa-solid fa-baby"></i>
                    <span>Balita</span>
                </a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('balitas') ? '' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('balita.index') }}">
                            <i class="fas fa-file"></i>Data Balita</a>
                    </li>
                    <li class='{{ Request::is('balitas') ? 'active' : '' }}'>
                        <a class="nav-link"
                            href="/laporan/balita/chart">
                            <i class="fas fa-file"></i>Balita Chart</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('home') ? '' : '' }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fa-solid fa-house-chimney-medical"></i>
                    <span>Puskesmas</span>
                </a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('balitas') ? '' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('puskesmas.index') }}">
                            <i class="fas fa-file"></i>Management Puskesmas</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('home') ? '' : '' }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fa-solid fa-square-plus"></i>
                    <span>Posyandu</span>
                </a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('posyandus') ? '' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('posyandus.index') }}">
                            <i class="fas fa-file"></i>Management Posyandu</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('home') ? '' : '' }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fa-solid fa-school"></i>
                    <span>PAUD</span>
                </a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('posyandus') ? '' : '' }}'>
                        <a class="nav-link"
                            href="#">
                            <i class="fas fa-file"></i>Management PAUD</a>
                    </li>
                </ul>
            </li>

            <li class="menu-header">Data</li>

            <li class="nav-item dropdown {{ Request::is('home') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fa-solid fa-children"></i>
                    <span>Stunting</span>
                </a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('stuntings') ? '' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('stuntings.dataEppgbm') }}">
                            <i class="fas fa-file-import"></i>Data EPPGBM</a>
                    </li>
                    <li class='{{ Request::is('stuntings') ? '' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('stuntings.index') }}">
                            <i class="fas fa-file"></i>Management Data</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('home') ? '' : '' }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fa-solid fa-people-group"></i>
                    <span>Bapak Ibu Asuh</span>
                </a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('bapakasuhs') ? '' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('bapakasuhs.index') }}">
                            <ion-icon name="people-sharp"></ion-icon>&nbsp Data BASUH</a>
                    </li>
                    <li class='{{ Request::is('bapakasuhs') ? '' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('nonbapakasuhs.index') }}">
                            <ion-icon name="briefcase-outline"></ion-icon>&nbsp Data Non BASUH</a>
                    </li>
                    <li class='{{ Request::is('bapakasuhs') ? '' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('anakasuhs.index') }}">
                            <ion-icon name="id-card-sharp"></ion-icon>&nbsp Data Anak Asuh</a>
                    </li>
                </ul>
            </li>

            {{-- Intervensi --}}
            <li class="nav-item dropdown {{ Request::is('home') ? '' : '' }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fa-solid fa-handshake"></i>
                    <span>Intervensi</span>
                </a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('intervensi') ? '' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('intervensi.index') }}">
                            <i class="fas fa-marker"></i>Data Intervensi</a>
                    </li>
                    <li class='{{ Request::is('intervensi') ? '' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('intervensi-bpas.index') }}">
                            <i class="fas fa-file-import"></i>BASUH</a>
                    </li>
                    <li class='{{ Request::is('intervensi') ? '' : '' }}'>
                        <a class="nav-link"
                            href={{ route('intervensi-nonbpas.index') }}>
                            <i class="fas fa-file-import"></i>Non BASUH</a>
                    </li>
                </ul>
            </li>

            {{-- Laporan --}}
            <li class="menu-header">Laporan</li>
            <li class="nav-item dropdown {{ Request::is('home') ? '' : '' }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-file-invoice"></i>
                    <span>Laporan</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('home') ? '' : '' }}">
                        <a class="nav-link"
                            href="{{ route('laporan.index') }}">Laporan</a>
                    </li>
                    {{-- <li class='{{ Request::is('home') ? '' : '' }}'>
                        <a class="nav-link"
                            href="#">Buku Stunting</a>
                    </li> --}}
                    <li class="{{ Request::is('home') ? '' : '' }}">
                        <a class="nav-link"
                            href="{{ route('laporan.kasusAktif') }}">Kasus Aktif</a>
                    </li>
                    <li class='{{ Request::is('home') ? '' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('laporan.kasusBelumIntervensi') }}">Kasus Belum Intervensi</a>
                    </li>
                    <li class="{{ Request::is('home') ? '' : '' }}">
                        <a class="nav-link"
                            href="{{ route('laporan.balitaResiko') }}">Balita Resiko Tinggi</a>
                    </li>
                    <li class='{{ Request::is('home') ? '' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('laporan.kasusSembuh') }}">Wisuda Stunting</a>
                    </li>
                    {{-- <li class="{{ Request::is('home') ? '' : '' }}">
                        <a class="nav-link"
                            href="#">Peta Stunting</a>
                    </li> --}}
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
