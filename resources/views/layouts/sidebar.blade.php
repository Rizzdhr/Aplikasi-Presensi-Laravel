<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link d-flex justify-content-center">
        <img src="{{ asset('image/logo_cn-removebg-preview.png') }}" alt="logo_rpl"
            class="brand-image img-circle elevation-3" style="">
        {{-- <span class="brand-text font-weight-light">SMK CITRA NEGARA</span> --}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        {{-- <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="" class="img-circle elevation-2" alt="">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            user
        </a>
        </div>
      </div> --}}

        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link nav-link @if (Route::is('dashboard')) active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas"></i>
                        </p>
                    </a>
                </li>
                <br>

                <li class="nav-item">
                    <a href="" class="nav-link @if (Route::is('absensis.index')) active @endif">
                        <i class="fas fa-calendar-check nav-icon"></i>
                        <p>Absensi</p>
                    </a>
                </li>
                <br>

                <li class="nav-item">
                    <a href="{{ route('kelass.index') }}"
                        class="nav-link @if (Route::is('kelass.index')) active @endif">
                        <i class="fas fa-school nav-icon"></i>
                        <p>Data Kelas</p>
                    </a>
                </li>
                <br>

                <li class="nav-item">
                    <a href="{{ route('siswas.index') }}"
                        class="nav-link @if (Route::is('siswas.index')) active @endif">
                        <i class="fas fa-users nav-icon"></i>
                        <p>Data Siswa</p>
                    </a>
                </li>
                <br>

                <li class="nav-item">
                    <a href="{{ route('gurus.index') }}"
                        class="nav-link @if (Route::is('gurus.index')) active @endif">
                        <i class="fas fa-user-tie nav-icon"></i>
                        <p>Data Guru</p>
                    </a>
                </li>
                <br>

                <li class="nav-item">
                    <a href="{{ route('jurusans.index') }}"
                        class="nav-link @if (Route::is('jurusans.index')) active @endif">
                        <i class="fas fa-graduation-cap nav-icon"></i>
                        <p>Data Jurusan</p>
                    </a>
                </li>
                <br>

                <li class="nav-item">
                    <a href="{{ route('mapels.index') }}"
                        class="nav-link @if (Route::is('mapels.index')) active @endif">
                        <i class="fas fa-book nav-icon"></i>
                        <p>Data Mapel</p>
                    </a>
                </li>
                <br>

                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="fas fa-print nav-icon"></i>
                        <p>Laporan</p>
                    </a>
                </li>
                <br>

                <li class="nav-item">
                    <a href="{{ route('roles.index') }}"
                        class="nav-link  @if (Route::is('roles.index')) active @endif">
                        <i class="fas fa-user-shield nav-icon"></i>
                        <p>Role</p>
                    </a>
                </li>
                <br>

                <li class="nav-item">
                    <a href="{{ route('user.index') }}"
                        class="nav-link  @if (Route::is('user.index')) active @endif">
                        <i class="fas fa-user-plus nav-icon"></i>
                        <p>Users</p>
                    </a>
                </li>
                <br>

                <form id="logoutForm" action="{{ route('logout') }}" method="GET">
                    @csrf
                    <button type="button" id="logoutButton" class="btn btn-danger">Logout</button>
                </form>
                <br>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
