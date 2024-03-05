<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-success elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link d-flex justify-content-center">
        <img src="{{ asset('image/logo_cn-removebg-preview.png') }}" alt="logo_rpl"
            class="brand-image img-circle elevation-3" style="max-height: 95px;">

        {{-- <span class="brand-text font-weight-light">SMK CITRA NEGARA</span> --}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <br>
        <!-- Sidebar Menu -->
        <nav class="mt-5">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item mb-2">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link @if (Route::is('dashboard')) active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas"></i>
                        </p>
                    </a>
                </li>

                @if (Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Guru') | Auth::user()->hasRole('BK'))
                    <li class="nav-header"><b>DATA</b></li>
                    <li class="nav-item">
                        <a href="{{ route('kelass.index') }}"
                            class="nav-link @if (Route::is('kelass.index', 'kelass.create', 'kelass.edit', 'kelass.show')) active @endif">
                            <i class="fas fa-school nav-icon"></i>
                            <p>Data Kelas</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('siswas.index') }}"
                            class="nav-link @if (Route::is('siswas.index', 'siswas.create', 'siswas.edit')) active @endif">
                            <i class="fas fa-users nav-icon"></i>
                            <p>Data Siswa</p>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->hasRole('Admin'))
                    <li class="nav-item">
                        <a href="{{ route('gurus.index') }}"
                            class="nav-link @if (Route::is('gurus.index', 'gurus.create', 'gurus.edit')) active @endif">
                            <i class="fas fa-user-tie nav-icon"></i>
                            <p>Data Guru</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('jurusans.index') }}"
                            class="nav-link @if (Route::is('jurusans.index', 'jurusans.create', 'jurusans.edit')) active @endif">
                            <i class="fas fa-graduation-cap nav-icon"></i>
                            <p>Data Jurusan</p>
                        </a>
                    </li>

                    <li class="nav-item mb-2">
                        <a href="{{ route('mapels.index') }}"
                            class="nav-link @if (Route::is('mapels.index', 'mapels.create', 'mapels.edit')) active @endif">
                            <i class="fas fa-book nav-icon"></i>
                            <p>Data Mapel</p>
                        </a>
                    </li>
                @endif

                <li class="nav-header"><b>ABSEN</b></li>
                @can('presensi')
                <li class="nav-item">
                    <a href="{{ route('presensis.index') }}"
                        class="nav-link  @if (Route::is('presensis.index', 'presensis.show', 'presensis.create')) active @endif">
                        <i class="fas fa-calendar-check nav-icon"></i>
                        <p>Presensi</p>
                    </a>
                </li>
                @endcan

                <li class="nav-item mb-2">
                    <a href="{{ route('laporan') }}" class="nav-link  @if (Route::is('laporan', 'laporan.filter', 'presensis.edit' )) active @endif">
                        <i class="fas fa-file nav-icon"></i>
                        <p>Laporan</p>
                    </a>
                </li>

                @if (Auth::user()->hasRole('Admin'))
                    <li class="nav-header"><b>REGISTER</b></li>
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}"
                            class="nav-link  @if (Route::is('users.index', 'users.create', 'users.show', 'users.edit')) active @endif">
                            <i class="fas fa-user-plus nav-icon"></i>
                            <p>User</p>
                        </a>
                    </li>
                @endif


                <div id="logoutButtonContainer" class="row">
                    <div class="btn-md mt-3">
                        <form id="logoutForm" action="{{ route('logout') }}" method="GET">
                            @csrf
                            <button id="logoutButton" type="button" class="btn btn-danger btn-block">Logout</button>
                        </form>
                    </div>
                </div>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
