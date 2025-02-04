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
                    <i class="fas fa-desktop" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''">
                    </i><span>Dashboard</span>
                </a>
            </li>

            <li class="menu-header">Masters</li>

            <li class="nav-item dropdown {{ Request::is('home') ? '' : '' }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fa-solid fa-people-roof" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></i>
                    <span>Keluarga</span>
                </a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('keluargas') ? '' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('keluargas.index') }}">
                            <ion-icon name="list-circle-outline" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></ion-icon>&nbsp Data Keluarga</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('home') ? '' : '' }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fa-solid fa-baby" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></i>
                    <span>Balita</span>
                </a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('balitas') ? '' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('balita.index') }}">
                            <ion-icon name="body-outline" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></ion-icon>&nbsp Data Balita</a>
                    </li>
                    <li class='{{ Request::is('balitas') ? '' : '' }}'>
                        <a class="nav-link"
                            href="/laporan/balita/chart">
                            <ion-icon name="pulse-outline" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></ion-icon></i>&nbsp Balita Chart</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('home') ? '' : '' }}">
                <a href="{{ route('puskesmas.index') }}" class="nav-link">
                    <i class="fa-solid fa-house-chimney-medical" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></i>
                    <span>Puskesmas</span>
                </a>
                {{-- <ul class="dropdown-menu">
                    <li class='{{ Request::is('balitas') ? '' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('puskesmas.index') }}">
                            <ion-icon name="business-outline"></ion-icon>&nbsp Management Puskesmas</a>
                    </li>
                </ul> --}}
            </li>
            <li class="nav-item dropdown {{ Request::is('home') ? '' : '' }}">
                <a href="{{ route('posyandus.index') }}" class="nav-link">
                    <i class="fa-solid fa-square-plus" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></i>
                    <span>Posyandu</span>
                </a>
                {{-- <ul class="dropdown-menu">
                    <li class='{{ Request::is('posyandus') ? '' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('posyandus.index') }}">
                            <ion-icon name="today-outline"></ion-icon>&nbsp Management Posyandu</a>
                    </li>
                </ul> --}}
            </li>
            <li class="nav-item dropdown {{ Request::is('home') ? '' : '' }}">
                <a href="{{ route ('sekolah.index') }}" class="nav-link">
                    <i class="fa-solid fa-school" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></i>
                    <span>Sekolah</span>
                </a>
                {{-- <ul class="dropdown-menu">
                    <li class='{{ Request::is('posyandus') ? '' : '' }}'>
                        <a class="nav-link"
                            href="#">
                            <ion-icon name="basket-outline"></ion-icon>&nbsp Management Sekolah</a>
                    </li>
                </ul> --}}
            </li>
            <li class="nav-item dropdown {{ Request::is('home') ? '' : '' }}">
                <a href="{{ route ('paud.index') }}" class="nav-link">
                    <i class="fa-solid fa-warehouse" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></i>
                    <span>PAUD</span>
                </a>
                {{-- <ul class="dropdown-menu">
                    <li class='{{ Request::is('posyandus') ? '' : '' }}'>
                        <a class="nav-link"
                            href="#">
                            <ion-icon name="basket-outline"></ion-icon>&nbsp Management PAUD</a>
                    </li>
                </ul> --}}
            </li>
            <li class="nav-item dropdown {{ Request::is('home') ? '' : '' }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fa-solid fa-chart-line" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></i>
                    <span>Program Data</span>
                </a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('balitas') ? '' : '' }}'>
                        <a class="nav-link"
                            href="#">
                            <ion-icon name="documents-outline" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></ion-icon>&nbsp Program Data</a>
                    </li>
                    <li class='{{ Request::is('balitas') ? '' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('intervensi.index') }}">
                            <ion-icon name="share-social-outline" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></ion-icon>&nbsp Kegiatan</a>
                    </li>
                </ul>
            </li>

            <li class="menu-header">User Management</li>

            <li class="nav-item dropdown {{ Request::is('home') ? '' : '' }}">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="fa-solid fa-users-rectangle" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></i>
                    <span>Users</span>
                </a>
                <a href="#" class="nav-link has-dropdown">
                    <i class="fa-solid fa-user-shield" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></i>
                    <span>Roles and Permissions</span>
                </a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('home') ? '' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('roles.index') }}">
                            <ion-icon name="file-tray-stacked-outline" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></ion-icon>&nbsp Role & Permissions</a>
                    </li>
                    <li class='{{ Request::is('home') ? '' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('assign-permissions') }}">
                            <ion-icon name="file-tray-stacked-outline" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></ion-icon>&nbsp Assign Permissions</a>
                    </li>
                </ul>
            </li>

            <li class="menu-header">Data</li>

            <li class="nav-item dropdown {{ Request::is('home') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fa-solid fa-children" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></i>
                    <span>Stunting</span>
                </a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('stuntings') ? '' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('stuntings.dataEppgbm') }}">
                            <ion-icon name="file-tray-stacked-outline" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></ion-icon>&nbsp Data EPPGBM</a>
                    </li>
                    <li class='{{ Request::is('stuntings') ? '' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('stuntings.index') }}">
                            <ion-icon name="people-outline" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></ion-icon>&nbsp Management Data</a>
                    </li>
                    <li class='{{ Request::is('stuntings') ? '' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('stuntings.pengukuran') }}">
                            <ion-icon name="scale-outline" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></ion-icon>&nbsp Data Pengukuran</a>
                    </li>
                    <li class='{{ Request::is('stuntings') ? '' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('stuntings.pengukuran') }}">
                            <ion-icon name="scale-outline" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></ion-icon>&nbsp Data PMT</a>
                    </li>
                    <li class='{{ Request::is('stuntings') ? '' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('stuntings.pengukuran') }}">
                            <ion-icon name="scale-outline" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></ion-icon>&nbsp Data Determinan</a>
                    </li>
                    <li class='{{ Request::is('stuntings') ? '' : '' }}'>
                        <a class="nav-link"
                            href="/laporan/stunting/chart">
                            <ion-icon name="stats-chart-outline" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></ion-icon>&nbsp Stunting chart</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('home') ? '' : '' }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fa-solid fa-people-group" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></i>
                    <span>Bapak Ibu Asuh</span>
                </a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('bapakasuhs') ? '' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('bapakasuhs.index') }}">
                            <ion-icon name="people-sharp" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></ion-icon>&nbsp Data BASUH</a>
                    </li>
                    <li class='{{ Request::is('bapakasuhs') ? '' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('nonbapakasuhs.index') }}">
                            <ion-icon name="briefcase-outline" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></ion-icon>&nbsp Data Non BASUH</a>
                    </li>
                    {{-- <li class='{{ Request::is('bapakasuhs') ? '' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('anakasuhs.index') }}">
                            <ion-icon name="fitness-outline"></ion-icon>&nbsp Data Anak Asuh</a>
                    </li> --}}
                </ul>
            </li>

            {{-- Intervensi --}}
            <li class="nav-item dropdown {{ Request::is('home') ? '' : '' }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fa-solid fa-handshake" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></i>
                    <span>Intervensi</span>
                </a>
                <ul class="dropdown-menu">
                    {{-- <li class='{{ Request::is('intervensi') ? '' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('intervensi.index') }}">
                            <ion-icon name="share-social-outline"></ion-icon>&nbsp Data Intervensi</a>
                    </li> --}}
                    <li class='{{ Request::is('intervensi') ? '' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('intervensi-bpas.index') }}">
                            <ion-icon name="git-merge-outline" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></ion-icon>&nbsp BASUH</a>
                    </li>
                    <li class='{{ Request::is('intervensi') ? '' : '' }}'>
                        <a class="nav-link"
                            href={{ route('intervensi-nonbpas.index') }}>
                            <ion-icon name="git-merge-outline" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></ion-icon>&nbsp Non BASUH</a>
                    </li>
                </ul>
            </li>

            {{-- Laporan --}}
            <li class="menu-header">Laporan</li>
            <li class="nav-item dropdown {{ Request::is('home') ? 'active' : '' }}">
                <a href="{{ route('laporan.index') }}" class="nav-link has-dropdown">
                    <i class="fa-solid fa-chart-simple" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></i>
                    <span>Laporan</span>
                </a>
                <ul class="dropdown-menu">
                    {{-- <li class="{{ Request::is('home') ? '' : '' }}">
                        <a class="nav-link"
                            href="">
                            <ion-icon name="stats-chart-outline"></ion-icon>&nbsp Laporan</a>
                    </li> --}}
                    <li class='{{ Request::is('home') ? '' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('laporan.bukuStunting') }}">
                            <ion-icon name="book-outline" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></ion-icon>&nbsp Buku Stunting</a>
                    </li>
                    <li class="{{ Request::is('home') ? '' : '' }}">
                        <a class="nav-link"
                            href="{{ route('laporan.kasusAktif') }}">
                            <ion-icon name="alert-circle-outline" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></ion-icon>&nbsp Kasus Aktif</a>
                    </li>
                    <li class='{{ Request::is('home') ? '' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('laporan.kasusBelumIntervensi') }}">
                            <ion-icon name="layers-outline" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></ion-icon>&nbsp Kasus Belum Intervensi</a>
                    </li>
                    <li class="{{ Request::is('home') ? '' : '' }}">
                        <a class="nav-link"
                            href="{{ route('laporan.balitaResiko') }}">
                            <ion-icon name="trending-up-outline" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></ion-icon>&nbsp Balita Resiko Tinggi</a>
                    </li>
                    <li class='{{ Request::is('home') ? '' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('laporan.wisudaStunting') }}">
                            <ion-icon name="sparkles-outline" onmouseover="this.style.color='blue'" onmouseout="this.style.color=''"></ion-icon>&nbsp Wisuda Stunting</a>
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
            <a href="https://scribehow.com/shared/Managing_Stunting_Data_in_the_System__hdb5p7SHSnOc-T2UtrPZzQ"
                class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-book"></i> Documentation
            </a>
        </div>
    </ul>
    </aside>
</div>
